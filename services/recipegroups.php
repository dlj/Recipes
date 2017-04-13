<?php
require("service.php");

class recipegroup extends service
{

    public $objectDefinitionType = "recipegroupObject";

    function __construct()
    {
        $this->table = 'recipegroup';
        parent::__construct();
    }
    
  /* Comment this in again, if overriding of default service code is needed
  
    public function get(objectDefinition $recipeObject = null)
    {
       return parent::get($recipeObject);
    }

    public function post(objectDefinition $recipeObject)
    {
      return parent::post($recipeObject);
    }
  
    public function put(objectDefinition $recipeObject)
    {
      return parent::put($recipeObject);
    }
  
    public function delete(objectDefinition $recipeObject)
    {
      return parent::delete($recipeObject);
    }
*/

}


class recipegroupObject extends objectDefinition
{
    public $id;
    public $recipe_id;
    public $sortindex;
    public $group;
    public $instruction;
}
