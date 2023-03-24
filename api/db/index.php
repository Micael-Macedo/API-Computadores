<?php
function showItem($objeto, $limite, $pag)
{
    $db = new mysqli('localhost', 'root', '1234', "alatechmachines");
    $comeco = ($limite * $pag) - $limite;
    $url = "select * from $objeto limit $limite offset $comeco";

    $result = $db->query($url);
    $array = [];
    while ($objeto = $result->fetch_object()) {
        array_push($array, $objeto);
    }
    return json_encode($array);
}
