<div class="pull-right">
<?php 
    // verifica se o usuário já esta logado no aplicativo
    $user = $facebook->getUser();

    if ($user): 
        try {                 
            /* obtem as permissões atuais que usuário tem em relação a sua aplicação  */
            $permissions = $facebook->api("/me/permissions");

            /* verifica se o usuário já autorizou o acesso ao email para a sua aplicação */
            if (!array_key_exists('email', $permissions['data'][0])) {
                    /* solicita permissão */
                    header( "Location: " . $facebook->getLoginUrl(array("scope" => "email")) );
                    exit;
            }

            // Obtem dados do profile do usuario logado
            // o app terá acesso somente os dados públicos
            $user_profile = $facebook->api('/me');


            // exibe foto do usuario 
            echo "<img class='' src='https://graph.facebook.com/$user/picture' />";

            // printa os dados públicos do profile do usuario 
            echo "<pre>";
            print_r($user_profile);
            echo "</pre>";

        } catch (FacebookApiException $e) {
            // tratamento de erro
            print_r($e);
        }
      else: 
            // usuario não logado, solicitar autenticação
            $loginUrl = $facebook->getLoginUrl();
            echo "<a href='$loginUrl'>Conectar no aplicativo</a><br />";
            echo "<strong><em>Voc&ecirc; n&atilde;o esta conectado..</em></strong>";    
      endif;
?>
</div>          