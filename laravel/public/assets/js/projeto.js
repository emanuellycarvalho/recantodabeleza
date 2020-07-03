// MÁSCARAS
$(document).ready(function(){
  $('#dtNasc').mask('00/00/0000');
  $('#data').mask('00/00/0000');
  $('#cep').mask('00000-000', {reverse: true});
  $('#telefone').mask('(00) 00000-0000');
  $('#cpf').mask('000.000.000-00', {reverse: true});
  $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('#salarioBase').mask('00 000,00', {reverse: true});
  $('#preco').mask('00 000,00', {reverse: true});
});

// CRIAR OPTIONS
function options(session){
  if (session != null){
    var array = sessionStorage.getItem(session);
    //string.split(separator, limit)
    array = array.split(';');
    if (array != null){
      var result = '';
      for(var i = 0; i < array.length-1; i++){
        var a = array[i].split('-');
        if (i == 0){
          result += "<option value='" + a[0] + "' disabled selected> " + a[1] + "</option>";
        } else {
          result += "<option value='" + a[0] + "'> " + a[1] + "</option>";
        }
      }
      return result;
    }
  }
  return null;
}

// ADICIONAR SERVIÇO 2.0
var c = 2;
$('#addOnTable').click(function() {
  result = options('emps');

  var novo = "<div class='row' id='campo" + c + "'>"+ 

  "<div class='col-md-5 col-xs-12'>"+
      "<div class='form-group'>"+
          "<label for='servico'>Servico*</label>"+
          "<select name='funcionario' id='funcionario'>"+
              "<option value='0' disabled selected> Selecione um serviço por vez </option>"+
              "<option value='2'> Massagem capilar </option>"+
              "<option value='1'> Massagem corporal </option>"+
              "<option value='3'> Desing de sobrancelhas </option>"+
              "<option value='4'> Manicure </option>"+
              "<option value='5'> Pedicure </option>"+
          "</select>"+
      "</div>"+
  "</div>"+

  "<div class='col-md-5 col-xs-12'>"+
      "<div class='form-group'>"+
          "<label for='funcionario'>Funcionário*</label>"+
          "<select name='funcionario' id='funcionario'>"+
              result +
          "</select>"+
      "</div>"+
  "</div>"+

  "<div class='col-md-2 col-xs-12'>"+    
      "<img class='removeFromTable' src='http://localhost/BicJr/recantodabeleza/laravel/public/img/icons/removeFromTable.png' title='Adicionar' id='" + c + "'>"+
  "</div>"+

"</div>";

  $('#services').append(novo);
  c++;
});

// REMOVER SERVIÇO
$('form').on('click', '.removeFromTable', function (){
  var id = $(this).attr('id');
  $('#campo' + id + '').remove();
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

