<?php
require('../db.php');



class ingredients
{
  private $db; 
  
  function __construct() 
  {
    $this->db = new Database();
  }
  
  public function get($id = null)
  {
  if (is_null($id))
  {  
    return $this->db->select('ingredients', array())->result_array();
  }
  else
  {
      return $this->db->query('select ingredients.*,  recipies_ingredients.text, recipies_ingredients.amount from ingredients inner join recipies_ingredients on recipies_ingredients.ingredients_id = ingredients.id where recipies_ingredients.receipe_id = '.  $id. '')->result_array();
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