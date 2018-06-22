<?php
require_once('wp_bootstrap_navwalker.php');

function register_my_menus() {
	register_nav_menus(
	array(
		'home-menu' => __( 'Menu principal' ),
	)
	);
}
add_action( 'init', 'register_my_menus' );


function agregar_estilos_y_js() {

	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.1', 'all');
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'scerini', get_stylesheet_directory_uri() . '/js/revistarea.js', array( 'bootstrap', 'jquery' ), '1.0', false );
}

add_action( 'wp_enqueue_scripts', 'agregar_estilos_y_js' );


function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	} else {
		$content = implode(" ",$content);
	}	
	$content = preg_replace('/[.+]/','', $content);
	$content = apply_filters('the_content', $content); 
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

function add_taxonomies_to_pages() {
	 register_taxonomy_for_object_type( 'category', 'page' );
	 add_post_type_support( 'page', 'excerpt' );
 }
add_action( 'init', 'add_taxonomies_to_pages' );
add_theme_support( 'post-thumbnails' );




function wporg_add_custom_box()
{
    $screens = ['post', 'wporg_cpt'];
    foreach ($screens as $screen) {
        add_meta_box(
            'wporg_box_id',           // Unique ID
            'Autor',  // Box title
            'wporg_custom_box_html',  // Content callback, must be of type callable
            $screen                   // Post type
        );

         add_meta_box(
            'bajada_id',           // Unique ID
            'Bajada',  // Box title
            'bajada_input',  // Content callback, must be of type callable
            $screen                   // Post type
        );
    }
}
add_action('add_meta_boxes', 'wporg_add_custom_box');

function wporg_custom_box_html($post)
{
	$value = get_post_meta($post->ID, '_wporg_meta_key', true);
    ?>
    <label for="wporg_field">Nombre del Autor:</label>
    <input tipe="text" name="wporg_field" id="wporg_field" class="postbox" value="<?php echo $value?>">
    <?php
}

function bajada_input($post){
	$bajadavalue = get_post_meta($post->ID, '_bajada_meta_key', true);
    ?>
    <label for="bajada_field">Bajada:</label>
    <input tipe="text" name="bajada_field" id="bajada_field" class="postbox" value="<?php echo $bajadavalue?>">
    <?php
}


function wporg_save_postdata($post_id)
{
    if (array_key_exists('wporg_field', $_POST)) {
        update_post_meta(
            $post_id,
            '_wporg_meta_key',
            $_POST['wporg_field']
        );
    }

    if (array_key_exists('bajada_field', $_POST)) {
        update_post_meta(
            $post_id,
            '_bajada_meta_key',
            $_POST['bajada_field']
        );
    }

}
add_action('save_post', 'wporg_save_postdata');

?>