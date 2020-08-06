// MÁSCARAS
$(document).ready(function(){
  $('#dtNasc').mask('00/00/0000');
  $('#data').mask('00/00/0000');
  $('#cep').mask('00000-000', {reverse: true});
  $('#telefone').mask('(00) 00000-0000');
  $('#cpf').mask('000.000.000-00', {reverse: true});
  $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('#salarioBase').mask('00 000,00', {reverse: true});
  $('#precoProduto').mask('0 000.00', {reverse: true});
  $('#valorServico').mask('0 000.00', {reverse: true});
  $('#comissao').mask('000');
  $('#rg').mask('MG-00.000.000');
  
});

//CALENDÁRIO
$(function() {
  $('.calendar').datepicker({
      showOn: 'button',
      showOtherMonths: true,
      selectOtherMonths: true,
      numberOfMonths: 2,
      dateFormat: 'dd/mm/yy',
      dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
      dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
      dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
      monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
      monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
  });
});

// FILTRO NA TABELA 
$(document).ready(function(){
  $('input#search').quicksearch('table#table tbody tr');
});

//TABLE SORTER
$(function() {
  $('#table').tablesorter();
});

$(document).ready(function () {
  $('#addOnTable').on('click', function (event) {
    event.preventDefault();

    //armazena os dados dos selects preenchidos
    const employee_id = $('#select_employee').val();
    const employee_name = $('#select_employee option:selected').html();
    
    const service_id = $('#select_service').val();
    const service_name = $('#select_service option:selected').html();
    
    if (verifyData(service_id, employee_id) == null){
      return;
    }

    //cria os inputs com estes valores
    createFields({id: employee_id, name: employee_name}, {id: service_id, name: service_name});
    removeOptionsSelected(employee_id, service_id);

    //coloca o primeiro select em sua posição original
    $('#select_employee').val(0);
    $('#select_service').val(0);
  });
});

//verifica se os dois selects estão preenchidos
function verifyData(service_id, employee_id){
  document.getElementById('service_error').innerHTML="";
  
  if(service_id == null || employee_id == null){
    var alrt = 'Você precisa selecionar um serviço e um funcionário por vez.';
    $('#service_error').append(alrt);
    return null;
  }
  return 1;
}

//cria os inputs com os valores selecionados numa nova div
function createFields(employee, service) {
  
  //pega o valor do serviço
  var option = document.querySelectorAll('option[label="' + service.id + '"]');
  for (var item of option) {
    var valor = item.value;
  }
  console.clear();
  //atualiza o campo referente ao valor final
  addToTotal(valor);

  var row = $('<div>').addClass('row selected');
  var div = $('<div>').addClass('col-md-4 col-xs-12');

  $('<input>').attr({ name: 'service_id[]', value: service.id, type: 'hidden' }).appendTo(div);
  $('<input>').attr({ name: 'service_name[]', value: service.name, type: 'text', readonly: true }).appendTo(div);
  div.appendTo(row);
  
  div = $('<div>').addClass('col-md-4 col-xs-12');

  $('<input>').attr({ name: 'employee_id[]', value: employee.id, type: 'hidden' }).appendTo(div);
  $('<input>').attr({ name: 'employee_name[]', value: employee.name, type: 'text', readonly: true }).appendTo(div);
  div.appendTo(row);

  div = $('<div>').addClass('col-md-3 col-xs-12');

  $('<input>').attr({id:'valor', name: 'valor[]', value: valor, type: 'number' }).appendTo(div);
  div.appendTo(row);

  div = $('<div>').addClass('col-md-1 col-xs-12');
  $('<img>').attr({class: 'removeFromTable', src: 'http://localhost/BicJr/recantodabeleza/laravel/public/img/icons/removeFromTable.png'}).click(removeItem).appendTo(div);
  div.appendTo(row);

  row.prependTo('.services');
}

//remove do primeiro select as options que já foram selecionadas anteriormente
function removeOptionsSelected(employee_id, service_id) {
  $('#select_employee option[value="' + employee_id + '"]').each(function () {
    $(this).remove();
  });

  $('#select_service option[value="' + service_id + '"]').each(function () {
    $(this).remove();
  });
}

//atualiza o campo referente ao valor final
function addToTotal(valor){
  if (valor != null){
    valor = parseFloat(valor);
    var total = document.getElementById('total').value;
    console.log(total + ", " + valor);
    total = parseFloat(total) + valor;
    total = total.toString();
    total = total.substring(0, total.indexOf(".") + 3);
    document.getElementById('total').value = total;
  }
}

function removeItem(event) {
  event.preventDefault();
  document.getElementById('service_error').innerHTML="";
  
  //armazena o botão que foi acionado
  const button = $(event.currentTarget);

  //pega a div mais perto do botão que foi acionado
  const service_div = button.closest('.selected');

  //pega os valores do funcionário e serviço
  const employee_id = service_div.find("[name='employee_id[]']").val();
  const employee_name = service_div.find("[name='employee_name[]']").val();

  const service_id = service_div.find("[name='service_id[]']").val();
  const service_name = service_div.find("[name='service_name[]']").val();

  var option = document.querySelectorAll('option[label="' + service_id + '"]');

  for (var item of option) {
    var valor = item.value;
  }
  
  //atualiza o campo referente ao valor final
  removeFromTotal(valor);

  //volta com eles pros primeiros selects
  $('#select_employee').append(`<option value="${employee_id}">${employee_name}</option>`);
  $('#select_service').append(`<option value="${service_id}">${service_name}</option>`);

  //remove a div 
  service_div.remove();
}

//atualiza o campo referente ao valor final
function removeFromTotal(valor){
  if (valor != null){
    valor = parseFloat(valor);
    var total = document.getElementById('total').value;
    total = parseFloat(total) - valor;
    if(total < 0){ total = 0 }
    total = total.toString();
    total = total.substring(0, total.indexOf(".") + 3);
    document.getElementById('total').value = total;
  }
}

/*
//AUTOCOMPLETE
$(jfunction (){
  $('#funcionario').autocomplete({
    source: "{{url('/employee/search')}}",
  });
});
*/

/*
//ADICIONAR NA TABELA
function adicionarNaTabela(){
  var func = $('#funcionario:selected').text();
  var serv = $('#servico:selected').text();
}
*/

