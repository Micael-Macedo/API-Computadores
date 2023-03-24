<?php
require 'validarComputador.php';
require 'db/index.php';
require 'jwt/senha.php';
require 'jwt/token.php';

$url = $_SERVER['REQUEST_URI'];
$header = getallheaders();
$jwt = new MyJWT();
$token =$header['Authorization'];
if($token != ""){
    if($jwt->decode($token, SENHA)){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $body = json_decode(file_get_contents('php://input'));
            echo $body;
        }
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $body = json_decode(file_get_contents('php://input'));
            if($body){
                $urlImagem = $body->imageBase64;
                $fonte = json_decode(buscarItem("power-supplies", $body->powerSupplyId));
                $placa_mae = json_decode(buscarItem("motherboards", $body->motherboardId));
                $placaVideo = json_decode(buscarItem("graphic-cards", $body->graphicCardId));
                $qtdPlacasVideo = $body->graphicCardAmount;
                $memoria_ram = json_decode(buscarItem("ram-memories", $body->ramMemoryId));
                $qtdMemorias = $body->ramMemoryAmount;
                $armazenamento = json_decode(buscarItem("storage-devices", $body->storageDevices[0]));
                $qtdArmazenamento = $body->storageDevices[1];
                $processador = json_decode(buscarItem("processors", $body->processorId));
                $resultado = json_decode(validarPC($fonte,$placa_mae, $placaVideo, $qtdPlacasVideo, $memoria_ram, $qtdMemorias, $armazenamento, $qtdArmazenamento, $processador));
                if(is_object($resultado)){
                    $id = adicionarMaquina($urlImagem, (int) $fonte->id,(int) $placa_mae->id, (int) $placaVideo->id, (int) $qtdPlacasVideo, (int) $memoria_ram->id, (int) $qtdMemorias, (int) $armazenamento->id, (int) $qtdArmazenamento, (int) $processador->id);
                    echo json_encode((object) ['id'=> $id]);
                }else{
                    echo json_encode($resultado) ;
                }
                
            }
        }
        if($_SERVER['REQUEST_METHOD'] == "PUT"){
            $body = json_decode(file_get_contents('php://input'));
            if($body){
                $urlImagem = $body->imageBase64;
                $id = $body->id;
                $fonte = json_decode(buscarItem("power-supplies", $body->powerSupplyId));
                $placa_mae = json_decode(buscarItem("motherboards", $body->motherboardId));
                $placaVideo = json_decode(buscarItem("graphic-cards", $body->graphicCardId));
                $qtdPlacasVideo = $body->graphicCardAmount;
                $memoria_ram = json_decode(buscarItem("ram-memories", $body->ramMemoryId));
                $qtdMemorias = $body->ramMemoryAmount;
                $armazenamento = json_decode(buscarItem("storage-devices", $body->storageDevices[0]));
                $qtdArmazenamento = $body->storageDevices[1];
                $processador = json_decode(buscarItem("processors", $body->processorId));
                $resultado = json_decode(validarPC($fonte,$placa_mae, $placaVideo, $qtdPlacasVideo, $memoria_ram, $qtdMemorias, $armazenamento, $qtdArmazenamento, $processador));
                if(is_object($resultado)){
                    $id = editarMaquina((int) $id, $urlImagem, (int) $fonte->id,(int) $placa_mae->id, (int) $placaVideo->id, (int) $qtdPlacasVideo, (int) $memoria_ram->id, (int) $qtdMemorias, (int) $armazenamento->id, (int) $qtdArmazenamento, (int) $processador->id);
                    echo json_encode((object) ['id'=> $id]);
                }else{
                    echo json_encode($resultado) ;
                }
                
            }
        }
        if($_SERVER['REQUEST_METHOD'] == "DELETE"){
            $body = json_decode(file_get_contents('php://input'));
            $id = $body->id;
            $result = buscarItem("machines", (int) $id);
            if($result != 'null'){
                deletarItem("machines", (int) $id);
                http_response_code(204);
            }else{
                http_response_code(404);
                echo json_encode((object) ['message'=>"Modelo de máquina não encontrado"]);
            }
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