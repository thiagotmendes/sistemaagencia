jQuery(document).ready(function($) {
  jQuery('.data').datepicker({ dateFormat: 'dd/mm/yy' });

  $("#cnpj").mask("99.999.999/9999-99");
  $("#cpf").mask("999.999.999-99");
  $("#cep").mask("99999-999");
});
