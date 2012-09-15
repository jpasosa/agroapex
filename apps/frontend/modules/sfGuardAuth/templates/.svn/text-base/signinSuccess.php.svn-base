<?php use_helper('I18N', 'jQuery') ?>

<?php slot('a-tabs', '') ?>
<?php slot('a-login', '') ?>
<?php slot('content_class', 'signin') ?>

<?php if(!$form->hasErrors()):?>
				<p> Debe iniciar sesión para ver esta pagina </p>
<? endif ?>
<style>
	.a-login {display: none;}
</style>

<div id="signin">
	<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" id="signin-form" <?php echo ($form->hasErrors())? 'class="has-errors"':''; ?>>
		<?php echo $form->renderHiddenFields() ?>
		<?php echo $form->renderGlobalErrors() ?>

		<div class="a-form-row">
			<label for="signin_username">Usuario</label>
			<?php //echo $form['username']->renderLabel() ?>
			<?php echo $form['username']->render() ?>
			<?php echo $form['username']->renderError() ?>
		</div>
		
		<div class="a-form-row">
			<label for="signin_password">Contraseña</label>
			<?php //echo $form['password']->renderLabel() ?>
			<?php echo $form['password']->render() ?>
			<?php echo $form['password']->renderError() ?>
		</div>
<!-- BOTON RECORDAR USUARIO
		<div class="a-form-row">
			<label for="signin_remember">Recordar Contrasenna</label>
			<?php //echo $form['remember']->renderRow() ?>
			<?php //echo $form['password']->renderLabel() ?>
			<?php //echo $form['remember']->render() ?>
		</div>
-->
		<ul class="a-form-row submit">
			<li>
				<input type="submit" class="a-submit" value="<?php echo __('Entrar', null, 'apostrophe') ?>" />
			</li>
		</ul>
		
	</form>
</div>