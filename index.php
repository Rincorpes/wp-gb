	<?php get_header(); ?>

	<?php

	if (isset($_POST['subscribe'])) {
		if (empty($_POST['email'])) wp_redirect(home_url('/?subscribe-error=1'));

		$email = $_POST['email'];
		$name = $_POST['name'];
		
		include_once('includes/mailchimp/inc/MCAPI.class.php');

		$apikey = '19181c8755c60914bbdea2b7da939bb0-us15';

		$mc = new MCAPI($apikey, true);

		$listId = '4999099b3b';

		$merge_vars = array('FNAME' => $name);
	 
		$result = $mc->listSubscribe($listId, $email, $merge_vars);
		 
		//Controlamos los errores
		if ($mc->errorCode)
		{
			echo "\tCode=".$mc->errorCode."\n";
			echo "\tMsg=".$mc->errorMessage."\n";
		} 
		else 
		{
		   wp_redirect(home_url('/?subscribe=success'));
		}
	}
	?>

	<div id="gb-main-content">
		<div class="container">
			<div class="row">
				<section id="gb-blog-content" class="col-md-8">
				
					<?php gb_get_ad('main', 'horizontal'); ?>

					<?php get_template_part( 'loop' ); ?>
				</section>

				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<!-- gb-main-content -->

	<?php get_footer(); ?>