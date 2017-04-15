<?php
// dados responsavel agencia
add_action( 'add_meta_boxes', 'add_metabox_responsavel_agencia' );
function add_metabox_responsavel_agencia() {
  add_meta_box(
    'dados_responsavel', //ID
    'Responsavel', //Título
    'mb_responsavel_cb', //callback
    'agencia', //Post Type
    'normal', //Posição
    'default' //Prioridade
  );
}

function mb_responsavel_cb() {
  global $post;
  // carrega os valores salvos
  $responsavel      = get_post_meta($post->ID, 'responsavel', true);
  $email            = get_post_meta($post->ID, 'email', true);
  $telefone         = get_post_meta($post->ID, 'telefone', true);
  $celular          = get_post_meta($post->ID, 'celular', true);
  $cpf              = get_post_meta($post->ID, 'cpf', true);
  $data_nascimento  = get_post_meta($post->ID, 'data_nascimento', true);
  $servico_telefonia  = get_post_meta($post->ID, 'servico_telefonia', true);
  $cep                = get_post_meta($post->ID, 'cep', true);
  $endereco           = get_post_meta($post->ID, 'endereco', true);
  $num                = get_post_meta($post->ID, 'num', true);
  $bairro             = get_post_meta($post->ID, 'bairro', true);
  $uf                 = get_post_meta($post->ID, 'uf', true);
  $cidade             = get_post_meta($post->ID, 'cidade', true);

  include ('formulario-responsavel.php');
}

function save_carga_responsavel(){
  global $post;

  $responsavel        = $_POST['responsavel'];
  $email              = $_POST['email'];
  $telefone           = $_POST['telefone'];
  $celular            = $_POST['celular'];
  $cpf                = $_POST['cpf'];
  $data_nascimento    = $_POST['data_nascimento'];
  $servico_telefonia  = $_POST['servico_telefonia'];
  $cep                = $_POST['cep'];
  $endereco           = $_POST['endereco'];
  $num                = $_POST['num'];
  $bairro             = $_POST['bairro'];
  $uf                 = $_POST['uf'];
  $cidade             = $_POST['cidade'];

  update_post_meta(  $post->ID, 'responsavel', sanitize_text_field( $responsavel ) );
  update_post_meta(  $post->ID, 'email', sanitize_text_field( $email ) );
  update_post_meta(  $post->ID, 'telefone', sanitize_text_field( $telefone ) );
  update_post_meta(  $post->ID, 'celular', sanitize_text_field( $celular ) );
  update_post_meta(  $post->ID, 'cpf', sanitize_text_field( $cpf ) );
  update_post_meta(  $post->ID, 'data_nascimento', sanitize_text_field( $data_nascimento ) );
  update_post_meta(  $post->ID, 'servico_telefonia', sanitize_text_field( $servico_telefonia ) );
  update_post_meta(  $post->ID, 'cep', sanitize_text_field( $cep ) );
  update_post_meta(  $post->ID, 'endereco', sanitize_text_field( $endereco ) );
  update_post_meta(  $post->ID, 'num', sanitize_text_field( $num ) );
  update_post_meta(  $post->ID, 'bairro', sanitize_text_field( $bairro ) );
  update_post_meta(  $post->ID, 'uf', sanitize_text_field( $uf ) );
  update_post_meta(  $post->ID, 'cidade', sanitize_text_field( $cidade ) );

}

add_action('save_post', 'save_carga_responsavel');
