<?php
function front_form_cadagen( $atts ){
  wp_enqueue_script('jquery-ui-datepicker');
  wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
  wp_enqueue_style('jquery-ui');

  //  wp_enqueue_style('boot', WP_PLUGIN_URL .'/cad-agencia/assets/css/main.min.css', false, '1.0.0', 'all');
  wp_enqueue_script( 'correios', plugin_dir_url( __FILE__ ) .'/assets/js/consultaCorreios.js', array(),'3.3.6', 'screen' );
  wp_enqueue_script( 'mascaras', plugin_dir_url( __FILE__ ) .'/assets/js/masked.jquery.js', array(),'3.3.6', 'screen' );
  wp_enqueue_script( 'funcoes-plugin', plugin_dir_url( __FILE__ ) .'/assets/js/funcoes.js', array(),'3.3.6', 'screen' );
 ?>
  <form  method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="titulo-agencia"> Nome para cadastro da Agência </label>
          <input type="text" name="post_title" class="form-control" id="" placeholder="">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="telefone_empresa"> Telefone Comercial </label>
          <input type="text" class="form-control tel" name="telefone_empresa" id="telefone_empresa" placeholder="">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="email_empresa"> Email geral agência </label>
          <input type="text" class="form-control" name="email_empresa" id="email_empresa" placeholder="">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="form-group">
          <label for="razao_social"> Razão social </label>
          <input type="text" name="razao_social" class="form-control" id="" placeholder="">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="data-abertura"> Abertura (conforme contrato social) </label>
          <input type="text" id="datepicker" name="data_abertura" value="" placeholder=""
          class="large-text data form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="nome_fantasia"> Nome Fantasia </label>
          <input type="text" id="nome_fantasia" name="nome_fantasia" class="form-control" id="" placeholder="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="cnpj"> CNPJ </label>
          <input type="text" id="cnpj" name="cnpj" class="form-control" id="" placeholder="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="cadastrour"> Certificado CADASTUR</label>
          <input type="text" id="cadastrour" name="cadastrour" class="form-control" id="" placeholder="">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="inscricao_estadual"> Inscrição Estadual </label>
          <input type="text" name="inscricao_estadual" class="form-control" id="" placeholder="">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="isento"> Isento </label>
          <select id="isento" class="form-control" name="inscEstadual_isento">
            <option></option>
            <option>Sim</option>
            <option>Não</option>
          </select>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="inscricao_municipal"> Inscrição Municipal </label>
          <select class="form-control" name="inscricao_municipal" id="inscricao_municipal">
            <option></option>
            <option>Isento</option>
            <option>Não Isento</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="porte"> Porte </label>
          <select class="form-control" name="porte_empresa">
            <option></option>
            <option> Micro Empresa </option>
            <option> Pequeno Porte </option>
            <option> Medio ou grande porte </option>
          </select>
        </div>
      </div>
    </div>
    <hr>
    <h3> ENDEREÇO COMERCIAL (endereço da agência) </h3>
    <div class="row">
      <div class="col-md-2">
        <div class="form-group">
          <label for="cep"> CEP </label>
          <input type="text" name="cep" class="form-control" id="cep" placeholder="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="endereco"> Endereço </label>
          <input type="text" name="endereco" class="form-control" id="endereco" placeholder="">
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <label for="num"> N° </label>
          <input type="text" name="num" class="form-control" id="num" placeholder="">
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="Complemento"> Complemento </label>
          <input type="text" class="form-control" name="complemento" id="Complemento" placeholder="">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="bairro"> Bairro </label>
          <input type="text" name="bairro" class="form-control" id="bairro" placeholder="">
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <label for="uf"> UF </label>
          <input type="text" name="uf" class="form-control" id="uf" placeholder="">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="cidade"> Cidade </label>
          <input type="text" name="cidade" class="form-control" id="cidade" placeholder="">
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="website"> Website </label>
          <input type="text" class="form-control" name="website" id="" placeholder="">
        </div>
      </div>
    </div>
    <hr>
    <h3> DADOS DO RESPONSÁVEL </h3>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label for="responsavel"> Nome do representante legal </label>
          <input type="text" name="responsavel" class="form-control" id="responsavel" placeholder="">
        </div>
      </div>
      <div class="col-md-7">
        <div class="form-group">
          <label for="email"> Email do representante legal (não será divulgado) </label>
          <input type="text" name="email" class="form-control" id="email" placeholder="">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="telefone"> Telefone </label>
          <input type="text" name="telefone" class="form-control tel" id="telefone" placeholder="">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="celular"> Celular ou Whatsapp </label>
          <input type="text" name="celular" class="form-control tel" id="celular" placeholder="">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="cpf"> CPF (não será divulgado) </label>
          <input type="text" name="cpf" class="form-control" id="cpf" placeholder="">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="data_nascimento"> Data Nascimento (não será divulgado) </label>
          <input type="text" name="data_nascimento" class="form-control data" id="data_nascimento" placeholder="">
        </div>
      </div>
    </div>
    <hr>
    <!--  itens do tipo categoria -->
    <div class="row">
      <div class="col-md-12">
        <h3> SERVIÇOS PRESTADOS </h3>
        <ul class="cat-formfront">
          <?php
          $term_servico = get_terms('servicos-agencia',array(
                                        'hide_empty' => false,
                                    ));
          foreach ($term_servico as $servico) {
            ?>
            <li>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="servicos[]" value="<?php echo $servico->name ?>"> <?php echo $servico->name ?>
                </label>
              </div>
            </li>
            <?php
          }
          ?>
        </ul>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <h3> ATENDIMENTO EM LÍNGUA ESTRANGEIRA <small>(Selecionar todas as línguas estrangeiras nas quais a agência de turismo presta atendimento.)</small> </h3>
        <div class="row">
          <?php
          $term_servico = get_terms('lingua-agencia', array(
                                        'hide_empty' => false,
                                    ));
          foreach ($term_servico as $servico) {
            ?>
            <div class="col-md-2">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="linguas[]" value="<?php echo $servico->name ?>"> <?php echo $servico->name ?>
                </label>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <h3> SEGMENTOS TURÍSTICOS <small>(Selecionar os 3 principais segmentos turísticos em que a agência de turismo atua.)</small> </h3>
        <div class="row">
          <?php
          $term_servico = get_terms('categoria-agencia', array(
                                        'hide_empty' => false,
                                    ) );
          foreach ($term_servico as $servico) {
            ?>
            <div class="col-md-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="categoria[]" value="<?php echo $servico->name ?>"> <?php echo $servico->name ?>
                </label>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
    <button type="submit" name="button" class="btn btn-success"> Salvar </button>
  </form>
<?php

  if (isset($_POST) && !empty($_POST) && $_POST != "") {
    $serv = $_POST['servicos'];
    $linguas = $_POST['linguas'];
    $categoria = $_POST['categoria'];

    $my_post = array(
       'post_title' => $_POST['post_title'],
       'post_date' => $_SESSION['cal_startdate'],
       'post_status' => 'pending',
       'post_type' => 'agencia',
    );

    $post_id = wp_insert_post($my_post);
    wp_set_object_terms($post_id,$serv,'servicos-agencia');
    wp_set_object_terms($post_id,$linguas,'lingua-agencia');
    wp_set_object_terms($post_id,$categoria,'categoria-agencia');

    foreach($_POST as $campo => $valor){
      add_post_meta($post_id, $campo, $valor, true);
    }

  }
}
add_shortcode( 'front_form', 'front_form_cadagen' );
