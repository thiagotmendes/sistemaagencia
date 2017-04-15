<?php
// dados da agencia
add_action( 'add_meta_boxes', 'add_metabox_dados_agencia' );
function add_metabox_dados_agencia() {
  add_meta_box(
    'dados_agencia', //ID
    'Dados Agência', //Título
    'mb_dados_agencia_cb', //callback
    'agencia', //Post Type
    'normal', //Posição
    'default' //Prioridade
  );
}

function mb_dados_agencia_cb() {
  global $post;
  // carrega os valores salvos
  $cnpj = get_post_meta($post->ID, 'cnpj', true);
  $data_abertura = get_post_meta($post->ID, 'data_abertura', true);

  $razao_social = get_post_meta($post->ID, 'razao_social', true);
  $nome_fantasia = get_post_meta($post->ID, 'nome_fantasia', true);
  $cadastrour = get_post_meta($post->ID, 'cadastrour', true);

  $inscricao_estadual = get_post_meta($post->ID, 'inscricao_estadual', true);
  $inscEstadual_isento = get_post_meta($post->ID, 'inscEstadual_isento', true);
  $inscricao_municipal = get_post_meta($post->ID, 'inscricao_municipal', true);
  $porte_empresa      = get_post_meta($post->ID, 'porte_empresa', true);

  $data_ini_cadastrour = get_post_meta($post->ID, 'data_ini_cadastrour', true);
  $data_fim_cadastrour = get_post_meta($post->ID, 'data_fim_cadastrour', true);

  // chama o formulario
  include ('formulario-agencia.php');
}

function save_carga_agencia(){
  global $post;
  $cnpj                 = $_POST['cnpj'];
  $data_abertura        = $_POST['data_abertura'];
  $razao_social         = $_POST['razao_social'];
  $nome_fantasia        = $_POST['nome_fantasia'];
  $cadastrour           = $_POST['cadastrour'];

  $inscricao_estadual   = $_POST['inscricao_estadual'];

  $inscEstadual_isento  = $_POST['inscEstadual_isento'];
  $inscricao_municipal  = $_POST['inscricao_municipal'];
  $porte_empresa        = $_POST['porte_empresa'];
  $data_ini_cadastrour  = $_POST['data_ini_cadastrour'];
  $data_fim_cadastrour  = $_POST['data_fim_cadastrour'];

  update_post_meta(  $post->ID, 'cnpj', sanitize_text_field( $cnpj ) );
  update_post_meta(  $post->ID, 'data_abertura', sanitize_text_field( $data_abertura ) );
  update_post_meta(  $post->ID, 'razao_social', sanitize_text_field( $razao_social ) );
  update_post_meta(  $post->ID, 'nome_fantasia', sanitize_text_field( $nome_fantasia ) );
  update_post_meta(  $post->ID, 'cadastrour', sanitize_text_field( $cadastrour ) );

  update_post_meta(  $post->ID, 'inscricao_estadual', sanitize_text_field( $inscricao_estadual ) );
  update_post_meta(  $post->ID, 'inscEstadual_isento', sanitize_text_field( $inscEstadual_isento ) );

  update_post_meta(  $post->ID, 'inscricao_municipal', sanitize_text_field( $inscricao_municipal ) );
  update_post_meta(  $post->ID, 'porte_empresa', sanitize_text_field( $porte_empresa ) );

  update_post_meta(  $post->ID, 'data_ini_cadastrour', sanitize_text_field( $data_ini_cadastrour ) );
  update_post_meta(  $post->ID, 'data_fim_cadastrour', sanitize_text_field( $data_fim_cadastrour ) );
}

add_action('save_post', 'save_carga_agencia');
// fim do bloco agencia
