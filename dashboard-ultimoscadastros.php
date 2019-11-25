<?php

add_action( 'wp_dashboard_setup', 'ultimoscad_dashboard_widget' );

function ultimoscad_dashboard_widget() {

  wp_add_dashboard_widget(
    'pt_ultimoscad_dashboard_widget',
    'Ultimas agências cadastradas',
    'pt_ultimoscad_dashboard_widget_cb'
  );

}

function pt_ultimoscad_dashboard_widget_cb() {
  $args = array(
    'post_type' => 'agencia',
    'posts_per_page' => 5
  );

  $dashCadastros = new wp_query($args);

  if ($dashCadastros->have_posts()) {
    ?>
   <table class="widefat" >
     <thead>
      <tr>
    		<th class="row-title"><?php esc_attr_e( 'Nome', 'wp_admin_style' ); ?></th>
    		<th><?php esc_attr_e( 'Responsavel', 'wp_admin_style' ); ?></th>
        <th> <?php esc_attr_e( 'Contato', 'wp_admin_style' ); ?> </th>
        <th> <?php esc_attr_e( 'Telefone', 'wp_admin_style' ); ?> </th>
    	</tr>
    </thead>
    <?php
    $count = 0;
    while($dashCadastros->have_posts()){ $dashCadastros->the_post();
      if($count % 2 == 0){
        $alternativo = 'alternate';
      } else {
        $alternativo = '';
      }
      ?>
        <tr class="<?php echo $alternativo ?>">
          <td> <?php the_title() ?> </td>
          <td> <?php echo get_field('responsavel') ?> </td>
          <td> <?php echo get_field('email') ?> </td>
          <td> <?php echo get_field('telefone') ?> </td>
        </tr>
      <?php
      $count++;
    }
    echo "</table>";
  }
}
