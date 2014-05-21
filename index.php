<?php 
include_once('inc/facebook.php'); 
include_once('inc/mensagem.php');
include_once('inc/header.php'); 

?>
<div class="container page" data-pagename="inicio">

    <?php include_once('user-box.php'); ?>

    <div class="starter-template">
        <h1>Mensagens da praça</h1>
        <p class="lead">Protótipo funcional.</p>
    </div>

    <div class="row">        
        <div class="col-sm-5">
            <h2>Digite sua mensagem:</h2>

            <form role="form" class="form" name="form_envia_mensagem" id="form_envia_mensagem" method="POST" action="inc/execute.php"> 
                <div class="field-group">
                    <textarea name="user_mensagem" id="user_mensagem" class="form-control input-lg" placeholder="Digite a mensagem..." required></textarea>
                </div>
                <br>
                <div class="field-group">
                    <input name="user_nome" id="user_nome" class="form-control" type="text" placeholder="Seu nome" value="<?php if (isset($user_name)) { echo $user_name; } ?>" required />
                    <input name="user_email" id="user_email" class="form-control" type="email" placeholder="Seu email" value="<?php if (isset($user_email)) { echo $user_email; } ?>" required />
                </div>
                <br>
                <input name="submit" id="btn_submit" type="submit" value="ENVIAR" class="btn btn-success btn-submit" />
                <input name="action" id="form_action" type="hidden" value="cadastrar" />
                <span class="erro"></span>
            </form>
        </div>
    </div>

</div><!-- /.container -->

<?php include_once('inc/footer.php'); ?>