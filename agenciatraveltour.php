<?php
/*
 * Plugin Name: Agencias filiadas
 * Plugin URI: http://thiagotmendes.com.br/
 * Description: Desenvolvido diretamente para projeto traveltour de cadastro de agências.
 * Author: Thiago Mendes
 * Version: 1.0.0
 * Author URI: http://thiagotmendes.com.br/
 * License: GPL2+
 */
define('WP_V_REQUISITO', '3.0.0');
// utilizaar datepicker
function assets_plugin(){
  wp_enqueue_script('jquery-ui-datepicker');
  wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
  wp_enqueue_style('jquery-ui');

  //  wp_enqueue_style('boot', WP_PLUGIN_URL .'/cad-agencia/assets/css/main.min.css', false, '1.0.0', 'all');
  wp_enqueue_script( 'correios', plugin_dir_url( __FILE__ ) .'/assets/js/consultaCorreios.js', array(),'3.3.6', 'screen' );
  wp_enqueue_script( 'mascaras', plugin_dir_url( __FILE__ ) .'/assets/js/masked.jquery.js', array(),'3.3.6', 'screen' );
  wp_enqueue_script( 'funcoes-plugin', plugin_dir_url( __FILE__ ) .'/assets/js/funcoes.js', array(),'3.3.6', 'screen' );
}

add_action( 'admin_enqueue_scripts', 'assets_plugin' );

// adiciona o custom post type
require_once ('addCustomPostType.php');
// adiciona o meta box
require_once ('metabox-dadosAgencia.php');
// adiciona metabox responsavel
require_once ('metabox-dadosResponsavel.php');
// adiciona ao dashboard os ultimos cadastrados
require_once('dashboard-ultimoscadastros.php');
// adiciona ao dashboard os cadastrour proximos do vencimento
require_once('dashboard-cadastrouvencimento.php');
// chama o formulario da home
require_once('form-frontend.php');
// chama setor de exportar os emails
require_once('exportemail.php');

// adiciona a versão compativel com o plugin
function plugin_ativacao(){
  global $wp_version;

  if ( version_compare( $wp_version, WP_V_REQUISITO, '<' ) )
    wp_die('É necessário o WordPress versão ' . WP_V_REQUISITO . ' ou superior' );
}

register_activation_hook(__FILE__, 'plugin_ativacao');
