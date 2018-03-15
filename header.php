<!doctype html> 
<html class="" <?php language_attributes(); ?>> <!--<![endif]-->
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri();?>/public/img/apple-touch-icon.png">
			<?php wp_head(); ?>
      
  </head>
  <body <?php body_class(); ?>>
 	  <header class="header-container">
        <nav class="navbar contained">
          <a href="<?php echo home_url();?>" class="brand">Wp Squatch</h1></a>
	        <button class="navbar-toggle" data-toggle="open" data-target=".navbar">
	        	<span class="toggle-bar"></span>
	        </button>  
	        <?php wp_nav_menu( array(
			           'theme_location'	=> 'primary',
			           'menu_class'		=>	'nav',
			           'container'       => '',
								 'container_class' => '',
			           'depth'			=>	0,
			           'fallback_cb'	=>	false,
			           'walker'			=>	new Wp_Squatch_Nav_Walker
			           )); 
			    ?>    
        </nav>
	  </header>