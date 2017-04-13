<?php
require("service.php");

class recipe_ingredients extends service
{

    public $objectDefinitionType = "recipe_ingredientsObject";

    function __construct()
    {
        $this->table = 'recipe_ingredients';
        parent::__construct();
    }
    
  


  /* Comment this in again, if overriding of default service code is needed

    public function post(objectDefinition $recipes_ingredientsObject)
    {
      return parent::post($recipes_ingredientsObject);
    }
  
    public function put(objectDefinition $recipes_ingredientsObject)
    {
      return parent::put($recipes_ingredientsObject);
    }
  
    public function delete(objectDefinition $recipes_ingredientsObject)
    {
      return parent::delete($recipes_ingredientsObject);
    }
*/

}
class recipe_ingredientsObject extends objectDefinition
{
  public $id;        
  public $amount;
  public $text;
  public $ingredients_id;
  public $recipe_id;
  public $recipegroup_id;   
  public $type_id;
}
?>