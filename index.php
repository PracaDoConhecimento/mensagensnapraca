<?php 
include_once('inc/facebook.php'); 
include_once('inc/mensagem.php');
include_once('inc/header.php'); 

?>
<?php include_once('user-box.php'); ?>

<div class="container page" id="inicio" data-pagename="inicio">    

    <div class="logotipo">
        <img src="img/logo.png" alt="Mensagem na Praça" title="Mensagem na Praça" />
    </div>

    <div class="chamada col-xs-10">
        <p>Acreditamos na força de pequenas ações, que somadas <br>tem o poder de transformação.</p>
        <h2>Faça parte deste movimento! </h2>
    </div>

    <div class="formulario col-xs-10">
        <form role="form" class="form" name="form_envia_mensagem" id="form_envia_mensagem" method="POST" action="inc/execute.php"> 
            <div class="field-group">
                <textarea name="user_mensagem" id="user_mensagem" class="form-control input-lg" placeholder="Digite a mensagem..." required></textarea>
            </div>
            <div class="field-group">
                <input name="user_nome" id="user_nome" class="form-control" type="text" placeholder="Seu nome" value="<?php if (isset($user_name)) { echo $user_name; } ?>" required />
            </div>
            <div class="field-group">
                <input name="user_email" id="user_email" class="form-control" type="email" placeholder="Seu email" value="<?php if (isset($user_email)) { echo $user_email; } ?>" required />
            </div>
            <input name="submit" id="btn_submit" type="submit" value="ENVIAR" class="btn btn-submit" />
            <input name="action" id="form_action" type="hidden" value="cadastrar" />
            <span class="erro"></span>
        </form>
    </div>
    
    <div id="rodape">
        <a href="sobre.php">Saiba mais sobre o projeto</a>
    </div>

</div><!-- /.container -->

<?php include_once('inc/footer.php'); ?>