<?php
require('./db.php');
class recipe
{
  private $db; 
  
  function __construct() 
  {
    $this->db = new Database();
  }
  
  public function get(recipeObject $recipeObject = null)
  {
  if (is_null($recipeObject) || is_null($recipeObject->id))
  {  
    return $this->db->select('recipies', array())->result_array();
  }
  else
  {
      return $this->db->select('recipies', array('id' => $recipeObject->id))->result_array();
  }
  

  }

  public function post(recipeObject $recipeObject)
  {
    $object = $this->get($recipeObject);
    if ($object == null)
      return null;
      $this->db->update('recipies', (array)$recipeObject, array('id' => $recipeObject->id));
     return $recipeObject;
  }
  
  public function put()
  {
  
  }
  
  public function delete()
  {
  
  }

  public function getObject() {
    return new recipeObject();
  } 
}


class recipeObject extends objectDefinition
{
  public $id;
  public $name;      
}
?>