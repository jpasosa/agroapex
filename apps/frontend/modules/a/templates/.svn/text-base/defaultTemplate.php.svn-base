<?php use_helper('a') ?>
<? slot('content_class',implode(' ',explode('/',$page['slug']))); ?>

<?php $blogOptions = array('slideshowOptions' => array('width' => 360, 'height' => 220,  )) ?>
<?php $eventOptions = array('slideshowOptions' => array('width' => 360, 'height' => 220,  )) ?>
<?php $blogCompactOptions = array('excerptLength' => 40, 'slideshowOptions' => array('width' => 200, 'height' => 130,  ))  ?>
<?php $eventCompactOptions = array('excerptLength' => 40, 'slideshowOptions' => array('width' => 120, )) ?>

<?php // Breadcrumb is removed for the home page template because it is redundant ?>
<?php slot('a-breadcrumb', '') ?>

<?php // Subnav is removed for the home page template because it is redundant ?>
<?php slot('a-subnav', '') ?>

<?php $page = aTools::getCurrentPage() ?>


<?php a_area('izquierda', array(
	'allowed_types' => array(
		'aRichText', 
		'aSlideshow', 
		'aVideo',
		'aImage', 
		'aFeed', 
		'aPDF',
		'aButton', 
		'aText',	  
	),
  'type_options' => array(
    'aText' => array('multiline' => true),
		'aRichText' => array('tool' => 'Main'), 	
		'aSlideshow' => array("width" => 595, "flexHeight" => true),
		'aVideo' => array('width' => 595, 'flexHeight' => true, 'resizeType' => 's'),		
		'aImage' => array('width' => 595, 'flexHeight' => true, 'resizeType' => 's'),
		'aFeed' => array('width' => 100),
		'aButton' => array('width' => 400, 'flexHeight' => true, 'resizeType' => 's'),
		'aPDF' => array('width' => 595, 'flexHeight' => true, 'resizeType' => 's'),		
	))) ?>

<?php slot('lado-der') ?>
  <?php if($page['level']==2): ?>
    <?php $a = explode('/',$page['slug']); ?>
    <?php $a = $a['1']; ?>
    <?php $a = str_replace("-"," ",$a); ?>
    <?php echo '<h2 class="tit-menu-der">'.ucwords($a).'</h2>'; ?>
  <?php else: ?>
    <?php if($page->hasChildren()): ?>
      <?php $a = implode(' ',explode('/',$page['slug'])); ?>
      <?php $a = str_replace("-"," ",$a); ?>
      <?php echo '<h2 class="tit-menu-der">'.
                  ucwords($a).
                  '</h2>'; ?>
    <?php endif ?>
  <?php endif ?>

  <?php if((($page->hasChildren()) || $page['level']==2) && !($page['level']==0) ): ?>
    <?php include_component ('aNavigation', 'tabs', array(
        'root' => $page['slug'],
        'active' => $page['slug'],
        'name' => 'menu-derecho',
        'draggable' => true,
        'dragIcon' => false ));?>
  <?php endif ?>

  <?php a_area('derecha', array(
    'allowed_types' => array(
      'aRichText', 
      'aVideo',
      'aImage', 
      'aFeed', 
      'aPDF', 
      'aButton', 
      'aText',
    ),
    'type_options' => array(
      'aRichText' => array('tool' => 'Sidebar'),
      'aSlideshow' => array('width' => 190, 'flexHeight' => true, 'resizeType' => 's'),		
      'aVideo' => array('width' => 190, 'flexHeight' => true, 'resizeType' => 's'),				
      'aImage' => array('width' => 190, 'flexHeight' => true, 'resizeType' => 's'),
      'aFeed' => array(),		
      'aButton' => array('width' => 190, 'flexHeight' => true, 'resizeType' => 's'),
      'aPDF' => array('width' => 190, 'flexHeight' => true, 'resizeType' => 's'),
  ))) ?>
<?php end_slot() ?>