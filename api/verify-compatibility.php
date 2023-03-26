<?php

include("C:/xampp/htdocs/AlatechMachines/Helper/config.php");

if($token != ""){
    if($jwt->decode($token, SENHA)){
        if($method == "POST"){
            $body = json_decode(file_get_contents('php://input'));
            if($body){
                $fonte = json_decode(buscarItem("power-supplies", $body->powerSupplyId));
                $placa_mae = json_decode(buscarItem("motherboards", $body->motherboardId));
                $placaVideo = json_decode(buscarItem("graphic-cards", $body->graphicCardId));
                $qtdPlacasVideo = $body->graphicCardAmount;
                $memoria_ram = json_decode(buscarItem("ram-memories", $body->ramMemoryId));
                $qtdMemorias = $body->ramMemoryAmount;
                $armazenamento = json_decode(buscarItem("storage-devices", $body->storageDevices[0]));
                $qtdArmazenamento = $body->storageDevices[1];
                $processador = json_decode(buscarItem("processors", $body->processorId));
                echo validarPC($fonte,$placa_mae, $placaVideo, $qtdPlacasVideo, $memoria_ram, $qtdMemorias, $armazenamento, $qtdArmazenamento, $processador);
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