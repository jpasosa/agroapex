<?php use_helper('I18N', 'Date', 'jQuery') ?>
<?php include_partial('aUserAdmin/assets', array('helper' => $helper)) ?>

<div class="a-admin-container <?php echo $sf_params->get('module') ?>">
  <?php include_partial('aUserAdmin/form_bar', array('title' => __('Editing User "%%username%%"', array('%%username%%' => $sf_guard_user->getUsername()), 'apostrophe'))) ?>

	<?php slot('a-subnav') ?>
  <div class="a-subnav-wrapper admin">
		<div class="a-subnav-inner">
 			<?php include_partial('aUserAdmin/form_header', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
		</div>	
  </div>
	<?php end_slot() ?>

  <div class="a-admin-content main">
	  <?php include_partial('aUserAdmin/flashes') ?>
 		<?php include_partial('aUserAdmin/form', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div class="a-admin-footer">
 		<?php include_partial('aUserAdmin/form_footer', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

</div>
