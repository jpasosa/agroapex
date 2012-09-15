<?php use_helper('I18N') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<?php use_helper('a') ?>
	<?php // If this page is an admin page we don't want to present normal navigation relative to it. ?>
	<?php $page = aTools::getCurrentNonAdminPage() ?>
<head>
	<?php include_http_metas() ?>
	<?php include_metas() ?>
	<?php include_title() ?>
	<?php // 1.3 and up don't do this automatically (no common filter) ?>
  <?php include_stylesheets() ?>
	<?php include_javascripts() ?>
	<link rel="shortcut icon" href="/Agroapex.ico" />

	<!--[if lt IE 7]>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			aIE6(<?php echo ($sf_user->isAuthenticated())? 'true':'false' ?>, <?php echo json_encode(__('You are using IE6! That is just awful! Apostrophe does not support editing using Internet Explorer 6. Why don\'t you try upgrading? <a href="http://www.getfirefox.com">Firefox</a> <a href="http://www.google.com/chrome">Chrome</a> 	<a href="http://www.apple.com/safari/download/">Safari</a> ', null, 'apostrophe')) ?>);
		});		
	</script>
	<![endif]-->	

	<!--[if lte IE 7]>
		<link rel="stylesheet" type="text/css" href="/apostrophePlugin/css/a-ie.css" />	
	<![endif]-->
		
</head>

<?php // body_class allows you to set a class for the body element from a template ?>
<body class="<?php if (has_slot('body_class')): ?><?php include_slot('body_class') ?><?php endif ?><?php if (($sf_user->isAuthenticated())): ?> logged-in<?php endif ?>">
  
  <?php include_partial('a/globalTools') ?>

	<div id="a-wrapper" class="a-wrapper">
      
    <?php slot('a-search','');//sin buscador por ahora ?>
    <?php if (has_slot('a-search')): ?>
      <?php include_slot('a-search') ?>
    <?php else: ?>
      <?php include_partial('a/search') ?>
    <?php endif ?>
    
		<?php include_partial('a/header',array('page'=>$page)) ?>

		<div id="a-content" class="a-content <?php if (has_slot('content_class')) include_slot('content_class'); ?>">
      <div class="lado-izq">
        <?php echo $sf_data->getRaw('sf_content') ?>
      </div>
      <div class="lado-der">
				<?php if (has_slot('a-subnav')) include_slot('a-subnav') ;?>
				<?php if (has_slot('lado-der')) include_slot('lado-der') ;?>
      </div>    
		</div>
    <div id="a-footer">
      <span class="copy">© agroapex 2010. Todos los derechos reservados.</span>
    </div>
	</div>

	<script type="text/javascript">   
    // Hago que las dos columnas tengan la misma altura
    $(function() {
      var altura_izq = $(".lado-izq").height();
      var altura_der = $(".lado-der").height();
      var altura_wrapper = $(".a-wrapper").height();
      if(altura_der <= altura_izq) {
          var altura_izq_real = altura_izq;
          var altura_der_real = altura_izq_real + 200;
          $('.lado-der').css('height', +altura_der_real);
        }
        else {
          if(altura_der > altura_wrapper - 150) {
            var altura_der_real = altura_der + 200;
            $('.lado-der').css('height', +altura_der_real);			
          }
          else {
          var altura_der_real = altura_der + 170;
          $('.lado-der').css('height', +altura_der_real);
          }
        }
     });
  </script>

</body>
</html>
<!--
      <script type="text/javascript">   
        // Hago que las dos columnas tengan la misma altura
        $(function() {
          var altura_izq = $(".lado-izq").height();
          var altura_der = $(".lado-der").height();
          if(altura_izq != 0 || altura_der != 0) {
            if(altura_izq > altura_der) {
              var altura_izq_real = altura_izq + 150;
              var altura_der_real = altura_izq + 178;
              $('.lado-izq').css('height', +altura_izq_real);
              $('.lado-der').css('height', +altura_der_real);
            }
            else {
              var altura_izq_real = altura_der + 150;
              var altura_der_real = altura_der + 178;
              $('.lado-izq').css('height', +altura_izq_real);
              $('.lado-der').css('height', +altura_der_real);
            }
          }
          });
      </script>
      -->