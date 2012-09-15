<div id="a-header" class="a-header">
      <?php a_slot("logo", 'aButton', array("global" => true, "width" => 369, "height" => 104, "resizeType" => "c", "link" => "/", "defaultImage" => "/images/logo.jpg")) ?>
      <ul id="icon-links">
        <li> <?php echo link_to(' ', '@contacto_index', array('class' => 'sobre')) ?> </li>
        <li class="separator">|</li>
        <li> <?php echo link_to(' ', '@homepage', array('class' => 'casa')) ?> </li>
      </ul>
      <ul class="a-login">
      <?php if ($sf_user->isAuthenticated()): ?>
        <li id="a-logged-in-as">Bienvenido <span><?php echo $sf_user->getGuardUser()->getUsername() ?></span></li>									
      <?php else: ?>
        <li>
		      <?php include_component('a','signinForm') ?>
          <!--<a href="" class="link-registro">¿todavía no estás registrado?</a>-->
	      </li>
      <?php endif ?>
      </ul>      
 			<?php include_component('aNavigation', 'tabs', array('root' => '/', 'active' => $page['slug'], 'name' => 'main', 'draggable' => true, 'dragIcon' => false)) # Top Level Navigation ?>
</div>
