
$(document).ready(function(){
  //ESCONDER SMALLS
  $('.verificar').hide();

  //VALIDATE
  $('#cadastro').validate({
    rules: {
      nome: 'required',
      tipo: {
        min: 1
      },
      telefone: 'required',
      cep: 'required',
      cpf: 'required',
      cnpj: 'required',
      senha: 'required',
      senha2: 'required',
      rua: 'required',
      cidade: 'required',
      bairro: 'required',
      numero: 'required',
      marca: 'required',
      cliente: 'required',
      inicio: 'required',
      fim: 'required',
      comissao:{
        required: true,
        min: 0,
        max: 100
      },
      total:{
        required: true,
        min: 1
      },
      qtd:{
        required: true,
        min: 1
      },
      preco: 'required',
      email: {
        required: true,
        email: true
      },
    },
    messages: {
      tipo: {
        min: 'Por favor, selecione uma opção.'
      }, 
      total: {
        min: 'Valor inválido'
      }
    },
    errorElement: 'em',
    errorPlacement: function (error, element) {
        // Add the `invalid-feedback` class to the error element
        error.addClass('error-msg');

        if (element.prop('type') === 'checkbox') {
            error.insertAfter(element.next('label'));
        } else {
            error.insertAfter(element);
        }
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).addClass('is-valid').removeClass('is-invalid');
    }
  });

  $('#cadastroClienteSimples').validate({
    rules:{
      nome: 'required',
      telefone: 'required'
    }
  });
});

  //VERIFICAR SENHAS ONINPUT
  function verificarSenha(){
    if ($('#senha').val() != $('#senha2').val()){
      $('#verificarSenha').show();
      document.getElementById('senha2').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
    } else{
      $('#verificarSenha').hide();
      document.getElementById('senha2').style.boxShadow = 'none';
    }
  }

  //VERIFICAR PRECO ONINPUT
  function verificarPreco(){
    var a = parseFloat($('#preco').val());
    if (a < 1){
      $('#verificarPreco').show();
      document.getElementById('preco').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
    } else{
      $('#verificarPreco').hide();
      document.getElementById('senha2').style.boxShadow = 'none';
    }
  }
  
  //VERIFICAR O HORARIO CHANGE
  $(document).ready(function(){
    const inputInicio = document.getElementById('inicio');
    inputInicio.addEventListener('change', (event) => {
      validarHora();
    });
  
    const inputFim = document.getElementById('fim');
    inputFim.addEventListener('change', (event) => {
      validarHora();      
    });

  });

  function validarHora(){
    $('.verificar').hide();

    document.getElementById('validarHora').innerHTML = '';
    document.getElementById('fim').style.boxShadow = 'none';
    document.getElementById('inicio').style.boxShadow = 'none';

    const horaInicio = document.getElementById('inicio').value;
    const horaFim = document.getElementById('fim').value;
    const inicio = '07:00';
    const fim = '17:00';

    var algoErrado = false;
    
    if(horaInicio > horaFim){
      document.getElementById('validarHora').innerHTML = 'O horário de término é menor que o de início.';
      algoErrado = true;
    }
    
    if(horaInicio == horaFim){
      document.getElementById('validarHora').innerHTML = 'O horário de término é igual ao de início.';
      algoErrado = true;
    }
    
    if(horaInicio < inicio || horaFim < inicio || horaInicio > fim || horaFim > fim){
      document.getElementById('validarHora').innerHTML = 'O estabelecimento funciona de 7:00 à 17:00';
      algoErrado = true;
    }
    
    if(algoErrado){
      $('.verificar').show();
      document.getElementById('fim').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
      document.getElementById('inicio').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
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
            document.getElementById('cep').style.boxShadow = 'none';
            $('#verificarCEP').hide();
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
                        document.getElementById('cep').style.boxShadow = 'none';
                        $('#verificarCEP').hide();
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        $('#rua').val('');
                        $('#bairro').val('');
                        $('#cidade').val('');
                        document.getElementById('cep').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
                        $('#verificarCEP').show();
                    }
                });
            } //end if.
        } //end if.
    });
  });


// MENSAGENS PERSONALIZADAS
jQuery.extend(jQuery.validator.messages, {
    required: 'Por favor, preencha este campo.',
    remote: 'Por favor, corrija este campo.',
    email: 'O e-mail que você inseriu não é valido.',
    url: 'Por favor, insira uma URL válida.',
    date: 'A data que você inseriu não é valida.',
    dateISO: 'Por favor, insira uma data válida (ISO).',
    number: 'Por favor, insira um número válido.',
    digits: 'Por favor, insira somente d&iacute;gitos.',
    creditcard: 'Por favor, insira um cartão de crédito válido.',
    equalTo: 'Por favor, insira o mesmo valor novamente.',
    accept: 'Por favor, insira um valor com uma extens&atilde;o válida.',
    maxlength: jQuery.validator.format('Por favor, respeito o liminte de {0} caracteres.'),
    minlength: jQuery.validator.format('Por favor, insira ao menos {0} caracteres.'),
    rangelength: jQuery.validator.format('Por favor, insira entre {0} e {1} caracteres.'),
    range: jQuery.validator.format('Por favor, insira um valor entre {0} e {1}.'),
    max: jQuery.validator.format('Por favor, insira um valor menor ou igual a {0}.'),
    min: jQuery.validator.format('Por favor, insira um valor maior ou igual a {0}.')
});
  
  