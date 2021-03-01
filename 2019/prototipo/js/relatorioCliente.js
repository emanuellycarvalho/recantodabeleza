if(!localStorage.DadosRelatorioCliente){
  var relatorioClientes = new Array();
  localStorage.setItem('DadosRelatorioCliente', JSON.stringify(relatorioClientes));
  preencherRelatorioClientes();
}

$(document).ready(function(){
    preencherSelectCliente();
    $("#cliente").select2();

    /*$(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })*/
});

function preencherSelectCliente(){
  var clientes = JSON.parse(localStorage.getItem('DadosCliente'));

  $("#cliente option").remove();
  var novoOption = "<option value='0' > </option>";             
    
  $("#cliente").append(novoOption);
  
  for(var posicao = 0; posicao < clientes.length; posicao++){
    
      novoOption = "<option  value="+clientes[posicao].cdCliente+">"+clientes[posicao].nmCliente+"-"+clientes[posicao].telefone+"</option>";             
    
    $("#cliente").append(novoOption);
  }
}

function exibirRelatorio(){
  $cdCliente = $("#cliente").val();

  if ($cdCliente > 0 && $cdCliente < 6) {
    preencherTabela("Ana");
  }else{
    $("#tabelaRelatorio tbody tr").remove();
    $("#tabelaRelatorio").html("Não há registros desse cliente!");
    $("#tabelaRelatorio").css("textAlign", "center");
    $("#tabelaRelatorio").css("fontWeight", "bold");
    $("#tabelaRelatorio").css("fontSize", "18px");
  }
}

function preencherTabela(cliente){
  $("#tabelaRelatorio tbody tr").remove();
  $("#tabelaRelatorio").html("");
  $("#tabelaRelatorio").css("textAlign", "left");
  $("#tabelaRelatorio").css("fontWeight", "normal");
  $("#tabelaRelatorio").css("fontSize", "14px");

  var relatorioClientes = JSON.parse(localStorage.getItem('DadosRelatorioCliente'));

  for (var i = 0; i < relatorioClientes.length; i++) {
      if(cliente == relatorioClientes[i].cliente){
          var $dataInicio = $("#dtInicio").val();
          var $dataFinal = $("#dtFinal").val();
          if(($dataInicio < relatorioClientes[i].dataAtendimento || $dataInicio == relatorioClientes[i].dataAtendimento) && 
             ($dataFinal > relatorioClientes[i].dataAtendimento || $dataFinal == relatorioClientes[i].dataAtendimento)){

              dataAtendimentoNovo = relatorioClientes[i].dataAtendimento.split('-').reverse().join('/');
              var novaLinha = "<tr>" +
                "<td>"+dataAtendimentoNovo+"</td>" +   
                "<td>"+relatorioClientes[i].servico+"</td>" + 
                "<td><button type='button' class='btn'data-toggle='tooltip' data-placement='right' title='Visualizar Detalhes' onclick='visualizarModalDetalhes("+relatorioClientes[i].codigo+")'><img src='imagens/olho.png'></button></td>" + 
                "</tr>";
              $("#tabelaRelatorio").append(novaLinha);
          }else{
            if($dataInicio > relatorioClientes[i].dataAtendimento ){
              $("#tabelaRelatorio").html("Não há registros para esse intervalo de datas!");
              $("#tabelaRelatorio").css("textAlign", "center");
              $("#tabelaRelatorio").css("fontWeight", "bold");
              $("#tabelaRelatorio").css("fontSize", "18px");
            }
          }
      }
  }
}

function visualizarModalDetalhes(cod){
  //console.log(servico);
  $("#addDetalhesModal").modal();

  var tabelaServicos = JSON.parse(localStorage.getItem("DadosTabelaServico"));
  var relatorioClientes = JSON.parse(localStorage.getItem("DadosRelatorioCliente"));
  var $servico;

  for (var i = 0; i < relatorioClientes.length; i++) {
    if (relatorioClientes[i].codigo == cod) {
      $servico = relatorioClientes[i].servico;
    }
  }

  for (var i = 0; i < tabelaServicos.length; i++) {
    if (tabelaServicos[i].servico === $servico) {
      $("#detalhes").text(tabelaServicos[i].detalhes); 
    }
  }

  $("#cadDetalhe").click(function () {
    $("#addDetalhesModal").modal("hide");
  });
}

function preencherRelatorioClientes(){
    var relatorioClientes = JSON.parse(localStorage.getItem('DadosRelatorioCliente'));

    var relatorioCliente = new Object();
    relatorioCliente.codigo = 1;
    relatorioCliente.cliente = "Ana";
    relatorioCliente.dataAtendimento = "2019-05-02";
    relatorioCliente.servico = "Corte de cabelo";

    relatorioClientes.push(relatorioCliente);

    relatorioCliente = new Object();
    relatorioCliente.codigo = 2;
    relatorioCliente.cliente = "Ana";
    relatorioCliente.dataAtendimento = "2019-05-09";
    relatorioCliente.servico = "Maquiagem";

    relatorioClientes.push(relatorioCliente);

    relatorioCliente = new Object();
    relatorioCliente.codigo = 3;
    relatorioCliente.cliente = "Ana";
    relatorioCliente.dataAtendimento = "2019-05-09";
    relatorioCliente.servico = "Manicure e pedicure";

    relatorioClientes.push(relatorioCliente);

    localStorage.setItem('DadosRelatorioCliente', JSON.stringify(relatorioClientes));
}