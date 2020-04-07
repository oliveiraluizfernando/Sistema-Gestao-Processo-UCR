<?php

header("Content-Type: application/json; charset=UTF-8");

include_once "DBOperation.php";

$table = $_GET["table"];

$db = new DBOperation();

$resultado = $db->loadAll($table);

var_dump($resultado);

echo("<BR>");
echo("<BR>");

$myJSON = json_encode($resultado);

var_dump($myJSON);

echo("<BR>");
echo("<BR>");

echo($myJSON);

echo("<BR>");
echo("<BR>");

echo $myJSON[1];

?>