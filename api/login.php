<?php
$url = $_SERVER['REQUEST_URI'];
$header = getallheaders();
if($_SERVER['REQUEST_METHOD'] == "GET"){
    $body = json_decode(file_get_contents('php://input'));
    echo $body;
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    require __DIR__.'/jwt/token.php';
    require __DIR__.'/jwt/senha.php';
    $body = json_decode(file_get_contents('php://input'));
    $jwt = new MyJWT();
    if($body->username == "" or $body->password == ""){
        http_response_code(422);
        $json = (object) array('Message' => 'Credenciais inválidas');
        echo json_encode($json);
    }else{
        if($_COOKIE['token'] != ""){
            http_response_code(403);
            $json = (object) array('Message' => 'Usuário já autenticado');
            echo json_encode($json);
        }else{
            http_response_code(200);
            $json = (object) array('token' => $jwt->encode((array)$body, SENHA));
            setcookie('token', $json->token);
            echo json_encode($json);
            echo $_COOKIE['token'];
        }
    }

}
if($_SERVER['REQUEST_METHOD'] == "PUT"){
    $body = json_decode(file_get_contents('php://input'));
    echo $body;
}
if($_SERVER['REQUEST_METHOD'] == "DELETE"){
    $body = json_decode(file_get_contents('php://input'));
    echo $body;
}
?>