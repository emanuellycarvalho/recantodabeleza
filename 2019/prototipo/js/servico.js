var $situacao = "";

if(!localStorage.DadosServico){
  var servicos = new Array();
  localStorage.setItem('DadosServico', JSON.stringify(servicos));
  preencherServicos();
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

  var servicos = JSON.parse(localStorage.getItem('DadosServico'));
  preencherTabela(servicos);

  $('#tabelaServico').DataTable(
  {
    "order": [[ 0, "asc" ]],
    "columnDefs": [
    { "orderable": true,  "targets": 0 },
    { "orderable": true,  "targets": 1 },
    { "orderable": true,  "targets": 2 },
    { "orderable": false, "targets": 3 },
    { "orderable": false, "targets": 4 },
    { "orderable": false, "targets": 5 }
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

$("#formularioServico").validate({
 rules:{
   nmServico:{
     required:true,
     minlength: 3,
   },
   valor:{
     required:true,
   },               
 }, 
 messages:{      
   nmServico:{
     required:"Campo obrigatório",
     minlength: "O nome deve conter no mínimo 3 caracteres."
   },
   valor:{
     required:"Campo obrigatório",
   },
 },
 submitHandler: SalvarServico
});

function SalvarServico(){
    var servicos = JSON.parse(localStorage.getItem('DadosServico'));

    var servico = new Object(); 

    servico.cdServico = parseInt($('#cdServico').val());
    servico.nmServico = $('#nmServico').val();
    servico.valor = parseFloat($('#valor').val());
  
    $('#formularioServico').each (function(){
      this.reset();
    });
    
    if($situacao == "novo"){
      var teste = false

      var codigo;
      for (var i=0; i<servicos.length; i++){
        $codigo = servicos[i].cdServico;
      }

      servico.cdServico = (++$codigo);
      
      for (var posicao=0; posicao < servicos.length; posicao++) {
        if (servicos[posicao].cdServico == servicos.cdServico) {
          teste = true
        } 
      } 
      
      if(teste == true){
        alert("Favor informar outro código.");
      }else{
       
        servicos.push(servico);
        localStorage.setItem('DadosServico', JSON.stringify(servicos)); 

        $("#areaFormulario").hide();

        $("#areaTabela").show();
        $("#msnSucessoCad").show(); 

        preencherTabela(servicos);

        setTimeout(function(){ 
          $("#msnSucessoCad").hide(); 
        }, 3000);     
        //$(location).attr('href', 'CadastroServicos.php');      
      }
    }else{
      if($situacao == "editar"){        
        for (var posicao=0; posicao < servicos.length; posicao++) {
          if (servicos[posicao].cdServico == servico.cdServico) {
            servicos[posicao].nmServico = servico.nmServico;
            servicos[posicao].valor = servico.valor;
          } 
        }
        localStorage.setItem('DadosServico', JSON.stringify(servicos));
        $("#areaFormulario").hide();

        $("#areaTabela").show();
        $("#msnSucessoEdit").show();  

        preencherTabela(servicos);

        setTimeout(function(){ 
          $("#msnSucessoEdit").hide();  
        }, 3000);     
        //$(location).attr('href', 'CadastroServicos.php');        
      }
    }     

  } 
    
  function preencherTabela(dados){
    $("#tabelaServico tbody tr").remove();

    for(var posicao = 0; posicao < dados.length; posicao++){

      var novaLinha = "<tr>" +
              "<td>"+dados[posicao].cdServico+"</td>" +  
              "<td>"+dados[posicao].nmServico+"</td>" + 
              "<td>"+dados[posicao].valor+"</td>" + 
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Excluir Serviço' onclick='exibirModalExcluir("+dados[posicao].cdServico+")'> <img src='imagens/servicoApagar.png'> </td>" +
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Editar Serviço' onclick='editarDado("+dados[posicao].cdServico+")'> <img src='imagens/servicoEditar.png'> </td>" + 
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Visualizar Serviço' onclick='visualizarDado("+dados[posicao].cdServico+")'><img src='imagens/servicoVisualizar.png'> </button></td>" + 
              "</tr>";
      $("#tabelaServico").append(novaLinha);
    }
  } 
  
  function editarDado(codigo){
    
    $situacao = "editar";
    var servicos = JSON.parse(localStorage.getItem('DadosServico'));
    for (var posicao=0; posicao < servicos.length; posicao++) {
      if (servicos[posicao].cdServico == codigo) {
        
        $('#cdServico').val(servicos[posicao].cdServico);
        $('#nmServico').val(servicos[posicao].nmServico);
        $('#valor').val(servicos[posicao].valor);        
        
      } 
    } 
    //$("#cdServico").prop("readonly", true );
    $("#areaTabela").hide();
    $("#areaFormulario").show();
    $("#tituloEdit").show();
  } 
  
  function exibirModalExcluir(codigo){
    var servicos = JSON.parse(localStorage.getItem('DadosServico'));
    for (var posicao=0; posicao < servicos.length; posicao++) {
      if (servicos[posicao].cdServico == codigo) {
        
        $("#nmServico2").val(servicos[posicao].nmServico )

        $("#botaoExcluirModal").click(function () {
            excluirDado(codigo);
        });
    
      } 
    }     

      $("#confirm-delete").modal();   
  }

  function excluirDado(codigo){

    var servicos = JSON.parse(localStorage.getItem('DadosServico'));

    for (var posicao=0; posicao < servicos.length; posicao++) {
      if (servicos[posicao].cdServico == codigo) {
        servicos.splice(posicao, 1); 
      } 
    }   

    localStorage.setItem('DadosServico', JSON.stringify(servicos));   

    $("#msnSucesso").show();  
    $('#confirm-delete').modal('hide');

    preencherTabela(servicos);

    setTimeout(function(){ 
      $("#msnSucesso").hide();  
    }, 3000);

  } 

  function visualizarDado(codigo){
    $("#salvar").hide();
    $("#cancelar").html("Voltar");
    $("#cancelar").css("backgroundColor", "black");
    $("#cancelar").css("border", "1px solid black");
    $("#cancelar").css("marginRight", "25.5%");
    var servicos = JSON.parse(localStorage.getItem('DadosServico'));
    for (var posicao=0; posicao < servicos.length; posicao++) {
      if (servicos[posicao].cdServico == codigo) {
        
        $('#cdServico').val(servicos[posicao].cdServico).prop("readonly", true );
        $('#nmServico').val(servicos[posicao].nmServico).prop("readonly", true ); 
        $('#valor').val(servicos[posicao].valor).prop("readonly", true );        
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
    var servicos = JSON.parse(localStorage.getItem('DadosServico'));
    var $nome = $("#nmServico1").val();
    var filtrados = new Array();
    var filtrado;

    for (var i = 0; i < servicos.length; i++) {
      if(servicos[i].nmServico === $nome ) {
        console.log("estou aqui");
        filtrado = new Object();
        filtrado.cdServico = servicos[i].cdServico;
        filtrado.nmServico = servicos[i].nmServico;
        filtrado.valor = servicos[i].valor;
        filtrados.push(filtrado);
      }
    }
    $('#confirm-filtro').modal('hide');
    $("#limpar").show();
    preencherTabela(filtrados);
  }
 
  function preencherServicos(){
    
    var servicos = JSON.parse(localStorage.getItem('DadosServico'));

    var servico = new Object();
    servico.cdServico = 1;
    servico.nmServico = "Maquiagem";
    servico.valor = "100.00";

    servicos.push(servico);

    servico = new Object();
    servico.cdServico = 2;
    servico.nmServico = "Manicure e Pedicure";
    servico.valor = "40.00";

    servicos.push(servico);

    servico = new Object();
    servico.cdServico = 3;
    servico.nmServico = "Corte de cabelo";
    servico.valor = "30.00";

    servicos.push(servico);

    servico = new Object();
    servico.cdServico = 4;
    servico.nmServico = "Depilação";
    servico.valor = "80.00";

    servicos.push(servico);

    servico = new Object();
    servico.cdServico = 5;
    servico.nmServico = "Sobrancelha";
    servico.valor = "20.00";

    servicos.push(servico);

    servico = new Object();
    servico.cdServico = 6;
    servico.nmServico = "Descoloração do pelo";
    servico.valor = "40.00";

    servicos.push(servico);

    localStorage.setItem('DadosServico', JSON.stringify(servicos)); 

  }

  /*function filtrarDado(){
    $situacao = "filtrar";
    var servicos = JSON.parse(localStorage.getItem('DadosServico'));
    var nome = $("#nmCliente1").val();
    var cpf = $("#cpf1").val();
    var email = $("#email1").val();
    var filtrados = new Array();
    for (var i = 0; i < servicos.length; i++) {
      if(servicos[i].nmServico.indexOf(nome) > 0){
        filtrados[i]=servicos[i];
      }
    }
    preencherTabela(filtrados);
  }*/




