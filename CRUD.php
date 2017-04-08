<?php
 include("services/objectDefinition.php");
error_reporting(E_ALL);
ini_set("display_errors", "On");
// assume autoloader available and configured
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$requestParms = parse_url($_SERVER["REQUEST_URI"], PHP_URL_QUERY); 
$path = trim($path, "/");

$payload = [];

if (strlen($requestParms) > 0)
    parse_str($requestParms, $payload);

$entityBody = file_get_contents('php://input');

if ($entityBody == null) {
    $entityBody = "";
}

$tmpEntity = json_decode($entityBody, true);

if ($tmpEntity != null)
  $payload = array_merge($payload, $tmpEntity);

$inputParms = explode("/", $path, 3);
if (count($inputParms) < 3) {
    $inputParms = array_pad($inputParms, 3, '');
}

@list($services, $resource, $resourceId) = $inputParms;

$method = strtolower($_SERVER["REQUEST_METHOD"]);
$resourceId = !empty($resourceId) ? explode("/", $resourceId) : array();

if ((include $services.'/'.$resource.'.php') !== 1) {
    die("DIE");
}

if (class_exists($resource)) {
    try {
          $resource = new $resource();
           $tmpObject = $resource->createObject();

            if (!($tmpObject instanceof objectDefinition)) {
                throw new Exception( get_class($tmpObject).' does not extend objectDefinition');
            }
            $tmpObject->fromArray($payload);

            $output = $resource->{$method}($tmpObject);
            header('Content-Type: application/json');
            echo json_encode($output);
            
    } catch (Exception $e) {
        header("HTTP/1.1 500 Internal Server Error");
    }
} else {
    header("HTTP/1.1 404 File Not Found");
}