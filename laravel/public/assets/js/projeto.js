//MÁSCARAS
$(document).ready(function(){
  $('#dtNasc').mask('00/00/0000');
  $('#cep').mask('00000-000', {reverse: true});
  $('#telefone').mask('(00) 00000-0000');
  $('#cpf').mask('000.000.000-00', {reverse: true});
  $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('#salarioBase').mask('00 000,00', {reverse: true});
  $('#precoProduto').mask('0 000.00', {reverse: true});
  $('#valorServico').mask('000.00', {reverse: true});
  $('#comissao').mask('00.00', {reverse: true});
  $('#rg').mask('MG-00.000.000');
  
});

// VALIDAÇÃO
$('#cadastro').validate({
  rules: {
    name: 'required',
    email: {
      required: true,
      email: true
    }
  },
  messages: {
    name: 'O nome é obrigatório.',
    email: {
      required: 'O e-email é obrigatório.',
      email: 'O e-mail que você inseriu não é valido.'
    }
  }
});

// $('#cadastro').validator();

//CONFERIR SENHAS IGUAIS
$(document).ready(function(){
  $('#verificar').hide();
});

function verificarSenha(){
  if ($('#senha').val() != $('#senha2').val()){
    $('#verificar').show();
  } else{
    $('#verificar').hide();
  }
}

// CEP E ENDEREÇO
$(document).ready(function() {
  $('#cidade').blur(function(){
    $('#cep').val('Carregando...');
    var r = $('#rua').val();
    var c = $('#cidade').val();

    $.getJSON('https://viacep.com.br/ws/MG/' + c + '/' + r + '/json/', function(dados) {

    console.log(dados);
      if (!('erro' in dados)) {
          //Atualiza os campos com os valores da consulta.
          $('#cep').val(dados[0].cep);
          if ($('#bairro').value() == ''){
            $('#cep').val(dados[0].bairro)
          }
      } //end if.
      else {
        $('#cep').val('');
      }
    
    });
  });

  //Quando o campo cep perde o foco.
  $('#cep').blur(function() {

      //Nova variável 'cep' somente com dígitos.
      var cep = $(this).val().replace(/\D/g, '');

      //Verifica se campo cep possui valor informado.
      if (cep != '') {

          //Expressão regular para validar o CEP.
          var validacep = /^[0-9]{8}$/;

          //Valida o formato do CEP.
          if(validacep.test(cep)) {

              //Preenche os campos com '...' enquanto consulta webservice.
              $('#rua').val('Carregando...');
              $('#bairro').val('Carregando...');
              $('#cidade').val('Carregando...');

              //Consulta o webservice viacep.com.br/
              $.getJSON('https://viacep.com.br/ws/'+ cep +'/json/?callback=?', function(dados) {

                  if (!('erro' in dados)) {
                      //Atualiza os campos com os valores da consulta.
                      $('#rua').val(dados.logradouro);
                      $('#bairro').val(dados.bairro);
                      $('#cidade').val(dados.localidade);
                  } //end if.
                  else {
                      //CEP pesquisado não foi encontrado.
                      $('#rua').val('');
                      $('#bairro').val('');
                      $('#cidade').val('');
                  }
              });
          } //end if.
      } //end if.
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