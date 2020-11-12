// MÁSCARAS
$(document).ready(function(){
  $('#comissao').mask('000');
  $('#data').mask('00/00/0000');
  $('#rg').mask('00.000.000-0');
  $('#dtNasc').mask('00/00/0000');
  $('#telefone').mask('(00) 00000-0000');
  $('#cep').mask('00000-000', {reverse: true});
  $('#valor').mask('0 000,00', {reverse: true});
  $('#total').mask('00 000,00', {reverse: true});
  $('#cpf').mask('000.000.000-00', {reverse: true});
  $('#precoProduto').mask('AA 0 000,00', {reverse: true});
  $('#valorServico').mask('AA 0 000,00', {reverse: true});
  $('#salarioBase').mask('00 000,00', {reverse: true});
  $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('input[name="valor[]"]').mask('AA 0 000,00', {reverse: true});
});

//CALENDÁRIO
$(function() {
  $('.calendar').datepicker({
      //showOn: 'button',
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

