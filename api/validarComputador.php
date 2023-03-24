<?php 

function validarPC($fonte, $placa_mae, $placaVideo, $qtdPlacasVideo,  $memoria_ram, $qtdMemorias, $armazenamento, $qtdArmazenamento, $processador){
    $errors = [];
    if($processador->soquete != $placa_mae->soquete){
        array_push($errors, (object) ["message" => "soquete da placa mãe é diferente do soquete do processador"]);
    }
    if((int) $processador->TDP > (int) $placa_mae->TDPMax){
        array_push($errors, (object) ["message" => "TDP do processador é maior do que a placa mãe consegue suportar"]);
    }
    if($placa_mae->tipoRam != $memoria_ram->tipo){
        array_push($errors, (object) ["message" => "tipo da memoria ram é incompativel com o da placa mãe"]);
    }
    if($qtdMemorias > $placa_mae->slotsRam){
        array_push($errors, (object) ["message" => "quantidade de memoria ram maior que a quantidade de slots da placa mãe"]);
    }
    if($qtdMemorias = 0){
        array_push($errors, (object) ["message" => "é necessário adicionar pelo menos uma memoria ram"]);
    }
    if($qtdPlacasVideo > $placa_mae->slotsPCI){
        array_push($errors, (object) ["message" => "quantidade de placas de vídeo maior que os slots pci da placa mãe"]);
    }
    if($qtdPlacasVideo > 1 and $placaVideo->SLICrossfire == 0){
        array_push($errors, (object) ["message" => "placa de video não suporta SLICrossfire"]);
    }
    if($fonte->potencia < ($placaVideo->potMin * $qtdPlacasVideo)){
        array_push($errors, (object) ["message" => "fonte não suporta a potencia das placas de video"]);
    }
    if($armazenamento->tipo == "HDD"){
        if($placa_mae->slotsSata < $qtdArmazenamento){
            array_push($errors, (object) ["message" => "quantidade de HDS maior que os slots sata da placa mãe"]);
        }
    }else{
        if($placa_mae->slotsM2 < $qtdArmazenamento){
            array_push($errors, (object) ["message" => "quantidade de SSDS maior que os slots M2 da placa mãe"]);
        }
    }
    if(count($errors) > 0){
        http_response_code(422);
        return json_encode($errors);
    }else{
        http_response_code(200);
        return json_encode( (object) ["message" => "Maquina valida"]);
    }
}
?>