

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
      rg:'required',
      rua: 'required',
      cidade: 'required',
      bairro: 'required',
      numero: 'required',
      marca: 'required',
      cliente: 'required',
      inicio: 'required',
      fim: 'required',
      senha2: 'required',
      senha: {
        required: true,
        minlength: 6
      },
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

    //VALIDATE
    $('#cadastro1').validate({
      rules: {
        nome: 'required',
        tipo: {
          min: 1
        },
        telefone: 'required',
        cep: 'required',
        cpf: 'required',
        cnpj: 'required',
        numero: 'required',
        marca: 'required',
        cliente: 'required',
        inicio: 'required',
        fim: 'required',
        senha2: 'required',
        senha: {
          required: true,
          minlength: 6
        },
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


  $(document).ready(function() {

    //VERIFICAR CNPJ
    $('#cnpj').blur(function(){

     if($(this).val() == null || $(this).val() == '')
      return;

      if(!validaCPFeCNPJ($(this).val())){
        document.getElementById('cnpj').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
        document.getElementById('verificarCNPJ').innerText = 'O CNPJ que você inseriu é inválido.'
        $('#verificarCNPJ').show();
        return;
      } 

      document.getElementById('cnpj').style.boxShadow = 'none';
      document.getElementById('verificarCNPJ').innerText = '';
      $('#verificarCNPJ').hide();
      return;

    });

    //VERIFICAR CPF
    $('#cpf').blur(function(){

      if($(this).val() == null || $(this).val() == '')
        return;

      if(!validaCPFeCNPJ($(this).val())){
        document.getElementById('cpf').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
        document.getElementById('verificarCPF').innerText = 'O CPF que você inseriu é inválido.'
        $('#verificarCPF').show();
        return;
      } 

      document.getElementById('cpf').style.boxShadow = 'none';
      document.getElementById('verificarCPF').innerText = '';
      $('#verificarCPF').hide();
      return;

    });

    //VERIFICAR SENHA ONINPUT
    $('#senha2').on('input', function(){

      if($('#senha').val()== null || $('#senha').val() == '')
        return;

      if ($('#senha').val() != $('#senha2').val()){
        $('#verificarSenha').show();
        document.getElementById('senha2').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
        return;
      }
      
      $('#verificarSenha').hide();
      document.getElementById('senha2').style.boxShadow = 'none';
      return;

    }); 

     //VERIFICAR DATA DE NASCIMENTO
     $('#dtNasc').blur(function(){

      if($(this).val() == null || $(this).val() == '')
        return;

      if(!verificarData($(this).val())){
        document.getElementById('dtNasc').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
        $('#verificarDtNasc').show();
        return;
      } 

      document.getElementById('dtNasc').style.boxShadow = 'none';
      $('#verificarDtNasc').hide();

    });

    //VERIFICAR PRECO ONINPUT
    $('#preco').on('input', function(){

      var a = parseFloat($(this).val());
      if (a < 1){
        document.getElementById('preco').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
        $('#verificarPreco').show();
        return;
      }

      $('#verificarPreco').hide();
      document.getElementById('senha2').style.boxShadow = 'none';
      return;
    });

    //VERIFICAR TELEFONE BLUR
    $('#telefone').blur(function(){

      if($(this).val() == null || $(this).val() == '')
        return;    

      if(!(/^\((?:[14689][1-9]|2[12478]|3[1234578]|5[1345]|7[134579])\) (?:[2-8]|9[1-9])[0-9]{3}\-[0-9]{4}$/.test($(this).val()))){
        document.getElementById('telefone').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
        $('#verificarTelefone').show();
        return;
      }

      document.getElementById('telefone').style.boxShadow = 'none';
      $('#verificarTelefone').hide();

    });

    // CEP E ENDEREÇO
    $('#cidade').blur(function(){
      var r = $('#rua').val();
      var c = $('#cidade').val();
  
      $.getJSON('https://viacep.com.br/ws/MG/' + c + '/' + r + '/json/', function(dados) {
  
        if (!('erro' in dados)) {
            //Atualiza os campos com os valores da consulta.
            $('#cep').val(dados[0].cep);
            if ($('#bairro').value() == ''){
              $('#cep').val(dados[0].bairro)
            }
            document.getElementById('cep').style.boxShadow = 'none';
            $('#verificarCEP').hide();
        } //end if.
      
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

  //VERIFICAR DATA
  function verificarData(data){
    if(data == null || data == '')
      return true;

    reg = /[^\d\/\.]/gi;                  // Mascara = dd/mm/aaaa | dd.mm.aaaa
    var valida = data.replace(reg,'');    // aplica mascara e valida só numeros
    if (valida && valida.length == 10) {  // é válida, então ;)
      var ano = data.substr(6),
        mes = data.substr(3,2),
        dia = data.substr(0,2),
        M30 = ['04','06','09','11'],
        v_mes = /(0[1-9])|(1[0-2])/.test(mes),
        v_ano = /(19[1-9]\d)|(20\d\d)|2100/.test(ano),
        rexpr = new RegExp(mes),
        fev29 = ano % 4? 28: 29;

      if(parseInt(ano) >= moment().format('YYYY')) 
        return false;

      if (v_mes && v_ano) {
        if (mes == '02') return (dia >= 1 && dia <= fev29);
        else if (rexpr.test(M30)) return /((0[1-9])|([1-2]\d)|30)/.test(dia);
        else return /((0[1-9])|([1-2]\d)|3[0-1])/.test(dia);
      }
    }
    return false                           // se inválida :(
  }

  window.validaCPFeCNPJ = function(val) {
    if(val == null || val == '')
      return true;

    if (val.length == 14) {
        var cpf = val.trim();
     
        cpf = cpf.replace(/\./g, '');
        cpf = cpf.replace('-', '');
        cpf = cpf.split('');
        
        var v1 = 0;
        var v2 = 0;
        var aux = false;
        
        for (var i = 1; cpf.length > i; i++) {
            if (cpf[i - 1] != cpf[i]) {
                aux = true;   
            }
        } 
        
        if (aux == false) {
            return false; 
        } 
        
        for (var i = 0, p = 10; (cpf.length - 2) > i; i++, p--) {
            v1 += cpf[i] * p; 
        } 
        
        v1 = ((v1 * 10) % 11);
        
        if (v1 == 10) {
            v1 = 0; 
        }
        
        if (v1 != cpf[9]) {
            return false; 
        } 
        
        for (var i = 0, p = 11; (cpf.length - 1) > i; i++, p--) {
            v2 += cpf[i] * p; 
        } 
        
        v2 = ((v2 * 10) % 11);
        
        if (v2 == 10) {
            v2 = 0; 
        }
        
        if (v2 != cpf[10]) {
            return false; 
        } else {   
            return true; 
        }
    } else if (val.length == 18) {
        var cnpj = val.trim();
        
        cnpj = cnpj.replace(/\./g, '');
        cnpj = cnpj.replace('-', '');
        cnpj = cnpj.replace('/', ''); 
        cnpj = cnpj.split(''); 
        
        var v1 = 0;
        var v2 = 0;
        var aux = false;
        
        for (var i = 1; cnpj.length > i; i++) { 
            if (cnpj[i - 1] != cnpj[i]) {  
                aux = true;   
            } 
        } 
        
        if (aux == false) {  
            return false; 
        }
        
        for (var i = 0, p1 = 5, p2 = 13; (cnpj.length - 2) > i; i++, p1--, p2--) {
            if (p1 >= 2) {  
                v1 += cnpj[i] * p1;  
            } else {  
                v1 += cnpj[i] * p2;  
            } 
        } 
        
        v1 = (v1 % 11);
        
        if (v1 < 2) { 
            v1 = 0; 
        } else { 
            v1 = (11 - v1); 
        } 
        
        if (v1 != cnpj[12]) {  
            return false; 
        } 
        
        for (var i = 0, p1 = 6, p2 = 14; (cnpj.length - 1) > i; i++, p1--, p2--) { 
            if (p1 >= 2) {  
                v2 += cnpj[i] * p1;  
            } else {   
                v2 += cnpj[i] * p2; 
            } 
        }
        
        v2 = (v2 % 11); 
        
        if (v2 < 2) {  
            v2 = 0;
        } else { 
            v2 = (11 - v2); 
        } 
        
        if (v2 != cnpj[13]) {   
            return false; 
        } else {  
            return true; 
        }
    } else {
        return false;
    }
 }

// MENSAGENS PERSONALIZADAS
jQuery.extend(jQuery.validator.messages, {
    required: 'Por favor, preencha este campo.',
    remote: 'Por favor, corrija este campo.',
    email: 'O e-mail que você inseriu é inválido.',
    url: 'Por favor, insira uma URL válida.',
    date: 'A data que você inseriu é inválida.',
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
  
  