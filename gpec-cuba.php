<?php
/*
Plugin Name: gpec-cuba
Description: Plugin para el trabajo de flora cubana en WordPress (buscador de especies)
Version: 1.0
Author: Ing. Yadier A. De Quesada
Author URI: gerbet
License: GPL2
*/

defined('ABSPATH') || exit;

include_once "models/models.php";

//Creating the menu
function gpec_species_menu(){
//falta poner un icono al plugin
    add_menu_page('Gpec Species List', 'Gpec Species List', 'manage_options', 'species_search_menu', 'output_menu','dashicons-feedback');
    add_submenu_page('species_search_menu', 'Gpec Species Submenu', 'Submen Test', 'manage_options', 'species_submenu', 'output_submenu');
}

add_action('admin_menu','gpec_species_menu');

/**
 * Menu principal del Plugin
 * @return string
 */
function output_menu() {
    $html = "<h1>Sobre el Plugin GPEC-Flora</h1>
  <p>Funcionalidades:
    <ul>
      <li>1-Crear Tablas de BD Gpec</li>
      <li>2-Cargar datos csv desde Upload</li>
      <li>3- Crear pagina checklist con shortcode [gpec-checklist-search]</li>
      <li>3.1- Crear pagina redlist con shortcode [gpec-redlist-search]</li>
      <li>3.2- Crear pagina invasoreas con shortcode [gpec-invasoreaslist-search]</li>
    </ul>
  </p>
  <p>
  <h3>Requirements Plugins</h3>
  <p><strong>WP CSV TO DB</strong> (Para carga inicial de datos)
      <div>Versión: 2.6
        Autor: Tips and Tricks HQ, josh401
        Última actualización: hace 2 meses
        Necesita la versión de WordPress: 3.0 o superior
        Compatible con: 5.6.1
      </div>
      <a href='https://es.wordpress.org/plugins/wp-csv-to-database/'>Link de Descarga en Wordpress</a>
  </p>
  <p><strong>Leaflet Map</strong> (Para localizacion con mapas)
      <div>Versión: 2.22.1
      Autor: bozdoz
      Última actualización: hace 2 meses
      Necesita la versión de WordPress: 4.6 o superior
      Compatible con: 5.5.3
      </div>
      <a href='https://es.wordpress.org/plugins/leaflet-map/'>Link de Descarga en Wordpress</a>
  </p>  
</p>
  <p>Esperamos que lo disfrutes!</p>";
    echo $html;
}
/**
 * SubMenu del Plugin
 * @return string
 */
function output_submenu() {
    echo '<h1>Este es el submen&uacute;</h1>';
}


// Cuando el plugin se active se crea la tabla para recoger los datos si no existe
register_activation_hook(__FILE__, 'gpec_cuba_init');
/**
 * Crea la tabla para recoger los datos del formulario
 * @return void
 */
function gpec_cuba_init()
{
    global $wpdb; // Este objeto global permite acceder a la base de datos de WP
    $tabla_gpec = $wpdb->prefix . 'gpec';
    $charset_collate = $wpdb->get_charset_collate();
    $query = ""; //Todo generar las querys de las tablas
    include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($query); // Lanza la consulta para crear la tabla de manera segura

    /* Crear  pagina gpec-checlist directamente a BD en worpress */
    $checklist = array(
        'post_title'    => 'gpec checklist',
        'post_content'  => 'This is my post.',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_category' => array(1),
        'post_type'     => 'page'
    );
    // Insert the post into the database
    wp_insert_post( $checklist );

    /* Crear  pagina gpec-redlist directamente a BD en worpress */
    $redlist = array(
        'post_title'    => 'gpec redlist',
        'post_content'  => 'This is my post.',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_category' => array(1),
        'post_type'     => 'page'
    );
    // Insert the post into the database
    wp_insert_post( $redlist );

    /* Crear  pagina gpec-invasoreas directamente a BD en worpress */
    $invaseoreas = array(
        'post_title'    => 'gpec invasoreas',
        'post_content'  => 'This is my post.',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_category' => array(1),
        'post_type'     => 'page'
    );
    // Insert the post into the database
    wp_insert_post( $invaseoreas );

}

/*styles and js */
add_action('wp_enqueue_scripts', 'callback_for_styles_and_scripts');
/**
 * Agregar estilos y scripts
 * @return void
 */
function callback_for_styles_and_scripts() {
    wp_register_style( 'namespace', plugins_url('/assets/css/gpec.css',__FILE__ ));
    wp_register_style( 'namespacecss', plugins_url('/assets/bootstrap/css/bootstrap.css',__FILE__ ));
    wp_enqueue_style( 'font-awesome', plugins_url( '/assets/font-awesome.css' ), array(), '4.0.0' );
    wp_enqueue_style( 'namespace' );
    wp_enqueue_script( 'namespaceformyscript', plugins_url('/assets/js/gpec.js',__FILE__), array( 'jquery' ) );
    wp_enqueue_script( 'namespacebootstrap', plugins_url('/assets/bootstrap/js/bootstrap.js',__FILE__), array( 'bootstrap' ) );
}

//shortcode Formulario de Busqueda de checklist
add_shortcode( 'gpec-checklist-search', 'display_checklist_search' );
/**
 * Formulario de Busqueda
 * @return string $html
 */
function display_checklist_search(){
    ob_start();
    include_once( plugin_dir_path( __FILE__ ) . '/templates/checklist-search-form.php' );
    $ret = ob_get_contents();
    ob_end_clean();
    return $ret;
}

//shortcode Formulario de Busqueda de Redlist
add_shortcode( 'gpec-redlist-search', 'display_redlist_search' );
/**
 * Formulario de Busqueda
 * @return string $html
 */
function display_redlist_search(){
    ob_start();
    include_once( plugin_dir_path( __FILE__ ) . '/templates/redlist-search-form.php' );
    $ret = ob_get_contents();
    ob_end_clean();
    return $ret;
}

//shortcode Formulario de Busqueda de Invasoreaslist
add_shortcode( 'gpec-invasoreaslist-search', 'display_invasoreaslist_search' );
/**
 * Formulario de Busqueda Invasoreas List
 * @return string $html
 */
function display_invasoreaslist_search(){
    ob_start();
    include_once( plugin_dir_path( __FILE__ ) . '/templates/invasoreaslist-search-form.php' );
    $ret = ob_get_contents();
    ob_end_clean();
    return $ret;
}

/* Add filter para las actions de gpec */
add_filter( 'page_template', 'wpa3396_page_template' );
function wpa3396_page_template( $page_template )
{
    if ( is_page( 'gpec-checklist' ) ) {
        $page_template = plugin_dir_path( __FILE__ ) . '/templates/page-gpec-checklist.php';
    }
    if ( is_page( 'gpec-redlist' ) ) {
        $page_template = plugin_dir_path( __FILE__ ) . '/templates/page-gpec-redlist.php';
    }
    if ( is_page( 'gpec-invasoreas' ) ) {
        $page_template = plugin_dir_path( __FILE__ ) . '/templates/page-gpec-invasoreaslist.php';
    }
    return $page_template;
}

add_action( 'back_button', 'wpse221640_back_button' );
function wpse221640_back_button()
{
    if ( wp_get_referer() )
    {
        $back_text = __( '&laquo; Back' );
        $button    = "\n<button id='my-back-button' class='btn button my-back-button' onclick='javascript:history.back()'>$back_text</button>";
        echo ( $button );
    }
}




