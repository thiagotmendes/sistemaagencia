<?php
add_action('init', 'modelo_register');
function modelo_register() {
   $labels = array(
      'name' => 'Agência',
      'singular_name' => 'Post',
      'all_items' => 'Todas agências',
      'add_new' => 'Adicionar Agência',
      'add_new_item' => 'Adicionar nova Agência',
      'edit_item' => 'Editar agência',
      'new_item' => 'Novo post',
      'view_item' => 'Ver post',
      'search_items' => 'Procurar Agência',
      'not_found' =>  'Nada encontrado',
      'not_found_in_trash' => 'Nada encontrado no lixo',
      'parent_item_colon' => ''
  );
  $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'has_archive' => true,
      'taxonomy' => array('agencia'),
      'menu_position' => 6,
      'supports' => array('title','thumbnail','category','tag','page-attributes'),
      'rewrite' => array('slug' => 'agencia')
    );
  register_post_type('agencia',$args);

  /* ----------------------------------------------------- */
  /* Taxonomias */
  /* ----------------------------------------------------- */
  /* Criando uma Taxonomia Personalizada */
  register_taxonomy(
    "categoria-agencia",
    array("agencia"),
    array(
      "hierarchical" => true,
      "label" => "Categorias",
      "singular_label" => "Categoria",
      'rewrite' => array( 'slug' => 'categoria-agencia' )
    )
  );

  register_taxonomy(
    "servicos-agencia",
    array("agencia"),
    array(
      "hierarchical" => true,
      "label" => "Servicos",
      "singular_label" => "servico",
      'rewrite' => array( 'slug' => 'servico-agencia' )
    )
  );

  register_taxonomy(
    "lingua-agencia",
    array("agencia"),
    array(
      "hierarchical" => true,
      "label" => "linguas",
      "singular_label" => "lingua",
      'rewrite' => array( 'slug' => 'lingua-agencia' )
    )
  );
}
