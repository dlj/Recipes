<?php
require('./db.php');
class service
{
    protected $db;
    protected $table = "";
    protected $objectDefinitionType = null;

    function __construct()
    {
        $this->db = new Database();

        if ($this->objectDefinitionType == null)
            throw new Exception("No object definition found");
    }

    public function hasAccess()
    {
        return true;
    }

    public function get($object = null)
    {
        $rtn = [];
        $returnSingle = false;
        // If empty, just return everything
        if (is_null($object)) {
            $rtn = $this->db->select($this->table, array())->result_array();
        }
        // Semi batch loading.
        // this is only avalible with id property
        else if (is_array($object)) {
          $tmpId = $this->createSqlInExpression($object);

            $rtn = $this->db->select($this->table, $tmpId)->result_array();
        } else {

            $queryArray = array_filter((array)$object, function($value, $key) {
                return $value != null;
            },ARRAY_FILTER_USE_BOTH);
            if (array_key_exists('id',$queryArray)) {
                $returnSingle = true;
            }

            $rtn = $this->db->select($this->table, $queryArray)->result_array();
        }

            if ($returnSingle == true) {
                $rtn = $this->createObject($rtn[0]);
            }
            else
            {
                foreach ($rtn as $value) {
                    $value = $this->createObject($value);
                }
            }
            return $rtn;
    }

    public function createSqlInExpression($obj) : string
    {
        $tmpRtnAry = [];
        $rtn = "";
        $firstIteration = true;

        foreach ($obj as $items) {
            foreach ($items as $key => $item) {
                if ($item != null) {
                    if (!array_key_exists($key,$tmpRtnAry)) {
                        $tmpRtnAry[$key] = [];
                    }
                    if (!in_array($item,$tmpRtnAry[$key]))
                        array_push($tmpRtnAry[$key], $item);
                }
            }
        }
        
        foreach ($tmpRtnAry as $key => $tmp) {
           $imp = implode(', ', array_map(function($o) {
              return $o;
            }, $tmp));

            if (!$firstIteration) {
                $rtn .= " or ";
            }
            $rtn .= $key." in (".$imp.")";
            $firstIteration = false;
        }


        return $rtn;
    } 

    public function post(objectDefinition $object)
    {
        if (!$this->hasAccess()) {
            return;
        }

        if ($this->get($object) == null) {
            return null;
        }
        $this->db->update($this->table, (array)$object, array('id' => $object->id));
        return $object;
    }
  
    public function put(objectDefinition $object)
    {
        if (!$this->hasAccess()) {
            return;
        }

        $res = $this->db->insert($this->table, (array)$object);

        if (!is_int($res))
            return null;

        $obj = $this->createObject();
        $obj->id = $res;
        return $this->get($obj);
    }
  
    public function delete(objectDefinition $object)
    {
        if (!$this->hasAccess()) {
            return;
        }
        
        $object = $this->get($object);
        if ($object == null) {
            return null;
        }

        $this->db->delete($this->table, array('id' => $object->id));
        return $object;
    }

    public function createObject($input = null)
    {
        return new $this->objectDefinitionType($input);
    }
}
