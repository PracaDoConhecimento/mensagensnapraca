<?php 
require_once('mensagem.php');

$mensagem = new Mensagem();
$action = (isset($_POST['action'])) ? $_POST['action'] : "";

switch ($action) {
	case 'cadastrar':		
		echo $mensagem->cadastrar($_POST['mensagem'],$_POST['nome'],$_POST['email']);		
		break;

	default:
		echo "ERRO! Nenhuma a&ccedil;&atilde;o foi definida ou a&ccedil;&atilde;o invalida";
		break;
}

?>