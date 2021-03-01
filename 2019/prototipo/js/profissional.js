var $situacao = "";

if(!localStorage.DadosProfissional){
  var profissionais = new Array();
  localStorage.setItem('DadosProfissional', JSON.stringify(profissionais));
  preencherProfissionais();
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

  $("#areaTabela").show();    
  $("#areaFormulario").hide();
  $("#limpar").hide();
  
  var profissionais = JSON.parse(localStorage.getItem('DadosProfissional'));
  preencherTabela(profissionais);

  $('#tabelaProfissional').DataTable(
  {
    "order": [[ 0, "asc" ]],
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

$("#formularioProfissional").validate({
 rules:{
   nmProfissional:{
     required:true,
     minlength: 3,
   },               
 }, 
 messages:{       
   nmProfissional:{
     required:"Campo obrigatório",
     minlength: "O nome deve conter no mínimo 3 caracteres."
   }
 },
 submitHandler: SalvarProfissional
});

function SalvarProfissional(){
    var profissionais = JSON.parse(localStorage.getItem('DadosProfissional'));

    var profissional = new Object();

    profissional.cdProfissional = parseInt($('#cdProfissional').val());
    profissional.nmProfissional = $('#nmProfissional').val();
  
    $('#formularioProfissional').each (function(){
      this.reset();
    });
         
    
    if($situacao == "novo"){
      var teste = false

      var $codigo;   

      for (var i=0; i<profissionais.length; i++){
        $codigo = profissionais[i].cdProfissional;
      }

      profissional.cdProfissional = $codigo;
      
      for (var posicao=0; posicao < profissionais.length; posicao++) {
        if (profissionais[posicao].cdProfissional == profissional.cdProfissional) {
          teste = true
        } 
      } 
      
      if(teste == true){
        alert("Favor informar outro código.");
      }else{
        profissionais.push(profissional);
        localStorage.setItem('DadosProfissional', JSON.stringify(profissionais)); 

        $("#formularioProfissional").hide();

        $("#areaTabela").show();
        $("#msnSucessoCad").show(); 

        preencherTabela(profissionais);

        setTimeout(function(){ 
          $("#msnSucessoCad").hide(); 
        }, 3000);     
        //$(location).attr('href', 'CadastroCidade.php');      
      }
    }else{
      if($situacao == "editar"){        
        for (var posicao=0; posicao < profissionais.length; posicao++) {
          if (profissionais[posicao].cdProfissional == profissional.cdProfissional) {
            profissionais[posicao].nmProfissional = profissional.nmProfissional;
          } 
        }
        localStorage.setItem('DadosProfissional', JSON.stringify(profissionais));
        $("#formularioProfissional").hide();

        $("#areaTabela").show();
        $("#msnSucessoEdit").show();  

        preencherTabela(profissionais);

        setTimeout(function(){ 
          $("#msnSucessoEdit").hide();  
        }, 3000);     
        //$(location).attr('href', 'CadastroCidade.php');        
      }
    }     

  } 
    
  function preencherTabela(dados){
    $("#tabelaProfissional tbody tr").remove();

    for(var posicao = 0; posicao < dados.length; posicao++){

      var novaLinha = "<tr>" +
              "<td>"+dados[posicao].cdProfissional+"</td>" +  
              "<td>"+dados[posicao].nmProfissional+"</td>" + 
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Excluir Profissional' onclick='exibirModalExcluir("+dados[posicao].cdProfissional+")'> <img src='imagens/profissionalApagar.png'> </td>" +
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Editar Profissional' onclick='editarDado("+dados[posicao].cdProfissional+")'> <img src='imagens/profissionalEditar.png'> </td>" + 
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Visualizar Profissional' onclick='visualizarDado("+dados[posicao].cdProfissional+")'> <img src='imagens/profissionalVisualizar.png'> </button></td>" + 
              "</tr>";
      $("#tabelaProfissional").append(novaLinha);
    }
  } 
  
  function editarDado(codigo){
    
    $situacao = "editar";
    var profissionais = JSON.parse(localStorage.getItem('DadosProfissional'));
    for (var posicao=0; posicao < profissionais.length; posicao++) {
      if (profissionais[posicao].cdProfissional == codigo) {
        
        $('#cdProfissional').val(profissionais[posicao].cdProfissional);
        $('#nmProfissional').val(profissionais[posicao].nmProfissional);        
        
      } 
    } 
    //$("#cdProfissional").prop("readonly", true );
    $("#areaTabela").hide();
    $("#areaFormulario").show();
    $("#tituloEdit").show();
  } 
  
  function exibirModalExcluir(codigo){
    var profissionais = JSON.parse(localStorage.getItem('DadosProfissional'));
    for (var posicao=0; posicao < profissionais.length; posicao++) {
      if (profissionais[posicao].cdProfissional == codigo) {
        
        $("#nmProf").val(profissionais[posicao].nmProfissional )

        $("#botaoExcluirModal").click(function () {
            excluirDado(codigo);
        });
    
      } 
    }     

      $("#confirm-delete").modal();   
  }

  function excluirDado(codigo){

    var profissionais = JSON.parse(localStorage.getItem('DadosProfissional'));

    for (var posicao=0; posicao < profissionais.length; posicao++) {
      if (profissionais[posicao].cdProfissional == codigo) {
        profissionais.splice(posicao, 1); 
      } 
    }   

    localStorage.setItem('DadosProfissional', JSON.stringify(profissionais));   

    $("#msnSucesso").show();  
    $('#confirm-delete').modal('hide');

    preencherTabela(profissionais);

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
    var profissionais = JSON.parse(localStorage.getItem('DadosProfissional'));
    for (var posicao=0; posicao < profissionais.length; posicao++) {
      if (profissionais[posicao].cdProfissional == codigo) {
        
        $('#cdProfissional').val(profissionais[posicao].cdProfissional).prop("readonly", true );
        $('#nmProfissional').val(profissionais[posicao].nmProfissional).prop("readonly", true );        
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
    var profissionais = JSON.parse(localStorage.getItem('DadosProfissional'));
    var $nome = $("#nmProfissional1").val();
    var filtrados = new Array();
    var filtrado;

    for (var i = 0; i < profissionais.length; i++) {
      if(profissionais[i].nmProfissional === $nome ) {
        console.log("estou aqui");
        filtrado = new Object();
        filtrado.cdProfissional = profissionais[i].cdProfissional;
        filtrado.nmProfissional = profissionais[i].nmProfissional;
        filtrados.push(filtrado);
      }
    }
    $('#confirm-filtro').modal('hide');
    $("#limpar").show();
    preencherTabela(filtrados);
  }

 
  function preencherProfissionais(){
    var profissionais = JSON.parse(localStorage.getItem('DadosProfissional'));

    var profissional = new Object();
    profissional.cdProfissional = 1;
    profissional.nmProfissional = "Joana";

    profissionais.push(profissional);
    
    var profissional = new Object();
    profissional.cdProfissional = 2;
    profissional.nmProfissional = "João Paulo";

    profissionais.push(profissional);

    var profissional = new Object();
    profissional.cdProfissional = 3;
    profissional.nmProfissional = "Maria das Dores";

    profissionais.push(profissional);

    var profissional = new Object();
    profissional.cdProfissional = 4;
    profissional.nmProfissional = "Marília";

    profissionais.push(profissional);

    var profissional = new Object();
    profissional.cdProfissional = 5;
    profissional.nmProfissional = "Pedro";

    profissionais.push(profissional);

    var profissional = new Object();
    profissional.cdProfissional = 6;
    profissional.nmProfissional = "Ricardo";

    profissionais.push(profissional);

    localStorage.setItem('DadosProfissional', JSON.stringify(profissionais)); 
  }

  /*function filtrarDado(){
    $situacao = "filtrar";
    var profissionais = JSON.parse(localStorage.getItem('DadosProfissional'));
    var nome = $("#nmCliente1").val();
    var cpf = $("#cpf1").val();
    var email = $("#email1").val();
    var filtrados = new Array();
    for (var i = 0; i < profissionais.length; i++) {
      if(profissionais[i].nmProfissional.indexOf(nome) > 0){
        filtrados[i]=profissionais[i];
      }
    }
    preencherTabela(filtrados);
  }*/




