var $situacao = "";

if(!localStorage.DadosCidade){
  var cidades = new Array();
  localStorage.setItem('DadosCidade', JSON.stringify(cidades));
  preencherCidade();
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

  $("#areaFormulario").hide();
  $("#areaTabela").show(); 

  $("#limpar").hide();   

  var cidades = JSON.parse(localStorage.getItem('DadosCidade'));
  preencherTabela(cidades);

  var table = $('#tabelaCidade').DataTable(
  {
    "order": [[ 1, "asc" ]],
    "columnDefs": [
    { "orderable": true,  "targets": 0 },
    { "orderable": true,  "targets": 1 },
    { "orderable": false, "targets": 2 },
    { "orderable": false, "targets": 3 },
    { "orderable": false, "targets": 4 }
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

  /*$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })*/

});

$("#formularioCidade").validate({
 rules:{
   nmCidade:{
     required:true,
     minlength: 3,
   },               
 }, 
 messages:{      
   nmCidade:{
     required:"Campo obrigatório",
     minlength: "O nome deve conter no mínimo 3 caracteres."
   }
 },
 submitHandler: SalvarCidade
});


function SalvarCidade(){
    var cidades = JSON.parse(localStorage.getItem('DadosCidade'));

    var cidade = new Object(); 

    cidade.cdCidade = parseInt($('#cdCidade').val());
    cidade.nmCidade = $('#nmCidade').val();
  
    $('#formularioCidade').each (function(){
      this.reset();
    });
    
    if($situacao == "novo"){
      var teste = false

      var codigo;
      for (var i=0; i<cidades.length; i++){
        $codigo = cidades[i].cdCidade;
      }

      cidade.cdCidade = (++$codigo);
      
      for (var posicao=0; posicao < cidades.length; posicao++) {
        if (cidades[posicao].cdCidade == cidade.cdCidade) {
          teste = true
        } 
      } 
      
      if(teste == true){
        alert("Favor informar outro código.");
      }else{
       
        cidades.push(cidade);
        localStorage.setItem('DadosCidade', JSON.stringify(cidades)); 

        $("#areaFormulario").hide();

        $("#areaTabela").show();
        $("#msnSucessoCad").show(); 

        preencherTabela(cidades);

        setTimeout(function(){ 
          $("#msnSucessoCad").hide(); 
        }, 3000);     
        //$(location).attr('href', 'CadastroCidade.php');      
      }
    }else{
      if($situacao == "editar"){        
        for (var posicao=0; posicao < cidades.length; posicao++) {
          if (cidades[posicao].cdCidade == cidade.cdCidade) {
            cidades[posicao].nmCidade = cidade.nmCidade;
          } 
        }
        localStorage.setItem('DadosCidade', JSON.stringify(cidades));
        $("#areaFormulario").hide();

        $("#areaTabela").show();
        $("#msnSucessoEdit").show();  

        preencherTabela(cidades);

        setTimeout(function(){ 
          $("#msnSucessoEdit").hide();  
        }, 3000);     
        //$(location).attr('href', 'CadastroCidade.php');        
      }
    }     

  } 
    
  function preencherTabela(dados){
    $("#tabelaCidade tbody tr").remove();

    for(var posicao = 0; posicao < dados.length; posicao++){

      var novaLinha = "<tr>" +
              "<td>"+dados[posicao].cdCidade+"</td>" +  
              "<td>"+dados[posicao].nmCidade+"</td>" + 
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Excluir Cidade' onclick='exibirModalExcluir("+dados[posicao].cdCidade+")' > <img src='imagens/cidadeApagar.png'> </td>" +
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Editar Cidade' onclick='editarDado("+dados[posicao].cdCidade+")'> <img src='imagens/cidadeEditar.png'> </td>" + 
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Visualizar Cidade' onclick='visualizarDado("+dados[posicao].cdCidade+")' > <img src='imagens/cidadeVisualizar.png'> </button></td>" + 
              "</tr>";
      $("#tabelaCidade").append(novaLinha);
      
      /*$('#tabelaCidade').DataTable({
        "order": [[ 1, "asc" ]]
      });*/
    }
    
  } 
  
  function editarDado(codigo){
    
    $situacao = "editar";
    var cidades = JSON.parse(localStorage.getItem('DadosCidade'));
    for (var posicao=0; posicao < cidades.length; posicao++) {
      if (cidades[posicao].cdCidade == codigo) {
        
        $('#cdCidade').val(cidades[posicao].cdCidade);
        $('#nmCidade').val(cidades[posicao].nmCidade);        
        
      } 
    } 
    //$("#cdCidade").prop("readonly", true );
    $("#areaTabela").hide();
    $("#areaFormulario").show();
    $("#tituloEdit").show();
  } 
  
  function exibirModalExcluir(codigo){
    var cidades = JSON.parse(localStorage.getItem('DadosCidade'));
    for (var posicao=0; posicao < cidades.length; posicao++) {
      if (cidades[posicao].cdCidade == codigo) {
        
        $("#nmCidade2").val(cidades[posicao].nmCidade )

        $("#botaoExcluirModal").click(function () {
            excluirDado(codigo);
        });
    
      } 
    }     

      $("#confirm-delete").modal();   
  }

  function excluirDado(codigo){

    var cidades = JSON.parse(localStorage.getItem('DadosCidade'));

    for (var posicao=0; posicao < cidades.length; posicao++) {
      if (cidades[posicao].cdCidade == codigo) {
        cidades.splice(posicao, 1); 
      } 
    }   

    localStorage.setItem('DadosCidade', JSON.stringify(cidades));   

    $("#msnSucesso").show();  
    $('#confirm-delete').modal('hide');

    preencherTabela(cidades);

    setTimeout(function(){ 
      $("#msnSucesso").hide();  
    }, 3000);

  } 

  function visualizarDado(codigo){
    $("#salvar").hide();
    $("#cancelar").html("Voltar");
    $("#cancelar").css("backgroundColor", "black");
    $("#cancelar").css("border", "1px solid black");
    $("#cancelar").css("marginRight", "17%");
    var cidades = JSON.parse(localStorage.getItem('DadosCidade'));
    for (var posicao=0; posicao < cidades.length; posicao++) {
      if (cidades[posicao].cdCidade == codigo) {
        
        $('#cdCidade').val(cidades[posicao].cdCidade).prop("readonly", true );
        $('#nmCidade').val(cidades[posicao].nmCidade).prop("readonly", true );        
      } 
    } 

    $("#areaTabela").hide();
    $("#areaFormulario").show();
    $("#tituloVisu").show();
  }

  function cadastrarDado(){
    $situacao = "novo";
    $("#limpar").hide();
    $("#areaTabela").hide();
    $("#areaFormulario").show();
    $("#tituloCad").show();
  } 

  function filtrar(){
    $situacao = "filtrar"
    $("#confirm-filtro").modal();
   
  }

  function filtrarDado(){
    $situacao = "filtrar";
    var cidades = JSON.parse(localStorage.getItem('DadosCidade'));
    var $nome = $("#nmCidade1").val();
    var filtrados = new Array();
    var filtrado;

    for (var i = 0; i < cidades.length; i++) {
      if(cidades[i].nmCidade === $nome ) {
        console.log("estou aqui");
        filtrado = new Object();
        filtrado.cdCidade = cidades[i].cdCidade;
        filtrado.nmCidade = cidades[i].nmCidade;
        filtrados.push(filtrado);
      }
    }
    $('#confirm-filtro').modal('hide');
    $("#limpar").show();
    preencherTabela(filtrados);
  }

 
  function preencherCidade(){
    
    var cidades = JSON.parse(localStorage.getItem('DadosCidade'));

    var cidade = new Object();

    cidade.cdCidade = 1;
    cidade.nmCidade = "Coronel Fabriciano";

    cidades.push(cidade);

    cidade = new Object();
    cidade.cdCidade = 2;
    cidade.nmCidade = "Ipatinga";

    cidades.push(cidade);

    cidade = new Object();
    cidade.cdCidade = 3;
    cidade.nmCidade = "Jaguaraçu";

    cidades.push(cidade);

    cidade = new Object();
    cidade.cdCidade = 4;
    cidade.nmCidade = "João Monlevade";

    cidades.push(cidade);

    cidade = new Object();
    cidade.cdCidade = 5;
    cidade.nmCidade = "Marliéria";

    cidades.push(cidade);

    cidade = new Object();
    cidade.cdCidade = 6;
    cidade.nmCidade = "Timóteo";

    cidades.push(cidade);

    localStorage.setItem('DadosCidade', JSON.stringify(cidades)); 

  }

  /*function filtrarDado(){
    $situacao = "filtrar";
    var cidades = JSON.parse(localStorage.getItem('DadosCidade'));
    var nome = $("#nmCliente1").val();
    var cpf = $("#cpf1").val();
    var email = $("#email1").val();
    var filtrados = new Array();
    for (var i = 0; i < cidades.length; i++) {
      if(cidades[i].nmCidade.indexOf(nome) > 0){
        filtrados[i]=cidades[i];
      }
    }
    preencherTabela(filtrados);
  }*/




