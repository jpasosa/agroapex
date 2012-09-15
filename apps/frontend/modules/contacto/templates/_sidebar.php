<?php slot('lado-der') ?>
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
    <hr />
    <a class="link" href=""><img src="/images/contacto/link_facebook.png" width="156px" height="26px" alt="Seguinos en Facebook" /></a>
    <a class="link" href=""><img src="/images/contacto/link_twitter.png" width="156px" height="26px" alt="Seguinos en Twitter" /></a>    
<?php end_slot() ?>