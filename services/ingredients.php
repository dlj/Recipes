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
      return $this->db->query('select ingredients.*,  recipes_ingredients.text, recipes_ingredients.amount from ingredients inner join recipes_ingredients on recipes_ingredients.ingredients_id = ingredients.id where recipes_ingredients.receipe_id = '.  $id. '')->result_array();
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