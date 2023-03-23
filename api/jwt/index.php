<?php 
include ('token.php');

$secret = "senhasenha";
$token = new MyJWT();
$newToken = $token->encode(['email' => 'micaelm2009@hot.com', 'senha' => '1234'], $secret);
var_dump($token->decode($newToken, $secret));

?>