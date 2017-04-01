<?php
 include("services/objectDefinition.php");
error_reporting(E_ALL);
ini_set("display_errors","On");
// assume autoloader available and configured
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = trim($path, "/");

$entityBody = file_get_contents('php://input');

if ($entityBody == null)
    $entityBody = "";

@list($services, $resource, $params) = explode("/", $path, 3);

$method = strtolower($_SERVER["REQUEST_METHOD"]);
$params = !empty($params) ? explode("/", $params) : array();

    if ((include $services.'/'.$resource.'.php') !== 1)
    {      
      die("DIE");
    }

if (class_exists($resource)) {
    try {        
          $resource = new $resource();
          $payload = json_decode($entityBody,true);

          if (count($payload) == 0)
            $payload = [];

            if (count($params) > 0)
                $payload["id"] = $params[0];
           $tmpObject = $resource->getObject();

        if (!($tmpObject instanceof objectDefinition)) {
            echo "hej";
            throw new Exception( get_class($tmpObject).' does not extend objectDefinition');
        }

           $tmpObject->fromArray($payload);  
            
            $output = $resource->{$method}($tmpObject);
            header('Content-Type: application/json');
            echo json_encode($output);
    }
    catch (Exception $e) {
        header("HTTP/1.1 500 Internal Server Error");
    }
}
else {
    header("HTTP/1.1 404 File Not Found");
}

  
/*
require('db.php');

$database_name = 'bioheadd_food';
$username = 'bioheadd_admin';
$password = 'M6zkTr0PLP9D';
$host = 'localhost';

$db = new db($database_name, $username, $password, $host);
$result = $db->select('ingredients', array());

foreach ($result->row_array() as $row)
{
echo $row;
}
*/

?>