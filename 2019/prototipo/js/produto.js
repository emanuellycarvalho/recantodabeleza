var $situacao = "";

if(!localStorage.DadosProduto){
  var produtos = new Array();
  localStorage.setItem('DadosProduto', JSON.stringify(produtos));
  preencherProdutos();
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

  var produtos = JSON.parse(localStorage.getItem('DadosProduto'));
  preencherTabela(produtos);

  $('#tabelaProduto').DataTable(
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

$("#formularioProduto").validate({
 rules:{
   nmProduto:{
     required:true,
     minlength: 3,
   },               
 }, 
 messages:{      
   nmProduto:{
     required:"Campo obrigatório",
     minlength: "O nome deve conter no mínimo 3 caracteres."
   }
 },
 submitHandler: SalvarProduto
});

function SalvarProduto(){
    var produtos = JSON.parse(localStorage.getItem('DadosProduto'));

    var produto = new Object(); 

    produto.cdProduto = parseInt($('#cdProduto').val());
    produto.nmProduto = $('#nmProduto').val();
  
    $('#formularioProduto').each (function(){
      this.reset();
    });
    
    if($situacao == "novo"){
      var teste = false

      var codigo;
      for (var i=0; i<produtos.length; i++){
        $codigo = produtos[i].cdProduto;
      }

      produto.cdProduto = (++$codigo);
      
      for (var posicao=0; posicao < produtos.length; posicao++) {
        if (produtos[posicao].cdProduto == produto.cdProduto) {
          teste = true
        } 
      } 
      
      if(teste == true){
        alert("Favor informar outro código.");
      }else{
       
        produtos.push(produto);
        localStorage.setItem('DadosProduto', JSON.stringify(produtos)); 

        $("#areaFormulario").hide();

        $("#areaTabela").show();
        $("#msnSucessoCad").show(); 

        preencherTabela(produtos);

        setTimeout(function(){ 
          $("#msnSucessoCad").hide(); 
        }, 3000);     
        //$(location).attr('href', 'CadastroCidade.php');      
      }
    }else{
      if($situacao == "editar"){        
        for (var posicao=0; posicao < produtos.length; posicao++) {
          if (produtos[posicao].cdProduto == produto.cdProduto) {
            produtos[posicao].nmProduto = produto.nmProduto;
          } 
        }
        localStorage.setItem('DadosProduto', JSON.stringify(produtos));
        $("#areaFormulario").hide();

        $("#areaTabela").show();
        $("#msnSucessoEdit").show();  

        preencherTabela(produtos);

        setTimeout(function(){ 
          $("#msnSucessoEdit").hide();  
        }, 3000);     
        //$(location).attr('href', 'CadastroCidade.php');        
      }
    }     

  } 
    
  function preencherTabela(dados){
    $("#tabelaProduto tbody tr").remove();

    for(var posicao = 0; posicao < dados.length; posicao++){

      var novaLinha = "<tr>" +
              "<td>"+dados[posicao].cdProduto+"</td>" +  
              "<td>"+dados[posicao].nmProduto+"</td>" + 
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Excluir Produto' onclick='exibirModalExcluir("+dados[posicao].cdProduto+")'> <img src='imagens/produtoApagar.png'> </td>" +
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Editar Produto' onclick='editarDado("+dados[posicao].cdProduto+")'> <img src='imagens/produtoEditar.png'> </td>" + 
              "<td><button type='button' class='btn crud' data-toggle='tooltip' data-placement='right' title='Visualizar Produto' onclick='visualizarDado("+dados[posicao].cdProduto+")'> <img src='imagens/produtoVisualizar.png'> </button></td>" + 
              "</tr>";
      $("#tabelaProduto").append(novaLinha);
    }
  } 
  
  function editarDado(codigo){
    
    $situacao = "editar";
    var produtos = JSON.parse(localStorage.getItem('DadosProduto'));
    for (var posicao=0; posicao < produtos.length; posicao++) {
      if (produtos[posicao].cdProduto == codigo) {
        
        $('#cdProduto').val(produtos[posicao].cdProduto);
        $('#nmProduto').val(produtos[posicao].nmProduto);        
        
      } 
    } 
    //$("#cdProduto").prop("readonly", true );
    $("#areaTabela").hide();
    $("#areaFormulario").show();
    $("#tituloEdit").show();
  } 
  
  function exibirModalExcluir(codigo){
    var produtos = JSON.parse(localStorage.getItem('DadosProduto'));
    for (var posicao=0; posicao < produtos.length; posicao++) {
      if (produtos[posicao].cdProduto == codigo) {
        
        $("#nmProduto2").val(produtos[posicao].nmProduto )

        $("#botaoExcluirModal").click(function () {
            excluirDado(codigo);
        });
    
      } 
    }     

      $("#confirm-delete").modal();   
  }

  function excluirDado(codigo){

    var produtos = JSON.parse(localStorage.getItem('DadosProduto'));

    for (var posicao=0; posicao < produtos.length; posicao++) {
      if (produtos[posicao].cdProduto == codigo) {
        produtos.splice(posicao, 1); 
      } 
    }   

    localStorage.setItem('DadosProduto', JSON.stringify(produtos));   

    $("#msnSucesso").show();  
    $('#confirm-delete').modal('hide');

    preencherTabela(produtos);

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
    var produtos = JSON.parse(localStorage.getItem('DadosProduto'));
    for (var posicao=0; posicao < produtos.length; posicao++) {
      if (produtos[posicao].cdProduto == codigo) {
        
        $('#cdProduto').val(produtos[posicao].cdProduto).prop("readonly", true );
        $('#nmProduto').val(produtos[posicao].nmProduto).prop("readonly", true );        
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
    var produtos = JSON.parse(localStorage.getItem('DadosProduto'));
    var $nome = $("#nmProduto1").val();
    var filtrados = new Array();
    var filtrado;

    for (var i = 0; i < produtos.length; i++) {
      if(produtos[i].nmProduto === $nome ) {
        console.log("estou aqui");
        filtrado = new Object();
        filtrado.nmProduto = produtos[i].nmProduto;
        filtrados.push(filtrado);
      }
    }
    $('#confirm-filtro').modal('hide');
    $("#limpar").show();
    preencherTabela(filtrados);
  }

 
  function preencherProdutos(){
    
    var produtos = JSON.parse(localStorage.getItem('DadosProduto'));

    var produto = new Object();

    produto.cdProduto = 1;
    produto.nmProduto = "Shampoo Seda";

    produtos.push(produto);

    produto = new Object();
    produto.cdProduto = 2;
    produto.nmProduto = "Condicionador Seda";

    produtos.push(produto);

    produto = new Object();
    produto.cdProduto = 3;
    produto.nmProduto = "Creme Hidratante Seda";

    produtos.push(produto);

    produto = new Object();
    produto.cdProduto = 4;
    produto.nmProduto = "Esmates Avon";

    produtos.push(produto);

    produto = new Object();
    produto.cdProduto = 5;
    produto.nmProduto = "Gel de cabelo Elseve";

    produtos.push(produto);

    produto = new Object();
    produto.cdProduto = 6;
    produto.nmProduto = "Creme pós-barba";

    produtos.push(produto);

    localStorage.setItem('DadosProduto', JSON.stringify(produtos)); 

  }

  /*function filtrarDado(){
    $situacao = "filtrar";
    var produtos = JSON.parse(localStorage.getItem('DadosProduto'));
    var nome = $("#nmCliente1").val();
    var cpf = $("#cpf1").val();
    var email = $("#email1").val();
    var filtrados = new Array();
    for (var i = 0; i < produtos.length; i++) {
      if(produtos[i].nmProduto.indexOf(nome) > 0){
        filtrados[i]=produtos[i];
      }
    }
    preencherTabela(filtrados);
  }*/




