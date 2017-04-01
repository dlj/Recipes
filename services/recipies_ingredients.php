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
      return $this->db->query('select recipies_ingredients.* from recipies_ingredients where recipies_ingredients.recipe_id = '.  $id. '')->result_array();
  }

  public function insert()
  {
  
  }
  
  public function update()
  {
  
  }
  
}


class recipies_ingredientsObject
{
  public $id;        
  public $amount;
  public $text;
  public $ingredients_id;
  public $receipe_id;
  public $recipegroup_id;   
}




?>