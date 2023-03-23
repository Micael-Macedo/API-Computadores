<?php

$url = $_SERVER['REQUEST_URI'];
$header = getallheaders();
if($_SERVER['REQUEST_METHOD'] == "GET"){
    $body = json_decode(file_get_contents('php://input'));
    echo $body;
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $body = json_decode(file_get_contents('php://input'));
    echo $body;
}
if($_SERVER['REQUEST_METHOD'] == "PUT"){
    $body = json_decode(file_get_contents('php://input'));
    echo $body;
}
if($_SERVER['REQUEST_METHOD'] == "DELETE"){
    $body = json_decode(file_get_contents('php://input'));
    echo $body;
}
?>