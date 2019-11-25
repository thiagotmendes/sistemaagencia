<?php
function baixa_lista($search_query){
  /*
  * Criando e exportando planilhas do Excel
  * /
  */
  // Definimos o nome do arquivo que será exportado
  $arquivo = 'planilha.xls';
  // Criamos uma tabela HTML com o formato da planilha


  $html .= '<table border="1">';
  $html .= '<tr>';
  $html .= '<td><b>Nome</b></td>';
  $html .= '<td><b>Email</b></td>';
  $html .= '</tr>';

    $geraLista = new wp_query($search_query);

    if($geraLista->have_posts()):
      while($geraLista->have_posts()): $geraLista->the_post();
        $html .= '<tr>';
          $html .= '<td>'.utf8_decode(get_the_title()).'</td>';
          $html .= '<td>'. get_field('email_empresa') .'</td>';
        $html .= '</tr>';
      endwhile;
    endif;
  $html .= '</table>';

  $diretorio = $_SERVER['DOCUMENT_ROOT']. "/arquivos";
  $nome = rand(1,999);

  $gerArquivo = fopen($diretorio.'/lista_'.$nome.'.xls', 'w+');
  if(isset($gerArquivo)):
    fwrite($gerArquivo, $html);
    fclose($gerArquivo);
  endif;

  return $gerArquivo;
  exit;


}
