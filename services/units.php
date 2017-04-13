<?php
require("service.php");

class units extends service
{

    public $objectDefinitionType = "unitObject";

    function __construct()
    {
        $this->table = 'unit';
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


class unitObject extends objectDefinition
{
    public $id;
    public $name;
}
