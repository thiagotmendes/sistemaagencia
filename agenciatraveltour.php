<?php
/*
 * Plugin Name: Agencias filiadas
 * Plugin URI: http://www.treinaweb.com.br/
 * Description: Desenvolvido diretamente para projeto traveltour de cadastro de agências.
 * Author: Thiago Mendes
 * Version: 1.0.0
 * Author URI: http://thiagotmendes.com.br/
 * License: GPL2+
 */
define('WP_V_REQUISITO', '3.0.0');
// utilizaar datepicker
wp_enqueue_script('jquery-ui-datepicker');
wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
wp_enqueue_style('jquery-ui');

//  wp_enqueue_style('boot', WP_PLUGIN_URL .'/cad-agencia/assets/css/main.min.css', false, '1.0.0', 'all');
wp_enqueue_script( 'correios', plugin_dir_url( __FILE__ ) .'/assets/js/consultaCorreios.js', array(),'3.3.6', 'screen' );
wp_enqueue_script( 'mascaras', plugin_dir_url( __FILE__ ) .'/assets/js/masked.jquery.js', array(),'3.3.6', 'screen' );
wp_enqueue_script( 'funcoes', plugin_dir_url( __FILE__ ) .'/assets/js/funcoes.js', array(),'3.3.6', 'screen' );

// adiciona o custom post type
require_once ('addCustomPostType.php');
//adiciona o meta box
require_once ('metabox-dadosAgencia.php');
// adiciona metabox responsavel
require_once ('metabox-dadosResponsavel.php');


// adiciona a versão compativel com o plugin
function plugin_ativacao(){
  global $wp_version;

  if ( version_compare( $wp_version, WP_V_REQUISITO, '<' ) )
    wp_die('É necessário o WordPress versão ' . WP_V_REQUISITO . ' ou superior' );
}

register_activation_hook(__FILE__, 'plugin_ativacao');
