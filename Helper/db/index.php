<?php
CONST PASSWORD = "1234";
function showItens($objeto, $limite, $pag)
{
    $db = new mysqli('localhost', 'root', PASSWORD, "alatechmachines");
    $comeco = ($limite * $pag) - $limite;
    $url = "select * from `$objeto` limit $limite offset $comeco";
    $result = $db->query($url);
    $array = [];
    while ($objeto = $result->fetch_object()) {
        array_push($array, $objeto);
    }
    return json_encode($array);
}
function buscarItem($objeto, $id){
    $db = new mysqli('localhost', 'root', PASSWORD, "alatechmachines");
    $url = "select * from `$objeto` where id = $id";

    $result = $db->query($url);
    return json_encode($result->fetch_object());
}
function buscarItemNome($objeto, $nome,  $limite, $pag){
    $db = new mysqli('localhost', 'root', PASSWORD, "alatechmachines");
    $comeco = ($limite * $pag) - $limite;
    $url = "select * from `$objeto` where nome = '$nome' limit $limite offset $comeco";
    $result = $db->query($url);
    return json_encode($result->fetch_object());
}
function adicionarMaquina($urlImagem, $fonte,$placa_mae, $placaVideo, $qtdPlacasVideo, $memoria_ram, $qtdMemorias, $armazenamento, $qtdArmazenamento, $processador){
    $db = new mysqli('localhost', 'root', PASSWORD, "alatechmachines");
    $url = "insert into machines (URLimagem, qtdMemoria, RamId, fonteId, processadorId, placaMaeId, placaVideoId, qtdPlacasVideo, qtdArmazenamento, armazenamentoId) values ('$urlImagem', $qtdMemorias, $memoria_ram, $fonte, $processador, $placa_mae,  $placaVideo, $qtdPlacasVideo, $qtdArmazenamento, $armazenamento)";
    $db->query($url);
    $result = $db->insert_id;
    return $result;
}
function editarMaquina($id, $urlImagem, $fonte,$placa_mae, $placaVideo, $qtdPlacasVideo, $memoria_ram, $qtdMemorias, $armazenamento, $qtdArmazenamento, $processador){
    $db = new mysqli('localhost', 'root', PASSWORD, "alatechmachines");
    $url = "update machines set URLimagem = '$urlImagem', qtdMemoria = $qtdMemorias , RamId = $memoria_ram, fonteId = $fonte, processadorId = $processador, placaMaeId = $placa_mae, placaVideoId = $placaVideo, qtdPlacasVideo = $qtdPlacasVideo, qtdArmazenamento = $qtdArmazenamento, armazenamentoId = $armazenamento WHERE id = $id"; 
    $result = $db->query($url);
    return $result;
}
function deletarItem ($objeto, $id){
    $db = new mysqli('localhost', 'root', PASSWORD, "alatechmachines");
    $url = "delete from `$objeto` where id = $id";
    $result = $db->query($url);
    return $result;
}

