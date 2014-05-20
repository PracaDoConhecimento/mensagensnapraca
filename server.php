<?php
require_once('inc/mensagem.php');

// Pull in the NuSOAP code
require_once('lib/nusoap.php');

// Create the server instance
$server = new soap_server;

$server->configureWSDL('MyService', 'urn:MyService');

$server->soap_defencoding = 'utf-8';

// Register the method to expose
// Note: with NuSOAP 0.6.3, only method name is used w/o WSDL
/*$server->register(
    'hello',                            // method name
    
    
    'uri:helloworld',                   // namespace
    'uri:helloworld/hello',             // SOAPAction
    'rpc',                              // style
    'encoded'                           // use
);*/
// Define the method as a PHP function
/*function hello($name) {
    return 'Hello, ' . $name;
}*/

// Register the method to expose
$server->register('get_mensagens',
				  '',
				  'urn:MyServicewsdl',
				  'urn:MyServicewsdl#get_mensagens',
				  'rpc',
				  'literal');

function get_mensagens() {
	$mensagens = new Mensagem();
	$listaDeMensagens = $mensagens->getListagem();

	return $listaDeMensagens;
}

// Register the method to expose
$server->register('set_mensagem', 
				  array('Nome' => 'xsd:string', 'Email' => 'xsd:string', 'Msg' => 'xsd:string'),
				  'urn:MyServicewsdl',
				  'urn:MyServicewsdl#set_mensagem',
				  'rpc',
				  'literal');

function set_mensagem($nome, $email, $msg) {
	$mensagens = new Mensagem();	
	$response = $mensagens->cadastrar($msg, $nome, $email);

	return $response;
	//$mensagens = new Mensagem();
	//$listaDeMensagens = $mensagens->getListagem();
	//$response = $nome . " " . $email . " " . $msg;
}

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>