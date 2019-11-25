jQuery(document).ready(function($) {
  jQuery('.data').datepicker({ dateFormat: 'dd/mm/yy' });

  $("#cnpj").mask("99.999.999/9999-99");
  $("#cpf").mask("999.999.999-99");
  $("#cep").mask("99999-999");
  $('.tel').mask("(99) 9999-9999?9").ready(function(event) {
    var target, phone, element;
    target = (event.currentTarget) ? event.currentTarget : event.srcElement;
    phone = target.value.replace(/\D/g, '');
    element = $(target);
    element.unmask();
    if(phone.length > 10) {
        element.mask("(99) 99999-999?9");
    } else {
        element.mask("(99) 9999-9999?9");
    }
  });
});
