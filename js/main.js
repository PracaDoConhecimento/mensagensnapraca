$(document).ready(function() {

	/* nav walker */
	$page = $('.page');
	$menuItem = $('.navbar .navbar-nav li');
	pagename_atual = $page.data('pagename');

	// reseta estado do menu
	$menuItem.removeClass('active');

	// marca a pagina correspondente no menu
	$menuItem.find('a#' + pagename_atual).parent().addClass('active');


	$('#form_envia_mensagem .btn-submit').click(function() {
	//$('#form_envia_mensagem').submit(function(event) {

		$formulario = $('#form_envia_mensagem');

		//variaveis do formulario
		user_msg   = $('#user_mensagem').val();
		user_nome  = $('#user_nome').val();
		user_email = $('#user_email').val();

		if (user_msg != "" && user_nome != "" && user_email != "") {
			$.ajax({
				url: 'http://www.pracadoconhecimento.com.br/mensagens/webservice/execute.php',
				type: 'POST',
				data: "action=cadastrar&mensagem="+user_msg+"&nome="+user_nome+"&email="+user_email,
				success: function(htmlResponse) {
					if (htmlResponse == '1' || htmlResponse == 1) {
						limpaFormulario();						
						$('#modalReturn').modal('show');
					} 
					else {
						$('#form_envia_mensagem .erro').html('Ocorreu um erro. Sua mensagem não foi publicada.');
					}
				}
			});
		} else {
			$('#form_envia_mensagem .erro').html('Ocorreu um erro. Você não preencheu todos os campos.');
		}


		return false;
	});
		
});

function limpaFormulario() {
	user_msg   = $('#user_mensagem').val("");
	user_nome  = $('#user_nome').val("");
	user_email = $('#user_email').val("");
}

function limpaMsgErro() {
	/*$('#form_envia_mensagem .erro').*/
}

