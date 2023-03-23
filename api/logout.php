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
            setcookie('token', '');
            echo json_encode($json);
        }
    }
}
if($_SERVER['REQUEST_METHOD'] == "DELETE"){
    require 'jwt/senha.php';
    require 'jwt/token.php';
    $jwt = new MyJWT();
    $token = $header["Authorization"];
    if($token != ""){
        $user = $jwt->decode($token,SENHA);
        if(($user) ){
            http_response_code(200);
            setcookie('token', '');
            $json = (object) ["message" => "Logout com sucesso"];
            echo json_encode($json);
        }else{
            http_response_code(403);
            $json = (object) ["message" => "Token invalido"];
            echo json_encode($json);
        }
    }else{
        http_response_code(401);
        $json = (object) ["message" => "Necessário estar autenticado no sistema"];
        echo json_encode($json);
    }
}
