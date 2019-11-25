<?php

add_action('admin_menu', 'registrar_submenu');

function registrar_submenu() {
  add_submenu_page(
    'edit.php?post_type=agencia',
    'Exportar email de agências',
    'Expotar lista email',
    'manage_options',
    'smenu_plug_config',
    'smenu_plug_config_cb'
  );

}


function smenu_plug_config_cb(){
  require_once('geraArquivo.php');
  echo "<h1> Exportar email de agências cadastradas </h1>";
  echo "<div style='margin-right:25px; width:50%; float:left; min-height: 500px'>";

  if(isset($_GET['cidade']) && isset($_GET['estado']) && empty($_GET['cidade']) && !empty($_GET['estado'])){
    $search_query = array(
      'post_type' => 'agencia',
      'posts_per_page' => -1,
      'meta_key' => 'uf',
      'meta_value' => $_GET['estado'],
      'compare' => '='
    );
  } elseif(isset($_GET['cidade']) && isset($_GET['estado']) && !empty($_GET['cidade']) && empty($_GET['estado'])){
    $search_query = array(
      'post_type' => 'agencia',
      'posts_per_page' => -1,
      'meta_key' => 'cidade',
      'meta_value' => $_GET['cidade'],
      'compare' => 'LIKE'
    );
  }elseif(isset($_GET['cidade']) && isset($_GET['estado']) && !empty($_GET['cidade']) && !empty($_GET['estado'])){
    $search_query = array(
      'post_type' => 'agencia',
      'posts_per_page' => -1,
      'meta_query' => array(
        'relation'		=> 'and',
        array(
          'key' => 'cidade',
          'value' => $_GET['cidade'],
          'compare' => '='
        ),
        array(
          'key' => 'uf',
          'value' => $_GET['estado'],
          'compare' => '='
        )
      )

    );
  } else {
    $search_query = array(
      'post_type' => 'agencia',
      'posts_per_page' => -1
    );
  }

  $listaEmail = new wp_query($search_query);
  if($listaEmail->have_posts()):
      echo "<table class='widefat' >";
      ?>
      <thead>
      	<tr>
      		<th class="row-title"><?php esc_attr_e( 'Agência', 'wp_admin_style' ); echo $_GET['estado'] ?></th>
      		<th><?php esc_attr_e( 'Email', 'wp_admin_style' ); ?></th>
          <th> Estado </th>
      	</tr>
      </thead>
      <tbody>
      <?php
      while($listaEmail->have_posts()): $listaEmail->the_post();
        echo "<tr>";
          echo '<td class="row-title">';
            the_title();
          echo "</td>";
          echo "<td>";
            echo get_field('email_empresa');
          echo "</td>";
          echo "<td>";
            echo get_field('uf');
          echo "</td>";
        echo "</tr>";
      endwhile;
      ?>
      </tbody>
      <?php
      echo "</table>";
  else:
    echo "Nenhuma agência encontrada";
  endif;
  echo "</div>";
  echo "<div style='padding-right:25px;'>";
  ?>
    <form class="" action="" method="get">
      <input type="hidden" name="post_type" value="agencia">
      <input type="hidden" name="page" value="smenu_plug_config">
      <div class="form-group">
        <label for="cidade">Cidade</label>
        <input type="text" name="cidade" class="form-control" id="" placeholder="" value="<?php if(!empty($_GET['cidade']) && isset($_GET['cidade'])): echo $_GET['cidade']; endif ?>">
      </div>
      <div class="form-group">
        <label for="">Estado</label>
        <select name="estado" class="form-control">
          <option></option>
          <?php
          $estados = array(
            'Acre' => 'AC',
            'Alagoas' =>	'AL',
            'Amapá' =>	'AP',
            'Amazonas' =>	'AM',
            'Bahia' =>	'BA',
            'Ceará' =>	'CE',
            'Distrito Federal' =>	'DF',
            'Espírito Santo' =>	'ES',
            'Goiás' =>	'GO',
            'Maranhão' =>	'MA',
            'Mato Grosso' =>	'MT',
            'Mato Grosso do Sul' =>	'MS',
            'Minas Gerais' =>	'MG',
            'Pará' =>	'PA',
            'Paraíba' =>	'PB',
            'Paraná' =>	'PR',
            'Pernambuco' =>	'PE',
            'Piauí' =>	'PI',
            'Rio de Janeiro' =>	'RJ',
            'Rio Grande do Norte' =>	'RN',
            'Rio Grande do Sul' =>	'RS',
            'Rondônia' =>	'RO',
            'Roraima' =>	'RR',
            'Santa Catarina' =>	'SC',
            'São Paulo' =>	'SP',
            'Sergipe' =>	'SE',
            'Tocantins' =>	'TO'
          );
          foreach ($estados as $esta => $sigla) {
            if ($sigla == $_GET['estado']) {
              ?>
              <option value="<?php echo $sigla ?>" selected> <?php echo $esta ?> </option>
              <?php
            } else {
              ?>
              <option value="<?php echo $sigla ?>"> <?php echo $esta ?> </option>
              <?php
            }
          }
          ?>
        </select>
      </div>
      <button type="submit"> Filtrar </button>
      <hr>
      <?php
      if(isset($_GET['cidade']) and isset($_GET['estado'])):
        if($listaEmail->post_count != 0):
          baixa_lista($search_query);
        endif;
      endif;
       ?>
    <?php
    $path = $_SERVER['DOCUMENT_ROOT']. "/arquivos";
    $diretorio = dir($path);

    if(isset($_GET['arquivo'])):
      $arquivosExcluir = $path."/". $_GET['arquivo'];
      unlink($arquivosExcluir);
    endif;

    $diretorioDownload = $_SERVER['SERVER_NAME']."/arquivos";

    echo "Lista de email (lembre-se toda vez que efetuar um filtro ele gera um novo arquivo) <br>";
    ?>
    <hr>
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <td>Lista de emails</td>
        <td>  </td>
      </tr>
      <?php
      while($arquivo = $diretorio -> read()){
        if($arquivo != "." and $arquivo != ".."){
          echo "<tr>";
            echo "<td>";
              echo "<a href='http://".$diretorioDownload."/".$arquivo."' target='_blank'>".$arquivo."</a>";
            echo "</td>";
            echo "<td>";
              ?>
              <a href="?post_type=agencia&page=smenu_plug_config&arquivo=<?php echo $arquivo ?>"> Excluir lista</a>
              <?php
            echo "</td>";
          echo "</tr>";
        }
      }

       ?>
    </table>
     <?php
     $diretorio -> close();
     ?>
    </form>
  <?php
  echo "</div>";


}
