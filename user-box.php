<div id="userbox" class="pull-right">
<?php 
    // verifica se o usuário já esta logado no aplicativo
    $user = $facebook->getUser();

    if ($user): 
        try {                 
            /* obtem as permissões atuais que usuário tem em relação a sua aplicação  */
            $permissions = $facebook->api("/me/permissions");

            /* verifica se o usuário já autorizou o acesso ao email para a sua aplicação */
            if (!array_key_exists('email', $permissions['data'][0]) 
              && array_key_exists('publish_stream', $permissions['data'][0])) {
                    /* solicita permissão */
                    header("Location: " . $facebook->getLoginUrl(array("scope" => "publish_stream,email")));
                    exit;
            }

            // Obtem dados do profile do usuario logado
            // o app terá acesso somente os dados públicos
            $user_profile = $facebook->api('/me');
            $user_name = $user_profile['name'];
            $user_email = $user_profile['email'];

            // exibe foto do usuario 
            echo "<img class='img-thumbnail' src='https://graph.facebook.com/$user/picture' />";

        } catch (FacebookApiException $e) {
            // tratamento de erro
            echo "ERRO! <br><br>";
            print_r($e);
        }
      else: 
            // usuario não logado, solicitar autenticação
            $loginUrl = $facebook->getLoginUrl();
            echo "<strong><em>Voc&ecirc; ainda n&atilde;o est&aacute; conectado..</em></strong><br />";    
            echo "<a href='$loginUrl'>Conectar no aplicativo</a>";            
      endif;
?>
</div>          