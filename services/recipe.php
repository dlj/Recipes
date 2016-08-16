<?php
  require('db.php');
class recipe
{

  private $db; 
  
  function __construct() 
  {
    $this->db = new db();
  }
  
  public function get($id = null)
  {
  if (is_null($id))
  {  
    return $this->db->select('recipies', array())->result_array();
  }
  else
  {
      return $this->db->select('recipies', array('id' => $id))->row_array();
  }
  

  }

  public function insert()
  {
  
  }
  
  public function update()
  {
  
  }
  
}


class recipeObject
{
  public $id;
  public $name;      
}




?>