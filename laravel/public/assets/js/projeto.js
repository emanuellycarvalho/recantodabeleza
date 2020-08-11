// MÁSCARAS
$(document).ready(function(){
  $('#comissao').mask('000');
  $('#data').mask('00/00/0000');
  $('#rg').mask('MG-00.000.000');
  $('#dtNasc').mask('00/00/0000');
  $('#telefone').mask('(00) 00000-0000');
  $('#cep').mask('00000-000', {reverse: true});
  $('#valor').mask('0 000,00', {reverse: true});
  $('#cpf').mask('000.000.000-00', {reverse: true});
  $('#precoProduto').mask('0 000,00', {reverse: true});
  $('#valorServico').mask('0 000,00', {reverse: true});
  $('#salarioBase').mask('00 000,00', {reverse: true});
  $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
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

//verifica se os dois selects estão preenchidos
function verifyServiceData(service_id, employee_id){
  document.getElementById('service_error').innerHTML="";
  
  if(service_id == null || employee_id == null){
    var alrt = 'Você precisa selecionar um serviço e um funcionário por vez.';
    $('#service_error').append(alrt);
    return null;
  }
  return 1;
}

function verifyServiceData(service_id, employee_id, value){
  document.getElementById('service_error').innerHTML="";
  
  if(service_id == null || employee_id == null){
    var alrt = 'Você precisa selecionar um serviço e um funcionário por vez.';
    $('#service_error').append(alrt);
    return null;
  }

  if(qtd <= 0 || qtd == null){
    var alrt = 'A quantidade precisa ser maior que zero.';
    $('#service_error').append(alrt);
    return null;
  }

  if(value <= 0 || value == null){
    var alrt = 'O valor do serviço precisa ser maior que zero.';
    $('#service_error').append(alrt);
    return null;
  }

  return 1;
}

function verifyProductData(product_id, value){
  document.getElementById('product_error').innerHTML="";
  
  if(product_id == null){
    var alrt = 'Você precisa selecionar um produto por vez.';
    $('#product_error').append(alrt);
    return null;
  }

  if(value <= 0 || value == null){
    var alrt = 'O valor do serviço precisa ser maior que zero.';
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
  //console.clear();
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

function createServiceRow(employee, service, value) {
  
  // pega a primeira tabela
  var table = document.getElementsByTagName('table')[0];

  // adiciona uma linha vazia à tabela
  // table.rows.length = final
  var newRow = table.insertRow(table.rows.length);

  // adiciona células à nova linha
  var cel1 = newRow.insertCell(0);
  var cel2 = newRow.insertCell(1);
  var cel3 = newRow.insertCell(2);
  var cel4 = newRow.insertCell(3);
  var cel5 = newRow.insertCell(4);
  var cel6 = newRow.insertCell(5);
  var cel7 = newRow.insertCell(6);
  // esconde as célular de id
  cel2.style.visibility = 'hidden';
  cel4.style.visibility = 'hidden';
  cel6.style.visibility = 'hidden';

  // preenche as células
  cel1.innerHTML = `${service.name}`;
  cel2.innerHTML = service.id;
  cel3.innerHTML = `<center> ${employee.name} </center>`;
  cel4.innerHTML = employee.id;
  cel5.innerHTML = `<center> R$ ${value} </center>`;
  cel7.innerHTML = `<center> <img class='addOnTable margin-off' src='http://localhost/BicJr/recantodabeleza/laravel/public/img/icons/removeFromTable.png' title='Remover'> </center>`
  
  $(cel7).on('click', function (event){
    document.getElementById('service_error').innerHTML="";

    //pega a linha do botão que foi acionado
    const row = this.parentNode;

    //pega a tabela
    const table = document.getElementById('serviceTable');

    //pega os valores do funcionário e serviço    
    const service_name = row.childNodes[0];
    const service_id = row.childNodes[1];

    const employee_name = row.childNodes[2];
    const employee_id = row.childNodes[3];

    const value = row.childNodes[4];

    //atualiza o campo referente ao valor final
    //removeFromTotal(value);

    //volta com eles pros primeiros selects
    $('#select_employee').append(`<option value="${employee_id}">${employee_name}</option>`);
    $('#select_service').append(`<option value="${service_id}">${service_name}</option>`);

    table.deleteRow(row.rowIndex);
  });

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
    //console.log(total + ", " + valor);
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

