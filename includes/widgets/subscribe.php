<?php
$oTag = '<div class="gb-comunity-subscribe col-md-6">';
$cTag = '</div>';
if ($position == 'sidebar') {
	$oTag = '<aside class="sidebar-subscribe">';
	$cTag = '</aside>';
}
?>
<?php echo $oTag; ?>
	<h3>No te pierdas de nada</h3>

	<p>Suscribete a nuestra lista de correo para mantenerte al tanto de nuestras últimas actualizaciones. Sin SPAM</p>

	<p>Al suscribirte recibirás un mensaje en tu correo elctrónico para confirmar tu suscripción. Si no aparece en tu bandeja de entrada, podría estar en tu bandeja de Spam.</p>

	<form id="subscribe" class="form-horizontal" method="POST" action="<?php echo home_url('/'); ?>" role="form">
		<div class="form-group">
			<label for="email" class="col-lg-2 control-label">Email<em>*</em></label>
			<div class="col-lg-10">
				<input class="form-control" type="email" name="email" placeholder="usuario@email.com" required>
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-lg-2 control-label">Nombre</label>
			<div class="col-lg-10">
				<input class="form-control" type="text" name="name" placeholder="Nombre">
			</div>
		</div>
								
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<button class="btn btn-default btn.lg btn-block" name="subscribe">Suscribete</button>
			</div>
		</div>
	</form>

	<div class="subscribe-msg">
		<?php if (isset($_GET['subscribe-error']) && $_GET['subscribe-error'] == 1): ?>
			<p class="alert alert-danger">El campo de Email es obligatorio</p>
		<?php elseif (isset($_GET['subscribe']) && $_GET['subscribe'] == 'success'): ?>
			<p class="alert alert-success">Todo ha salido OK. Revise su correo para confirmar el alta.</p>
		<?php endif; ?>
	</div>
<?php echo $cTag; ?>