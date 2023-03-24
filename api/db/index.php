<?php
function showItens($objeto, $limite, $pag)
{
    $db = new mysqli('localhost', 'root', '', "alatechmachines",3307);
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
    $db = new mysqli('localhost', 'root', '', "alatechmachines",3307);
    $url = "select * from `$objeto` where id = $id";

    $result = $db->query($url);
    return json_encode($result->fetch_object());
}
function buscarItemNome($objeto, $nome,  $limite, $pag){
    $db = new mysqli('localhost', 'root', '', "alatechmachines",3307);
    $comeco = ($limite * $pag) - $limite;
    $url = "select * from `$objeto` where nome = '$nome' limit $limite offset $comeco";
    $result = $db->query($url);
    return json_encode($result->fetch_object());
}
