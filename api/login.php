<?php
include("C:/xampp/htdocs/AlatechMachines/Helper/config.php");
if($method == "GET"){
    $body = json_decode(file_get_contents('php://input'));
    echo $body;
}
if($method == "POST"){
    $body = json_decode(file_get_contents('php://input'));
    $jwt = new MyJWT();
    $token = $_COOKIE['token'];
    if($body->username == "" or $body->password == ""){
        http_response_code(422);
        $json = (object) array('Message' => 'Credenciais inválidas');
        echo json_encode($json);
    }else{
        if($token != ""){
            $userDB = $jwt->decode($_COOKIE['token'],SENHA);
            if($userDB["username"] == $body->username and $userDB["password"] == $body->password){
                http_response_code(403);
                $json = (object) array('Message' => 'Usuário já autenticado');
                echo json_encode($json);
            }else{
            http_response_code(200);
            $json = (object) array('token' => $jwt->encode((array)$body, SENHA));
            setcookie('token', $json->token);
            echo json_encode($json);
        }
        }else{
            http_response_code(200);
            $json = (object) array('token' => $jwt->encode((array)$body, SENHA));
            setcookie('token', $json->token);
            echo json_encode($json);
        }
    }
}
if($method == "PUT"){
    $body = json_decode(file_get_contents('php://input'));
    echo $body;
}
if($method == "DELETE"){
    $body = json_decode(file_get_contents('php://input'));
    echo $body;
}
