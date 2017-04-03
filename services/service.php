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
    public function get(objectDefinition $object = null)
    {
        $rtn = [];

        if (is_null($object)) {
            $rtn = $this->db->select($this->table, array())->result_array();
        } else {

            $queryArray = array_filter((array)$object, function($value, $key) {
                return $value != null;
            },ARRAY_FILTER_USE_BOTH);

            $rtn = $this->db->select($this->table, $queryArray)->result_array();
            if ($rtn != null && count($rtn) == 1)
            { 
                return $this->createObject($rtn[0]);
            }

            foreach ($rtn as $value) {
                $value = $this->createObject($value);;
}
            return $rtn;
        }
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
