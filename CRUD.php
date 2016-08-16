<?php

// assume autoloader available and configured
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = trim($path, "/");
@list($resource, $params) = explode("/", $path, 2);

$method = strtolower($_SERVER["REQUEST_METHOD"]);
$params = !empty($params) ? explode("/", $params) : array();



    if ((include 'services/'.$params[0].'.php') !== 1)
    {      
      die("DIIIE");
    }
    
    $tmp = new $params[0]();

    switch($method)
    {
      case "get" :
        $response = ($tmp->get($params[1]));
        break;
      case "put" :
        $response = ($tmp->insert());
        break;
      case "post" :
        $response = ($tmp->update());
        break;
      default:
        die("asdas");      
    }

    header('Content-Type: application/json');
    echo json_encode(array($response));
    

  
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