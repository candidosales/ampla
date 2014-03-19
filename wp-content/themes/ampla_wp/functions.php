<?php
require ('custom-post/geral.php');
require ('custom-post/filial.php');
require ('custom-post/vendedor.php');
require ('custom-post/oferta-da-semana.php');
require ('custom-post/produto.php');
require ('custom-post/publicidade.php');
require ('custom-post/custom-title-placeholder.php');

if (function_exists('add_theme_support')) { 
	add_theme_support('post-thumbnails'); 
	add_image_size( 'produto-thumb', 412, 412, true );
  	add_image_size( 'produto-thumb-1', 100, 100, true );
  	add_image_size( 'produto-thumb-2', 200, 200, true );
  	add_image_size( 'vendedor-thumb', 376, 500, true );
  	add_image_size( 'vendedor-thumb-1', 100, 100, true );
  	add_image_size( 'vendedor-thumb-2', 250, 250, true );
  	add_image_size( 'noticias-thumb', 325, 264, true );
  	add_image_size( 'noticias-thumb-1', 82, 82, true );
  	add_image_size( 'filial-thumb', 325, 264, true );
  	add_image_size( 'filial-thumb-1', 100, 100, true );
  	add_image_size( 'filial-thumb-2', 435, 540, true );
  	add_image_size( 'filial-thumb-3', 1024, 768, true );
  	add_image_size( 'publicidade-thumb', 58, 30, true );
  	add_image_size( 'publicidade-thumb-1', 100, 100, true );
  	add_image_size( 'publicidade-banner-thumb', 912, 172, true );
  add_theme_support('menus');
}


function modify_footer_admin () {
  echo '© <a style="color:#698dba;font-weight:bold;font-family:Arial;font-size:14px;" href="http://www.wings.ws"><img style="padding: 0 5px 0 0" width="30" height="30" src="'.get_bloginfo('template_url').'/img/wings.png" _moz_resizing="true">Wings</a>';
  echo ' | <a href="http://WordPress.org">WordPress</a>.';
}
add_filter('admin_footer_text', 'modify_footer_admin');

// Custom WordPress Admin

add_action("login_head", "my_login_head");
function my_login_head() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('".get_bloginfo('template_url')."/img/logo-admin.png') no-repeat scroll center top transparent;
	}
	</style>
	";
}
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
 
function my_login_logo_url_title() {
    return 'Ampla Construções';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


add_action('admin_head', 'my_custom_logo');
function my_custom_logo() {
	echo '
<style type="text/css">
#wp-admin-bar-wp-logo > .ab-item .ab-icon { 
	background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/logo-admin-icon.png) !important; 
	background-position: 0 0;
	}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
	background-position: 0 0;
	}	
</style>
';

}

// Add a widget in WordPress Dashboard
function wpc_dashboard_widget_function() {
	// Entering the text between the quotes

	echo '<ul>
	<li><strong>Data de lançamento:</strong> Agosto 2013</li>
	<li><strong>Autores:</strong> Cândido Sales e Nilo Coelho.</li>
	<li><strong>Hospedagem:</strong> Amazon Web Services</li>
	<li><strong>Manual:</strong> <a href="'.get_template_directory_uri().'/manual.pdf" target="_blank" title="Manual Administrativo">PDF</a></li>
	</ul>';
}
function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'Informações técnicas', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );

add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');
function wpc_dashboard_widgets() {
	global $wp_meta_boxes;
	// Today widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	// Last comments
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	// Incoming links
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	// Plugins
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	// Other news wordpress
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
}

function add_custom_script() {  

	wp_register_script('wysihtml5', get_template_directory_uri() . '/js/vendor/wysihtml5-0.4.0pre.js', array('jquery'), false, true);
    wp_enqueue_script('wysihtml5');

     wp_register_script('prettify', get_template_directory_uri() . '/js/vendor/prettify.js', array('wysihtml5'), false, true );
    wp_enqueue_script('prettify');

     wp_register_script('bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array('prettify'), false, true );
    wp_enqueue_script('bootstrap');

    wp_register_script('bootstrap-wysihtml5', get_template_directory_uri() . '/js/vendor/bootstrap-wysihtml5.js', array('bootstrap'), false, true );
    wp_enqueue_script('bootstrap-wysihtml5');

     wp_register_script('bootstrap-wysihtml5-pt-BR', get_template_directory_uri() . '/js/vendor/bootstrap-wysihtml5.pt-BR.js', array('bootstrap-wysihtml5'), false, true );
    wp_enqueue_script('bootstrap-wysihtml5-pt-BR');
   

    wp_register_script('admin', get_template_directory_uri() . '/js/vendor/admin.js', array('jquery'), false, true);  
    wp_enqueue_script('admin');  
} // end add_custom_attachment_script  
add_action('admin_enqueue_scripts', 'add_custom_script');


function add_custom_style() {  
	wp_register_style( 'bootstrap',get_template_directory_uri() . '/css/bootstrap.css', false );
    wp_enqueue_style( 'bootstrap');

    wp_register_style( 'prettify',get_template_directory_uri() . '/css/prettify.css', false );
    wp_enqueue_style( 'prettify');

	wp_register_style( 'bootstrap-wysihtml5',get_template_directory_uri() . '/css/bootstrap-wysihtml5.css', false );
    wp_enqueue_style( 'bootstrap-wysihtml5');

    wp_register_style( 'admin',get_template_directory_uri() . '/css/admin.css', false );
    wp_enqueue_style( 'admin');
}

add_action('admin_print_styles', 'add_custom_style');

