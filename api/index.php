<?php

    $url = (isset($_GET) ? $_GET :'home.php');
    $url = implode($url);
    $url = array_filter(explode('/', $url));
    $method = $_SERVER['REQUEST_METHOD'];
    $file = $url[0].'.php';
    if(is_file($file)){
        include $file;
    }else{
        include '404.php';
    }
?>

