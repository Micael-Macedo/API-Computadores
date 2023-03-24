<?php
require 'db/index.php';
    $url = $_SERVER['REQUEST_URI'];
    if($jwt->decode($token, SENHA)){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $body = json_decode(file_get_contents('php://input'));
            if($body){
                $result = buscarItem("image", $body->id);
                if($result != "null"){
                    http_response_code(200);
                    echo $result;
                }else{
                    http_response_code(404);
                    echo json_encode((object) ['message'=> 'Imagem não encontrada']);
                }
            }
        }
    }
?>