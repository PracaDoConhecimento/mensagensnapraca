<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once('mensagem.php');
//require_once('facebook.php');

$mensagem = new Mensagem();
$action = (isset($_POST['action'])) ? $_POST['action'] : "";

switch ($action) {
	case 'cadastrar':		
		$resposta = $mensagem->cadastrar($_POST['mensagem'],$_POST['nome'],$_POST['email']);

		if ($resposta) {
			echo $resposta;
			
			// FAz a postagem no facebook

/*			$facebook->api("/me/feed", "post", array(
		           'message' => "Acabei de postar uma Mensagem para o evento da Praça do Conhecimento. Poste a sua também!",
		           'name' => "Mensagens na Praça",
		           'link' => "https://apps.facebook.com/mensagensnapraca/"
		           // picture' => "http://www.exemploteste.com.br/elefante-php.png",
		           ));*/

		}


		break;

	default:
		echo "ERRO! Nenhuma a&ccedil;&atilde;o foi definida ou a&ccedil;&atilde;o invalida";
		break;
}

?>