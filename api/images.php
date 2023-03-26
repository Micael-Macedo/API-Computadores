<?php
include("C:/xampp/htdocs/AlatechMachines/Helper/config.php");

$url = $_SERVER['REQUEST_URI'];
if($method == "GET"){
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
?>