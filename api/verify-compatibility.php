<?php

require 'jwt/senha.php';
require 'jwt/token.php';
require 'db/index.php';

$url = $_SERVER['REQUEST_URI'];
$header = getallheaders();
$jwt = new MyJWT();
$token =$header['Authorization'];
function validarPC($fonte, $placa_mae, $placaVideo, $qtdPlacasVideo,  $memoria_ram, $qtdMemorias, $armazenamento, $qtdArmazenamento, $processador){
    if($processador->soquete != $placa_mae->soquete){

    }
    if($processador->TDP > $placa_mae->TDP){

    }
    if($placa_mae->tipoRam != $memoria_ram->tipo){

    }
    if($qtdMemorias > $placa_mae->slotsRam){

    }
    if($qtdMemorias = 0){

    }
    if($qtdPlacasVideo > $placa_mae->slotsPCI){

    }
    if($qtdPlacasVideo > 1 and $placaVideo->SLICrossfire == 0){

    }
    if($fonte->potencia < ($placaVideo->potencia * $qtdPlacasVideo)){

    }
}
if($token != ""){
    if($jwt->decode($token, SENHA)){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $body = json_decode(file_get_contents('php://input'));
            if($body){
                $fonte = buscarItem("fontes", $body->powerSupplyId);
                $placa_mae = buscarItem("placas_mae", $body->motherboardId);
                $placaVideo = buscarItem("placasvideo", $body->graphicCardId);
                $qtdPlacasVideo = $body->graphicCardAmount;
                $memoria_ram = buscarItem("memorias_ram", $body->ramMemoryId);
                $qtdMemorias = $body->ramMemoryAmount;
                $armazenamento = buscarItem("armazenamentos", $body->storageDevices[0]);
                $qtdArmazenamento = $body->storageDevices[1];
                $processador = buscarItem("processadores", $body->processorId);
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