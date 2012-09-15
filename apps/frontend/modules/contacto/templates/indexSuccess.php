<?php use_helper('a') ?>
<?php slot('content_class', 'contacto') ?>
<form class="form-contacto" action="<?php echo url_for('@contacto_action?action=send') ?>" method="POST">
	<?php  echo $form->renderHiddenFields() ?>
  <?php // echo $form ?>
  <?php //echo $form['nombre']->renderRow(); ?>
  <ul>
    <li class="requerido">
      <?php echo $form['nombre']->renderLabel('Nombre y Apellido (*)', array('class' => 'primero')); ?>
      <?php echo $form['nombre']->renderError(); ?>
      <?php echo $form['nombre']->render(); ?>
    </li>
    <li>
      <?php echo $form['empresa']->renderLabel(); ?>
      <?php echo $form['empresa']->render(); ?>
    </li>
    <li>
      <?php echo $form['telefono']->renderLabel(); ?>
      <?php echo $form['telefono']->render(); ?>
    </li>
    <li class="requerido">
      <?php echo $form['email']->renderLabel(); ?>
      <?php echo $form['email']->renderError(); ?>
      <?php echo $form['email']->render(); ?>
    </li>
  </ul>
  <div class="contenedor-textarea">
    <?php // echo $form['comentarios'] ?>
    <?php echo $form['comentarios']->renderLabel('Comentarios (*)'); ?>
    <?php echo $form['comentarios']->renderError(); ?>
    <?php echo $form['comentarios']->render(); ?>
  </div>
  <input class="envio-contacto" type="submit" value="Enviar" />
</form>
<?php include_partial('sidebar') ?>