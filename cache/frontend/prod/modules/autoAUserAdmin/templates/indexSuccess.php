<?php use_helper('I18N', 'Date', 'jQuery') ?>
<?php include_partial('aUserAdmin/assets', array('helper' => $helper)) ?>

<div class="a-admin-container <?php echo $sf_params->get('module') ?>">

  <?php include_partial('aUserAdmin/list_bar', array('filters' => $filters)) ?>

	<?php slot('a-subnav') ?>
	<div class="a-subnav-wrapper admin">
		<div class="a-subnav-inner">
			<ul class="a-controls a-admin-action-controls">
					  			<li class="filters"><?php echo jq_link_to_function("Filters", "$('#a-admin-filters-container').slideToggle()" ,array('class' => 'a-btn icon a-settings', 'title'=>'Filter Data')) ?></li>
									<li><?php include_partial('aUserAdmin/list_header', array('pager' => $pager)) ?></li>
			</ul>
		</div>
  </div>
	<?php end_slot() ?>

	<div class="a-admin-content main">
		<ul id="a-admin-list-actions" class="a-controls a-admin-action-controls">
  		<?php include_partial('aUserAdmin/list_actions', array('helper' => $helper)) ?>		
		</ul>
				  <?php include_partial('aUserAdmin/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
		
		<?php include_partial('aUserAdmin/flashes') ?>
					<form action="<?php echo url_for('a_user_admin_collection', array('action' => 'batch')) ?>" method="post" id="a-admin-batch-form">
				<?php include_partial('aUserAdmin/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
				<ul class="a-admin-actions">
		      <?php include_partial('aUserAdmin/list_batch_actions', array('helper' => $helper)) ?>
		    </ul>
				  </form>
			</div>

  <div class="a-admin-footer">
    <?php include_partial('aUserAdmin/list_footer', array('pager' => $pager)) ?>
  </div>

</div>
