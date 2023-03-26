<?php

include("C:/xampp/htdocs/AlatechMachines/Helper/config.php");

$url = $_SERVER['REQUEST_URI'];
if($token != ""){
    if($jwt->decode($token, SENHA)){
        if($method == "GET"){
            $body = json_decode(file_get_contents('php://input'));
            if($body){
                if(!$body->pageSize == ""){
                    $pageSize = $body->pageSize;
                }else{
                    $pageSize = 20;
                }
                if(!$body->pageSize == ""){
                    $page = $body->page;
                }else{
                    $page = 1;
                }
            }else{
                $pageSize = 20;
                $page = 1;
            }
            echo $placasVideo = showItens("graphic-cards", $pageSize, $page);
        }
    }else{
        http_response_code(403);
        echo json_encode((object) ["message"=>"Token inválido"]);
    }
}else{
    http_response_code(401);
        echo  json_encode((object) ["message"=>"Necessário estar autenticado no sistema"]);
}
?>