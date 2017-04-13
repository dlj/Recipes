<?php
require("service.php");

class ingredient extends service
{

    public $objectDefinitionType = "ingredientObject";

    function __construct()
    {
        $this->table = 'ingredient';
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
class ingredientObject extends objectDefinition
{
  public $id;        
  public $name;
  public $type_id;
  public $price_avg;
}
?>