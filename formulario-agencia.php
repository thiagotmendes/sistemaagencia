<table class="form-table">
  <tr>
    <td>
        <label for="cnpj"> <strong>CNPJ:</strong> </label> <br>
        <input type="text" name="cnpj" id="cnpj" value="<?php echo esc_attr( $cnpj ) ?>" class="large-text" />
    </td>
    <td>
        <label for="data_abertura"> <strong>Data abertura:</strong> </label> <br>
        <?php
        $dataCerta = explode('-', $data_abertura);
        $data = $dataCerta[2]."/".$dataCerta[1]."/".$dataCerta[0];
         ?>
        <input type="text" id="datepicker" name="data_abertura" id="data_abertura"
        value="<?php echo $data_abertura ?>"
        placeholder="<?php echo $data_abertura  ?>" class="large-text data" />
    </td>
  </tr>
</table>
<table class="form-table">
  <tr>
    <td>
      <label for="razao_social"> <strong>Razão social:</strong> </label> <br>
      <input type="text" name="razao_social" id="razao_social" value="<?php echo esc_attr( $razao_social ) ?>" class="large-text" />
    </td>
    <td>
      <label for="nome_fantasia"> <strong>Nome fantasia:</strong> </label> <br>
      <input type="text" name="nome_fantasia" id="nome_fantasia" value="<?php echo esc_attr( $nome_fantasia ) ?>" class="large-text" />
    </td>
    <td>
      <label for="cadastrour"> <strong>Cadastrour:</strong> </label> <br>
      <input type="text" name="cadastrour" id="cadastrour" value="<?php echo esc_attr( $cadastrour ) ?>" class="large-text" />
    </td>
  </tr>
</table>
<table class="form-table">
  <tr>
    <td>
      <label for="inscricao_estadual"> <strong>Inscrição estadual</strong> </label> <br>
      <input type="text" name="inscricao_estadual" id="inscricao_estadual" value="<?php echo esc_attr( $inscricao_estadual ) ?> " class="regular-text" />
    </td>
    <td>
      <label for=""> <strong> Isento </strong> </label> <br>
      <select class="" name="inscEstadual_isento">
        <option value=""></option>
        <?php
        $val_isento = array("Sim", "Não");
        foreach ($val_isento as $val_isen) {
          if($val_isen == $inscEstadual_isento){
            ?>
            <option value="<?php echo $val_isen ?>" selected><?php echo $val_isen ?></option>
            <?php
          } else {
            ?>
            <option value="<?php echo $val_isen ?>"><?php echo $val_isen ?></option>
            <?php
          }
        }
        ?>
      </select>
    </td>
    <td>
      <label for="inscricao_municipal"> <strong> Inscrição Municipal </strong> </label> <br>
      <select class="" name="inscricao_municipal">
        <option value=""></option>
        <?php
        $val_inscMunicipal = array('Isento', 'Não Isento');
        foreach ($val_inscMunicipal as $val_municipal) {
          if( $val_municipal == $inscricao_municipal ){
            ?>
            <option value="<?php echo $val_municipal ?>" selected><?php echo $val_municipal ?></option>
            <?php
          } else {
            ?>
            <option value="<?php echo $val_municipal ?>" ><?php echo $val_municipal ?></option>
            <?php
          }
        }
        ?>
      </select>
    </td>
    <td>
      <label for=""> <strong> Porte </strong> </label> <br>
      <select class="" name="porte_empresa">
        <option value=""></option>
        <?php
          $porte_cadEmpresa = array('Micro Empresa', 'Pequeno Porte', 'Medio ou grande porte');
          foreach ($porte_cadEmpresa as $porte) {
            if($porte == $porte_empresa ){
              ?>
                <option value="<?php echo $porte; ?>" selected> <?php echo $porte; ?>  </option>
              <?php
            } else{
              ?>
              <option value="<?php echo $porte; ?>"> <?php echo $porte; ?>  </option>
              <?php
            }
          }
        ?>
      </select>
    </td>
  </tr>
</table>

<table class="form-table">
  <tr>
    <td>
      <label for="data_ini_cadastrour"> <strong> Data inicio Cadastrour </strong> </label>
      <input type="text" name="data_ini_cadastrour" value="<?php echo esc_attr( $data_ini_cadastrour ) ?>" class="large-text data">
    </td>
    <td>
      <label for="data_fim_cadastrour"> <strong> Data Final Cadastrour </strong> </label>
      <input type="text" name="data_fim_cadastrour" value="<?php echo esc_attr( $data_fim_cadastrour ) ?>" class="large-text data">
    </td>
  </tr>
</table>
