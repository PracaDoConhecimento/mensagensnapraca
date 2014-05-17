<?php 
include_once('inc/facebook/facebook.php'); 

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '1420834378189168',
  'secret' => 'e1fca630ab6f464dd4d4b96db3a3e594',
));

// verifica se o usuário já esta logado no aplicativo
$user = $facebook->getUser();
if ($user) { 
        try {
        // Obtem dados do profile do usuario logado
        // o app terá acesso somente os dados públicos
            $user_profile = $facebook->api('/me');
  
            // exibe foto do usuario 
            echo "<img src='https://graph.facebook.com/$user/picture' />";
  
            // printa os dados públicos do profile do usuario 
            echo "<pre>";
            print_r($user_profile);
            echo "</pre>";
  
        } catch (FacebookApiException $e) {
            // tratamento de erro
            print_r($e);
        }
} else {
        // usuario não logado, solicitar autenticação
        $loginUrl = $facebook->getLoginUrl();
        echo "<a href='$loginUrl'>Conectar no aplicativo</a><br />";
        echo "<strong><em>Voc&ecirc; n&atilde;o esta conectado..</em></strong>";
}

?>