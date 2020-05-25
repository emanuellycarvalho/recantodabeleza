// $('#cadastro').validator();
  
  $(document).ready(function(){
      $('#cadastro').validate({
        rules: {
          nome: 'required',
          tipo: {
            min: 1
          },
          telefone: 'required',
          dtNasc: 'date',
          cpf: 'required',
          cnpj: 'required',
          senha: 'required',
          senha2: 'required',
          rua: 'required',
          cidade: 'required',
          bairro: 'required',
          numero: 'required',
          marca: 'required',
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
          email: {
            email: 'O e-mail que você inseriu não é valido.'
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
  });

  $(document).ready(function(){
    //CONFERIR SENHAS IGUAIS
    $('#verificar').hide();
  });
  
  function verificarSenha(){
    if ($('#senha').val() != $('#senha2').val()){
      $('#verificar').show();
      document.getElementById('senha2').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
    } else{
      $('#verificar').hide();
    }
  }

  function verificarPreco(){
    var a = parseFloat($('#preco').val());
    if (a < 1){
      $('#verificar').show();
      document.getElementById('preco').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
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

  
jQuery.extend(jQuery.validator.messages, {
    required: 'Por favor, preencha este campo.',
    remote: 'Por favor, corrija este campo.',
    email: 'O e-mail que você inseriu não é valido.',
    url: 'Por favor, forne&ccedil;a uma URL v&aacute;lida.',
    date: 'A data que você inseriu não é valida.',
    dateISO: 'Por favor, forne&ccedil;a uma data v&aacute;lida (ISO).',
    number: 'Por favor, forne&ccedil;a um n&uacute;mero v&aacute;lido.',
    digits: 'Por favor, forne&ccedil;a somente d&iacute;gitos.',
    creditcard: 'Por favor, forne&ccedil;a um cart&atilde;o de cr&eacute;dito v&aacute;lido.',
    equalTo: 'Por favor, forne&ccedil;a o mesmo valor novamente.',
    accept: 'Por favor, forne&ccedil;a um valor com uma extens&atilde;o v&aacute;lida.',
    maxlength: jQuery.validator.format('Por favor, forne&ccedil;a n&atilde;o mais que {0} caracteres.'),
    minlength: jQuery.validator.format('Por favor, forne&ccedil;a ao menos {0} caracteres.'),
    rangelength: jQuery.validator.format('Por favor, forne&ccedil;a um valor entre {0} e {1} caracteres de comprimento.'),
    range: jQuery.validator.format('Por favor, forne&ccedil;a um valor entre {0} e {1}.'),
    max: jQuery.validator.format('Por favor, forne&ccedil;a um valor menor ou igual a {0}.'),
    min: jQuery.validator.format('Por favor, forne&ccedil;a um valor maior ou igual a {0}.')
});
  
  