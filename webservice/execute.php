<?php 
require_once('mensagem.php');

$mensagem = new Mensagem();

if ($_SERVER['REQUEST_METHOD'] == "POST"):

	$action = (isset($_POST['action'])) ? $_POST['action'] : "";

	switch ($action) {
		case 'cadastrar':		
			$resposta = $mensagem->cadastrar($_POST['mensagem'],$_POST['nome'],$_POST['email']);

			if ($resposta) {				
				header("Access-Control-Allow-Origin: *");
				echo $resposta;	
			}
			break;

		case 'listar':
			$resposta = $mensagem->getListagem();
			if ($resposta) {				
				header('Content-type: application/json; charset=utf-8');				
				header("access-control-allow-origin: *");
				$json = json_encode(array('mensagens'=> $resposta));
				echo isset($_GET['callback'])
			    ? "{$_GET['callback']}($json)"
			    : $json;
			}
			break;

		case 'contagem':
			$resposta = $mensagem->getNumTotal();
			if ($resposta) {				
				header('Content-type: application/json; charset=utf-8');
				header("access-control-allow-origin: *");
				$json = json_encode(array('mensagens'=> $resposta));
				echo isset($_GET['callback'])
			    ? "{$_GET['callback']}($json)"
			    : $json;
			}
			break;

		default:
			echo "ERRO! Nenhuma a&ccedil;&atilde;o foi definida ou a&ccedil;&atilde;o invalida";
			break;
	}

else:
	echo "ERRO! O metodo requisitado n&atilde;o foi aceito.";
endif;
?>