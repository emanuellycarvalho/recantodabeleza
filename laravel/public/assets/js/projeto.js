

$(document).ready(

  //MÁSCARAS
  function(){
    $('#dtNasc').mask('00/00/0000');
    $('#cep').mask('00000-000', {reverse: true});
    $('#telefone').mask('(00) 00000-0000');
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('#salarioBase').mask('0 000,00', {reverse: true});
  },

  // CEP E ENDEREÇO
  function() {
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
  },

  //FILTRO NA TABELA
  function(){
    $('input#search').quicksearch('table#table tbody tr');
  },

  //TABLE SORTER
  function() {
    $('#table').tablesorter();
  }
);