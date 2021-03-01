if(!localStorage.DadosPagemento){
  var pagamentos = new Array();
  localStorage.setItem('DadosPagamento', JSON.stringify(pagamentos));
  preencherPagamentos();
}

$(document).ready(function(){
    $("#mensagem").hide();

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
      
        var novoOption = "<option  value="+clientes[posicao].cdCliente+">"+clientes[posicao].nmCliente+"-"+clientes[posicao].telefone+"</option>";             
      
      $("#cliente").append(novoOption);
    }
}

function exibirRegistro(){
    var $cdCliente = $("#cliente").val();

    preencherTabela("Ana");
}

function preencherTabela(cliente){
    $("#tabelaPagamento tbody tr").remove();
    var pagamentos = JSON.parse(localStorage.getItem('DadosPagamento'));
    for (var i = 0; i < pagamentos.length; i++) {
        if(cliente == pagamentos[i].cliente){

            dataAtendimentoNovo = pagamentos[i].dataAtendimento.split('-').reverse().join('/');
            var novaLinha = "<tr>" +
                "<td>"+dataAtendimentoNovo+"</td>" +  
                "<td>"+pagamentos[i].valor+"</td>" + 
                "<td><button type='button' id='visu' class='btn' data-toggle='tooltip' data-placement='right' title='Visualizar Detalhes' onclick='visualizarDetalhes()'><img src='imagens/olho.png'></button></td>" + 
                "<td><div class='form-check'>" +
                "<input class='form-check-input' type='checkbox' value='' id='pago'>" +
                "<label class='form-check-label' for='pago'></label></div></td>" +
              "</tr>";

            $("#tabelaPagamento").append(novaLinha);
        }
    }
}

function registrarPagamento(){
    $("#mensagem").show(); 

    setTimeout(function(){ 
      $("#mensagem").hide();  
    }, 3000);

    setTimeout(function(){ 
        $(location).attr('href', 'HomeFuncionario.php');  
    }, 3100);


}

function preencherPagamentos(){
    var pagamentos = JSON.parse(localStorage.getItem('DadosPagamento'));

    var pagamento = new Object();
    pagamento.codigo = 1;
    pagamento.cliente = "Ana";
    pagamento.dataAtendimento = "2019-05-02";
    pagamento.valor = "150.00";
    pagamento.pago = "";

    pagamentos.push(pagamento);

    pagamento = new Object();
    pagamento.codigo = 2;
    pagamento.cliente = "Ana";
    pagamento.dataAtendimento = "2019-05-17";
    pagamento.valor = "30.00";
    pagamento.pago = "";

    pagamentos.push(pagamento);

    pagamento = new Object();
    pagamento.codigo = 3;
    pagamento.cliente = "Ana";
    pagamento.dataAtendimento = "2019-05-29";
    pagamento.valor = "100.00";
    pagamento.pago = "";

    pagamentos.push(pagamento);

    localStorage.setItem('DadosPagamento', JSON.stringify(pagamentos));

}

function visualizarDetalhes(){
    $("#addDetalhesModal").modal();

    $("#detalhes").text("Descrição do Serviço"); 

}