<?php
require('../db.php');



class recipies_ingredients
{
  private $db; 
  
  function __construct() 
  {
    $this->db = new Database();
  }
  
  public function get($id = null)
  {
      return $this->db->query('select recipegroup.* from recipegroup where recipegroup.id = '.  $id. '')->result_array();
  }

  public function insert()
  {
  
  }
  
  public function update()
  {
  
  }
  
}


class recipegroupObject
{
  public $id;        
  public $group;
  public $text;     
}




?>