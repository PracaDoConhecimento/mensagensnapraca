<?php 
include_once('inc/facebook.php'); 
include_once('inc/mensagem.php');
include_once('inc/header.php'); 
?>
<script src="js/vendor/isotope.pkgd.min.js"></script>
<script src="js/vendor/masonry-horizontal.js"></script>

<div id="jardim" class="container page" data-pagename="lista">

	<?php include_once('user-box.php') ?>


	<div class="row">
		<?php
		$count = 0;
		$mensagens = new Mensagem();
		$listaDeMensagens = $mensagens->getListagem();

		foreach ($listaDeMensagens as $mensagem):
		?>
		<div id="mensagem-<?php echo $count; ?>" class="mensagem item col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<div class="casulo">
				<div class="conteudo">
					<h3>"<?php echo $mensagem['conteudo']; ?>"</h3>	
				</div>
				<div class="autor pull-right">
					<small><?php echo $mensagem['autor_nome']; ?></small>
				</div>
			</div>
		</div>
		<?php	
			$count++;
		endforeach;
		?>
	</div><!-- .row -->
</div>


<script type="text/javascript">
	jQuery(document).ready(function($) {
		var $container = $('#jardim');
		// init
		$container.isotope({
		  	itemSelector: '.item',
			masonry: {
		      isFitWidth: true
		    }
		});	
		var isHorizontal = false;
	});
</script>

<!--[if lte IE 8]>
<script>
$(document).ready(function() {
    // IE8 compatibility of pseudo-class
    $('#jardim .row').first().css({margin:'0'});
});
</script>
<![endif]-->

<?php include_once('inc/footer.php'); ?>