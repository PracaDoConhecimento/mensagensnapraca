<?php
require_once('../inc/mensagem.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
	// criar
	$mensagem 	= $_POST['mensagem'];
	$nome 		= $_POST['nome'];
	$email 		= $_POST['email'];

	// faz a inclusão no bd
	$msgClass = new Mensagem();
	$response = $msgClass->cadastrar($mensagem, $nome, $email);
} 
else {
	$response = "Request method not accepted";
}

echo $response;
?>