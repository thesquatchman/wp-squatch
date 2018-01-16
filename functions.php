<?php

require 'lib/walker.php';


class wp_squatch_theme {
	
	function init() {
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_squatch_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_squatch_styles' ) );

		add_action( 'init', array( $this, 'register_menus' ) );
		add_action( 'init', array( $this, 'register_sidebar' ) );
		add_action( 'after_setup_theme', array( $this, 'add_theme_support' ) );
		
	}


	/* Enqueue CSS and JS files and dependencies */
	function wp_squatch_scripts() {
		
		wp_enqueue_script( 'wp-squatch-scripts', get_template_directory_uri().'/src/js/squatch.min.js', array( 'jquery' ), null, false );
		
	}

	function wp_squatch_styles() {
		
		wp_enqueue_style( 'wp-squatch-styles', get_template_directory_uri().'/src/css/squatch.min.css', array(), null, 'all' );
		
	}
	
	
	// theme support
	function add_theme_support(){
		
		add_theme_support( 'post-thumbnails' );
		add_post_type_support( 'page', 'excerpt' );
		
	}

	// Menus
	function register_menus() {
		
	  register_nav_menus(
	    array(
	      'header-menu' => __( 'Header Menu' ),
	      'footer-menu' => __( 'Footer Menu' )
	    )
	  );
	  
	}

	//Widget areas
	function register_sidebar() {
		
		register_sidebar(array(
			'name' 			=> 'Sidebar',
			'id' 			=> 'sidebar',
			'before_widget' => '<aside>',
			'after_widget' 	=> '</aside>',
			'before_title' 	=> '<h4>',
			'after_title' 	=> '</h4>'
		));
		
	}

}

$wpsquatchtheme = new wp_squatch_theme();
$wpsquatchtheme->init();

?>