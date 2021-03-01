$(document).ready(function(){
	$('#cpf').mask('000.000.000-00');
	$('#telefone').mask('(00)00000-0000');
	$('#cep').mask('00.000-000');
  $('#numero').mask('0######');

	$("#cidade").select2();

  $("#msnSucessoCad").hide();
  $("#msnErroCad").hide();
  $("#msnErroCpf").hide();

  /*$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })*/

});

$("#formularioCliente").validate({
 rules:{
   nmCliente:{
     required:true,
     minlength: 3,
   },         
   sexo:{
     required:true       
   },        
   dtNascimento:{
     required:true
   }, 
   cpf:{
     required:true
   }, 
   rg:{
     required:true
   },
   telefone:{
     required:true
   },
   email:{
     required:true,
     email: true         
   }, 
   senha:{
     required: true,
     minlength: 6,
   },
   senha2:{
     required: true,
     minlength: 6,
     equalTo: "#senha",
   },
   rua:{
     required:true
   }, 
   numero:{
     required:true
   },
   bairro:{
     required:true
   }, 
   cep:{
     required:true
   },
   cidade:{
     required:true
   },        
 }, 
 messages:{      
   nmCliente:{
     required:"Campo obrigatório",
     minlength: "O nome deve conter no mínimo 3 caracteres."
   },         
   sexo:{
     required:"Campo obrigatório"      
   },        
   dtNascimento:{
     required:"Campo obrigatório"
   }, 
   cpf:{
     required:"Campo obrigatório"
   }, 
   rg:{
     required:"Campo obrigatório"
   },
   telefone:{
     required:"Campo obrigatório"
   },
   email:{
     required:"Campo obrigatório",
     email:"E-mail inválido"
   },
   senha:{
     required:"Campo obrigatório",
     minlength: "A senha deve conter no mínimo 6 digitos."
   },
   senha2: {
     required: "Campo obrigatório.*",
     minlength: "A senha deve conter no mínimo 6 digitos.",
     equalTo: "As senhas digitadas não coincidem."
   },
   rua:{
     required:"Campo obrigatório"
   }, 
   numero:{
     required:"Campo obrigatório"
   },
   bairro:{
     required:"Campo obrigatório"
   }, 
   cep:{
     required:"Campo obrigatório"
   },
   cdCidade:{
     required:"Campo obrigatório"
   } 
 },
 submitHandler: SalvarCliente
});

function SalvarCliente(){
    if (testaCpf()){
      var clientes = JSON.parse(localStorage.getItem('DadosCliente'));

      var cliente = new Object();
      
      cliente.cdCliente = parseInt($('#cdCliente').val());
      cliente.nmCliente = $('#nmCliente').val();
      cliente.sexo = $('#sexo').val();
      cliente.dtNascimento = $('#dtNascimento').val();
      cliente.cpf = $('#cpf').val();
      cliente.rg = $('#rg').val();
      cliente.telefone = $('#telefone').val();
      cliente.email = $('#email').val();
      cliente.senha = $('#senha').val();
      cliente.senha2 = $('#senha2').val();
      cliente.rua = $('#rua').val();
      cliente.numero = $('#numero').val();
      cliente.bairro = $('#bairro').val();
      cliente.cep = $('#cep').val();
      cliente.cidade = $('#cidade').val();

      $('#formularioCliente').each (function(){
        this.reset();
      });
      
      var $codigo;   

      for (var i=0; i<clientes.length; i++){
        $codigo = clientes[i].cdCliente;
      }

      cliente.cdCliente = ++$codigo;

      clientes.push(cliente);

      localStorage.setItem('DadosCliente', JSON.stringify(clientes)); 

      $("#areaFormulario").hide();
      $("#areaAgendamento").show();
      $("#areaRegistro").show();

      $("#msnSucessoCad").show();

      preencherSelectCliente();

      setTimeout(function(){ 
        $("#msnSucessoCad").hide();  
      }, 3000);  
    }else{
      $("#areaFormulario").hide();
      $("#areaAgendamento").show();
      $("#areaRegistro").show();
      
      $("#msnErroCad").show(); 

      preencherSelectCliente();

      setTimeout(function(){ 
        $("#msnErroCad").hide();  
      }, 3000);  
    }  
}

function preencherSelectCliente(){
    var clientes = JSON.parse(localStorage.getItem('DadosCliente'));

    $("#cliente option").remove();
    
    for(var posicao = 0; posicao < clientes.length; posicao++){
      
        var novoOption = "<option  value="+clientes[posicao].cdCliente+">"+clientes[posicao].nmCliente+"-"+clientes[posicao].telefone+"</option>";             
      
      $("#cliente").append(novoOption);
    }
}

function addCidadeExibirModal(){
     $("#nome").val("");
     $("#addCidadeModal").modal();
  }

  function addCidade(){
    var cidades = JSON.parse(localStorage.getItem('DadosCidade'));

    var cidade = new Object();

    var $cod;
    for (var i = 0; i < cidades.length; i++) {
      $cod = cidades[i].cdCidade;
    }

    var $nome = $("#nome").val();
    cidade.cdCidade = ($cod + 1);
    cidade.nmCidade = $nome;

    cidades.push(cidade);

    localStorage.setItem('DadosCidade', JSON.stringify(cidades));
    preencherSelectCidade($cod);

    $('#addCidadeModal').modal('hide')

  }

  function preencherSelectCidade(codigo){

    var cidades = JSON.parse(localStorage.getItem('DadosCidade'));
    
    $("#cdCidade option").remove();
    
    for(var posicao = 0; posicao < cidades.length; posicao++){
      
      var novoOption = "";

      if(cidades[posicao].cdCidade == codigo){
         
        novoOption = "<option value='"+cidades[posicao].cdCidade+"' selected='enable'>"+cidades[posicao].nmCidade+"</option>";     
      }else{
        novoOption = "<option  value='"+cidades[posicao].cdCidade+"'>"+cidades[posicao].nmCidade+"</option>";             
      }
     
      $("#cdCidade").append(novoOption);
    }
  }

function testaCpf() {
  var cpf = $("#cpf").val()
  var novoCpf1 = cpf.substr(0, 3);
  var novoCpf2 = cpf.substr(4, 3);
  var novoCpf3 = cpf.substr(8, 3);
  var novoCpf4 = cpf.substr(12, 2);
  cpf = novoCpf1+novoCpf2+novoCpf3+novoCpf4;
  var Soma;
  var Resto;
  Soma = 0;
  if ((cpf == "00000000000") || (cpf == "11111111111") || (cpf == "22222222222") || 
    (cpf == "33333333333") || (cpf == "44444444444") || (cpf == "55555555555") || 
    (cpf == "66666666666") || (cpf == "77777777777") || (cpf == "88888888888") || 
    (cpf == "99999999999")){
    $("#msnErroCpf").show();
    return false;
  } 
  
  for (i=1; i<=9; i++){
    Soma = Soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
  } 

  Resto = (Soma * 10) % 11;

  if ((Resto == 10) || (Resto == 11)){
    Resto = 0;
  } 

  if (Resto != parseInt(cpf.substring(9, 10)) ){
    $("#msnErroCpf").show(); 
    return false; 
  } 
  
  Soma = 0;
  for (i = 1; i <= 10; i++){
    Soma = Soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
  } 

  Resto = (Soma * 10) % 11;
  
  if ((Resto == 10) || (Resto == 11)){
    Resto = 0;
  } 

  if (Resto != parseInt(cpf.substring(10, 11) ) ){
    $("#msnErroCpf").show();
    return false;
  } 
  return true;
}

function teste(){
  $("#msnErroCpf").hide();
}