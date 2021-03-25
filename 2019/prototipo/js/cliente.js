var $situacao = "";

if(!localStorage.DadosCliente){
  var clientes = new Array();
  localStorage.setItem('DadosCliente', JSON.stringify(clientes));
  preencherCliente();
}

$(document).ready(function(){
  $("#msnSucesso").hide();
  $("#msnErro").hide();
  $("#msnSucessoCad").hide();
  $("#msnErroCad").hide();
  $("#msnSucessoEdit").hide();
  $("#msnErroEdit").hide();

  $("#tituloCad").hide();
  $("#tituloEdit").hide();
  $("#tituloVisu").hide();

  $("#msnErroCpf").hide();

  $("#areaTabela").show();    
  $("#areaFormulario").hide();
  $("#limpar").hide();

  var clientes = JSON.parse(localStorage.getItem('DadosCliente'));
  preencherTabela(clientes);
  preencherSelectCidade(0);

  $('#tabelaCliente').DataTable(
  {
    "order": [[ 0, "asc" ]],
    "columnDefs": [
    { "orderable": true,  "targets": 0 },
    { "orderable": true,  "targets": 1 },
    { "orderable": true,  "targets": 2 },
    { "orderable": true,  "targets": 3 },
    { "orderable": false, "targets": 4 },
    { "orderable": false, "targets": 5 },
    { "orderable": false, "targets": 6 }
    ],
    "language": {
      "sEmptyTable": "Nenhum registro encontrado",
      "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
      "sInfoFiltered": "(Filtrados de _MAX_ registros)",
      "sInfoPostFix": "",
      "sInfoThousands": ".",
      "sLengthMenu": "_MENU_ resultados por página",
      "sLoadingRecords": "Carregando...",
      "sProcessing": "Processando...",
      "sZeroRecords": "Nenhum registro encontrado",
      "sSearch": "Pesquisar",
      "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
      },
      "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
      }
    } 

  });

  $('#cpf').mask('000.000.000-00');
  $('#telefone').mask('(00)00000-0000');
  $('#cep').mask('00.000-000');
  $('#numero').mask('0######');
  

  $("#cdCidade").select2();

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
     required:true,
     minlength: 14
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
     required:true,
     minlength: 10
   },
   cdCidade:{
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
     required:"Campo obrigatório",
     minlength: "O cpf deve conter 11 dígitos."
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
     required:"Campo obrigatório",
     minlength: "O cep deve conter 8 dígitos."
   },
   cdCidade:{
     required:"Campo obrigatório"
   } 
 },
 submitHandler: SalvarCliente
});

function SalvarCliente(){

    var clientes = JSON.parse(localStorage.getItem('DadosCliente'));
    if (testaCpf()){

      var cliente = new Object();
      
      cliente.cdCliente = parseInt($('#cdCliente').val());
      cliente.nmCliente = $('#nmCliente').val();

      /*if($("#sexoF").attr('checked','true')){
           cliente.sexo = "F";
      }else{
        if($("#sexoM").attr('checked','true')){
          cliente.sexo = "M";      
        } 
      }*/
      cliente.sexo = $("input[name='sexo']:checked").val();
      cliente.dtNascimento = $('#dtNascimento').val();
      cliente.cpf = $('#cpf').val();
      cliente.rg = $('#rg').val();
      cliente.telefone = $('#telefone').val();
      cliente.email = $('#email').val();
      cliente.senha = $('#senha').val();
      cliente.senha2 = $('#senha2').val();
      cliente.rua = $('#rua').val();
      cliente.numero = $('#numero').val();
      cliente.complemento = $('#complemento').val();
      cliente.bairro = $('#bairro').val();
      cliente.cep = $('#cep').val();
      cliente.cdCidade = $('#cdCidade').val();

      $('#formularioCliente').each (function(){
        this.reset();
      });
      
      if($situacao == "novo"){
        var teste = false
        var $codigo;   

        for (var i=0; i<clientes.length; i++){
          $codigo = clientes[i].cdCliente;
        }

        cliente.cdCliente = ++$codigo;
       
        clientes.push(cliente);
        localStorage.setItem('DadosCliente', JSON.stringify(clientes)); 

        $("#areaFormulario").hide();
        $("#areaTabela").show();
        $("#msnSucessoCad").show(); 

        preencherTabela(clientes);

        setTimeout(function(){ 
          $("#msnSucessoCad").hide(); 
        }, 3000);        
        
      }else{
        if($situacao == "editar"){        
          for (var posicao=0; posicao < clientes.length; posicao++) {
            if (clientes[posicao].cdCliente == cliente.cdCliente) {
              clientes[posicao].nmCliente = cliente.nmCliente;
              clientes[posicao].sexo = cliente.sexo;
              clientes[posicao].dtNascimento= cliente.dtNascimento;
              clientes[posicao].cpf = cliente.cpf;
              clientes[posicao].rg= cliente.rg;
              clientes[posicao].telefone= cliente.telefone;
              clientes[posicao].email = cliente.email;
              clientes[posicao].senha= cliente.senha;
              clientes[posicao].senha2= cliente.senha2;
              clientes[posicao].rua= cliente.rua;
              clientes[posicao].numero= cliente.numero;
              clientes[posicao].complemento= cliente.complemento;
              clientes[posicao].bairro = cliente.bairro;
              clientes[posicao].cep= cliente.cep;
              clientes[posicao].cdCidade= cliente.cdCidade;
            } 
          }
          localStorage.setItem('DadosCliente', JSON.stringify(clientes)); 
          $("#areaFormulario").hide();
          $("#areaTabela").show();
          $("#msnSucessoEdit").show();  

          preencherTabela(clientes);

          setTimeout(function(){ 
            $("#msnSucessoEdit").hide();  
          }, 3000);            
        }
      }
    }else{
      $("#areaFormulario").hide();
      $("#areaTabela").show();
      if ($situacao == "novo") {
        $("#msnErroCad").show(); 

        preencherTabela(clientes);

        setTimeout(function(){ 
          $("#msnErroCad").hide();  
        }, 3000);
      }else{
        if ($situacao == "editar") {
          $("#msnErroEdit").show(); 

          preencherTabela(clientes);

          setTimeout(function(){ 
            $("#msnErroEdit").hide();  
          }, 3000);
        }
      }  
    }  
  } 
    
  function preencherTabela(dados){
    $("#tabelaCliente tbody tr").remove();

    for(var posicao = 0; posicao < dados.length; posicao++){

      var novaLinha = "<tr>" +
              "<td>"+dados[posicao].nmCliente+"</td>" +  
              "<td>"+dados[posicao].cpf+"</td>" +
              "<td>"+dados[posicao].telefone+"</td>" + 
              "<td>"+dados[posicao].email+"</td>" +  
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Excluir Cliente' onclick='exibirModalExcluir("+dados[posicao].cdCliente+")' ><img src='imagens/usuarioApagar1.png'></button></td>" +
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Editar Cliente' onclick='editarDado("+dados[posicao].cdCliente+")' ><img src='imagens/usuarioEditar1.png'></button></td>" + 
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Visualizar Cliente' onclick='visualizarDado("+dados[posicao].cdCliente+")' ><img src='imagens/usuarioVisualizar1.png'></button></td>" + 
              "</tr>";
      $("#tabelaCliente").append(novaLinha);
    }
   



  } 
  
  function editarDado(codigo){
    $("#novaCidade").show();
    $situacao = "editar";
    var clientes = JSON.parse(localStorage.getItem('DadosCliente'));
    for (var posicao=0; posicao < clientes.length; posicao++) {
      if (clientes[posicao].cdCliente == codigo) {
        
        $('#cdCliente').val(clientes[posicao].cdCliente);
        $('#nmCliente').val(clientes[posicao].nmCliente);        

        if(clientes[posicao].sexo == "F"){
          $("#sexoF").attr('checked','true');
        }else{
           if(clientes[posicao].sexo == "M"){
              $("#sexoM").attr('checked','true'); 
            } 

        }

        $('#dtNascimento').val(clientes[posicao].dtNascimento);
        $('#cpf').val(clientes[posicao].cpf);
        $('#rg').val(clientes[posicao].rg);        
        $('#telefone').val(clientes[posicao].telefone);
        $('#email').val(clientes[posicao].email);
        $('#senha').val(clientes[posicao].senha);
        $('#senha2').val(clientes[posicao].senha2);
        $('#rua').val(clientes[posicao].rua);        
        $('#numero').val(clientes[posicao].numero);
        $('#complemento').val(clientes[posicao].complemento);
        $('#bairro').val(clientes[posicao].bairro);
        $('#cep').val(clientes[posicao].cep);
        $('#cdCidade').val(clientes[posicao].cdCidade);

        preencherSelectCidade(clientes[posicao].cdCidade);
        
      } 
    } 
    //$("#cdCliente").prop("readonly", true );
    $("#areaTabela").hide();
    $("#areaFormulario").show();
    $("#tituloEdit").show();
  } 
  
  function exibirModalExcluir(codigo){
    var clientes = JSON.parse(localStorage.getItem('DadosCliente'));
    for (var posicao=0; posicao < clientes.length; posicao++) {
      if (clientes[posicao].cdCliente == codigo) {
        
        $("#nmCliente2").val(clientes[posicao].nmCliente )
        $("#cpf2").val(clientes[posicao].cpf )

         $("#botaoExcluirModal").click(function () {
            excluirDado(codigo);
        });
    
      } 
    }     

      $("#confirm-delete").modal();   
  }

  function excluirDado(codigo){

    var clientes = JSON.parse(localStorage.getItem('DadosCliente'));

    for (var posicao=0; posicao < clientes.length; posicao++) {
      if (clientes[posicao].cdCliente == codigo) {
        clientes.splice(posicao, 1); 
      } 
    }   

    localStorage.setItem('DadosCliente', JSON.stringify(clientes));   

    $("#msnSucesso").show();  
    $('#confirm-delete').modal('hide');

    preencherTabela(clientes);



    setTimeout(function(){ 
      $("#msnSucesso").hide();  
    }, 3000);

  }

  function visualizarDado(codigo){
    $("#novaCidade").hide();
    $("#salvar").hide();
    $("#cancelar").html("Voltar");
    $("#cancelar").css("backgroundColor", "black");
    $("#cancelar").css("border", "1px solid black");
    var clientes = JSON.parse(localStorage.getItem('DadosCliente'));
    for (var posicao=0; posicao < clientes.length; posicao++) {
      if (clientes[posicao].cdCliente == codigo) {
        
        $('#cdCliente').val(clientes[posicao].cdCliente).prop("readonly", true );
        $('#nmCliente').val(clientes[posicao].nmCliente).prop("readonly", true );   

        if(clientes[posicao].sexo == "F"){
   
          $("#sexoF").attr('checked','true').prop("disabled", true );
          $("#sexoM").prop("disabled", true );
        }else{
           if(clientes[posicao].sexo == "M"){
            
              $("#sexoM").attr('checked','true').prop("disabled", true );
              $("#sexoF").prop("disabled", true );   
            } 
        }

        $('#dtNascimento').val(clientes[posicao].dtNascimento).prop("readonly", true );
        $('#cpf').val(clientes[posicao].cpf).prop("readonly", true );
        $('#rg').val(clientes[posicao].rg).prop("readonly", true );        
        $('#telefone').val(clientes[posicao].telefone).prop("readonly", true );
        $('#email').val(clientes[posicao].email).prop("readonly", true );
        $('#senha').val(clientes[posicao].senha).prop("readonly", true );
        $('#senha2').val(clientes[posicao].senha2).prop("readonly", true );
        $('#rua').val(clientes[posicao].rua).prop("readonly", true );        
        $('#numero').val(clientes[posicao].numero).prop("readonly", true );
        $('#complemento').val(clientes[posicao].complemento).prop("readonly", true );
        $('#bairro').val(clientes[posicao].bairro).prop("readonly", true );
        $('#cep').val(clientes[posicao].cep).prop("readonly", true );
        $('#cdCidade').val(clientes[posicao].cdCidade).prop("disabled", true );
        
      } 
    } 

    $("#areaTabela").hide();
    $("#areaFormulario").show();
    $("#tituloVisu").show();
  }

  function cadastrarDado(){
    $situacao = "novo";
    preencherSelectCidade(0);
    //$("#cdCliente").prop( "readonly", false );
    $("#areaTabela").hide();
    $("#areaFormulario").show();
    $("#novaCidade").show();
    $("#tituloCad").show();
  } 

  function filtrar(){
    $situacao = "filtrar"
    $("#confirm-filtro").modal();
   
  }

  function filtrarDado(){
    $situacao = "filtrar";
    var clientes = JSON.parse(localStorage.getItem('DadosCliente'));
    var $nome = $("#nmCliente1").val();
    var $cpf = $("#cpf1").val();
     var $tel = $("#tel1").val();
    var $email = $("#email1").val();
    var filtrados = new Array();
    var filtrado;

    for (var i = 0; i < clientes.length; i++) {
      if(clientes[i].nmCliente === $nome || clientes[i].cpf === $cpf || clientes[i].telefone === $tel || clientes[i].email === $email ) {
        console.log("estou aqui");
        filtrado = new Object();
        filtrado.cdCliente = clientes[i].cdCliente 
        filtrado.nmCliente = clientes[i].nmCliente;
        filtrado.sexo = clientes[i].sexo;
        filtrado.dtNascimento= clientes[i].dtNascimento;
        filtrado.cpf = clientes[i].cpf;
        filtrado.rg = clientes[i].rg;
        filtrado.telefone = clientes[i].telefone;
        filtrado.email = clientes[i].email;
        filtrado.senha = clientes[i].senha;
        filtrado.senha2 = clientes[i].senha2;
        filtrado.rua = clientes[i].rua;
        filtrado.numero = clientes[i].numero;
        filtrado.complemento = clientes[i].complemento;
        filtrado.bairro = clientes[i].bairro;
        filtrado.cep = clientes[i].cep;
        filtrado.cdCidade = clientes[i].cdCidade;
        
        filtrados.push(filtrado);
      }
    }
    $('#confirm-filtro').modal('hide');
    $("#limpar").show();
    preencherTabela(filtrados);
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

        $("#select2-cdCidade-container").attr("title", cidades[posicao].nmCidade);
        $("#select2-cdCidade-container").html(cidades[posicao].nmCidade);

      }else{
        novoOption = "<option  value='"+cidades[posicao].cdCidade+"'>"+cidades[posicao].nmCidade+"</option>";             
      }
     
      $("#cdCidade").append(novoOption);
    }
  }

  function preencherCliente(){
    var clientes = JSON.parse(localStorage.getItem('DadosCliente'));

    var cliente = new Object();    
    cliente.cdCliente = 1;
    cliente.nmCliente = "Ana";
    cliente.sexo = "F";
    cliente.dtNascimento = "2000-03-02";
    cliente.cpf = "111.111.111-11";
    cliente.rg = "MG-13.749.558";
    cliente.telefone = "(31)95654-4332";
    cliente.email = "ana@gmail.com";
    cliente.senha = "ana123";
    cliente.senha2 = "ana123";
    cliente.rua = "Rosa";
    cliente.numero = "12";
    cliente.complemento = "";
    cliente.bairro = "Jardim";
    cliente.cep = "35180-633";
    cliente.cdCidade = "1";

    clientes.push(cliente);

    cliente = new Object();    
    cliente.cdCliente = 2;
    cliente.nmCliente = "Joaquim";
    cliente.sexo = "M";
    cliente.dtNascimento = "2000-01-30";
    cliente.cpf = "222.222.222-22";
    cliente.rg = "MG-14.479.599";
    cliente.telefone = "(31)95689-6532";
    cliente.email = "joaquim@gmail.com";
    cliente.senha = "joaquim123";
    cliente.senha2 = "joaquim123";
    cliente.rua = "Jasmin";
    cliente.numero = "352";
    cliente.complemento = "";
    cliente.bairro = "Jardim";
    cliente.cep = "35170-638";
    cliente.cdCidade = "2";
    

    clientes.push(cliente);

    cliente = new Object();    
    cliente.cdCliente = 3;
    cliente.nmCliente = "Marcela";
    cliente.sexo = "F";
    cliente.dtNascimento = "2001-08-22";
    cliente.cpf = "333.333.333-33";
    cliente.rg = "MG-1.279.568";
    cliente.telefone = "(31)95645-4652";
    cliente.email = "marcela@gmail.com";
    cliente.senha = "marcela123";
    cliente.senha2 = "marcela123";
    cliente.rua = "Tulipa";
    cliente.numero = "555";
    cliente.complemento = "";
    cliente.bairro = "Jardim";
    cliente.cep = "35190-111";
    cliente.cdCidade = "3";

    clientes.push(cliente);

    cliente = new Object();    
    cliente.cdCliente = 4;
    cliente.nmCliente = "Pedro";
    cliente.sexo = "M";
    cliente.dtNascimento = "2002-04-05";
    cliente.cpf = "444.444.444-44";
    cliente.rg = "MG-02.123.544";
    cliente.telefone = "(31)96664-4332";
    cliente.email = "pedro@gmail.com";
    cliente.senha = "pedro123";
    cliente.senha2 = "pedro123";
    cliente.rua = "Cravo";
    cliente.numero = "6322";
    cliente.complemento = "";
    cliente.bairro = "Jardim";
    cliente.cep = "35150-633";
    cliente.cdCidade = "4";

    clientes.push(cliente);

    cliente = new Object();    
    cliente.cdCliente = 5;
    cliente.nmCliente = "Letícia";
    cliente.sexo = "F";
    cliente.dtNascimento = "2002-07-28";
    cliente.cpf = "555.555.555-55";
    cliente.rg = "MG-54.666.433";
    cliente.telefone = "(31)95657-5752";
    cliente.email = "leticia@gmail.com";
    cliente.senha = "leticia123";
    cliente.senha2 = "leticia123";
    cliente.rua = "Margarida";
    cliente.numero = "2";
    cliente.complemento = "A";
    cliente.bairro = "Jardim";
    cliente.cep = "35120-644";
    cliente.cdCidade = "5";

    clientes.push(cliente);

    cliente = new Object();    
    cliente.cdCliente = 6;
    cliente.nmCliente = "Mateus";
    cliente.sexo = "M";
    cliente.dtNascimento = "2001-06-13";
    cliente.cpf = "666.666.666-66";
    cliente.rg = "MG-34.675.322";
    cliente.telefone = "(31)97658-9032";
    cliente.email = "mateus@gmail.com";
    cliente.senha = "mateus123";
    cliente.senha2 = "mateus123";
    cliente.rua = "Girassol";
    cliente.numero = "567";
    cliente.complemento = "Apt 5";
    cliente.bairro = "Jardim";
    cliente.cep = "35150-443";
    cliente.cdCidade = "6";

    clientes.push(cliente);

    localStorage.setItem('DadosCliente', JSON.stringify(clientes)); 
  }

  /*function testaCpf(){
    var cpf = $("#cpf").val();

    var POSICAO, I, SOMA, DV, DV_INFORMADO;
    var DIGITO = new Array(10);
    DV_INFORMADO = cpf.substr(9, 2); // Retira os dois últimos dígitos do número informado

    // Desemembra o número do cpf na array DIGITO
    for (I=0; I<=8; I++) {
      DIGITO[I] = cpf.substr( I, 1);
    }

    // Calcula o valor do 10º dígito da verificação
    POSICAO = 10;
    SOMA = 0;
       for (I=0; I<=8; I++) {
          SOMA = SOMA + DIGITO[I] * POSICAO;
          POSICAO = POSICAO – 1;
       }
    DIGITO[9] = SOMA % 11;
       if (DIGITO[9] < 2) {
            DIGITO[9] = 0;
    }
       else{
           DIGITO[9] = 11 – DIGITO[9];
    }

    // Calcula o valor do 11º dígito da verificação
    POSICAO = 11;
    SOMA = 0;
       for (I=0; I<=9; I++) {
          SOMA = SOMA + DIGITO[I] * POSICAO;
          POSICAO = POSICAO – 1;
       }
    DIGITO[10] = SOMA % 11;
       if (DIGITO[10] < 2) {
            DIGITO[10] = 0;
       }
       else {
            DIGITO[10] = 11 – DIGITO[10];
       }

    // Verifica se os valores dos dígitos verificadores conferem
    DV = DIGITO[9] * 10 + DIGITO[10];
       if (DV != DV_INFORMADO) {
          alert("cpf inválido");
          $("#cpf").val() = "";
          $("#cpf").focus();
          return false;
       }
  }*/

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



