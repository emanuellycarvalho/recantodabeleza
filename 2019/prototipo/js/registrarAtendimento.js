if(!localStorage.DadosTabelaServico){
  var tabelaServicos = new Array();
  localStorage.setItem('DadosTabelaServico', JSON.stringify(tabelaServicos));
  preencherServico();
}

if(!localStorage.DadosTabelaProduto){
  var tabelaProdutos = new Array();
  localStorage.setItem('DadosTabelaProduto', JSON.stringify(tabelaProdutos));
  preencherProduto();
  calcularTotal();
}

$(document).ready(function(){
    $("#areaFormulario").hide();
    $("#areaRegistro").show();

    preencherSelectCliente();
    preencherSelectServico();
    preencherSelectProduto();
    preencherSelectCidade(0);
    $("#cliente").select2();
    $("#profissional").select2();
    $("#servico").select2();
    $("#produto").select2();
    $("#cdCidade").select2();

    var tabelaServicos = JSON.parse(localStorage.getItem('DadosTabelaServico'));
    preencherTabelaServico(tabelaServicos);

    var tabelaProdutos = JSON.parse(localStorage.getItem('DadosTabelaProduto'));
    preencherTabelaProduto(tabelaProdutos);
    preencherSelectProfissional1();

    /*$(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })*/

});

$(function(){
    $('#servico').change(function(){
        if( $(this).val() ) {
            $('#profissional').hide();
            var $codServico = $('#servico').val();
            if ($codServico > 0 && $codServico < 4) {
                preencherSelectProfissional1();
            }else{
                preencherSelectProfissional2();
            }
        } 
    });
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

function preencherSelectProfissional1(){
    var profissionais = JSON.parse(localStorage.getItem('DadosProfissional')); 

    $("#profissional option").remove();            
      
    
    for(var posicao = 0; posicao < 3; posicao++){
      
        var novoOption = "<option  value="+profissionais[posicao].cdProfissional+">"+profissionais[posicao].nmProfissional+"</option>";             
      
      $("#profissional").append(novoOption);
    }
}

function preencherSelectProfissional2(){
    var profissionais = JSON.parse(localStorage.getItem('DadosProfissional'));

    $("#profissional option").remove();
    
    for(var posicao = 3; posicao < 6; posicao++){
      
        var novoOption = "<option  value="+profissionais[posicao].cdProfissional+">"+profissionais[posicao].nmProfissional+"</option>";             
      
      $("#profissional").append(novoOption);
    }
}

function preencherSelectServico(){
    var servicos = JSON.parse(localStorage.getItem('DadosServico'));

    $("#servico option").remove();
    
    for(var posicao = 0; posicao < servicos.length; posicao++){
      
        var novoOption = "<option  value="+servicos[posicao].cdServico+">"+servicos[posicao].nmServico+"</option>";             
      
      $("#servico").append(novoOption);
    }
}

function preencherSelectProduto(){
    var produtos = JSON.parse(localStorage.getItem('DadosProduto'));

    $("#produto option").remove();
    
    for(var posicao = 0; posicao < produtos.length; posicao++){
      
        var novoOption = "<option  value="+produtos[posicao].cdProduto+">"+produtos[posicao].nmProduto+"</option>";             
      
      $("#produto").append(novoOption);
    }
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

function preencherTabelaServico(serv){
    $("#servicos tbody tr").remove();

    for (var i = 0; i < serv.length; i++) {
        var novaLinha = "<tr>" +
        "<td>"+serv[i].servico+"</td>" +  
        "<td>"+serv[i].valor+"</td>" +
        "<td>"+serv[i].profissional+"</td>" + 
        "<td><button type='button' data-toggle='tooltip' data-placement='right' title='Remover da Tabela' onclick='exibirModalExcluirServico("+serv[i].codigo+")'><img src='imagens/tabelaRemover.png'></button></td>" +
        "</tr>";
    $("#servicos").append(novaLinha);
    }

    calcularTotal();
}

function preencherTabelaProduto(prod){
    $("#produtos tbody tr").remove();

    for (var i = 0; i < prod.length; i++) {
        var novaLinha = "<tr>" +
        "<td>"+prod[i].produto+"</td>" +  
        "<td>"+prod[i].valorUnitario+"</td>" +
        "<td id='quant'>"+prod[i].quantidade+"</td>" + 
        "<td>"+prod[i].subTotal+"</td>" + 
        "<td><button type='button' data-toggle='tooltip' data-placement='right' title='Remover da Tabela' onclick='exibirModalExcluirProduto("+prod[i].codigo+")'><img src='imagens/tabelaRemover.png'></button></td>" +
        "</tr>";
    $("#produtos").append(novaLinha);
    }

    calcularTotal();
}

function salvarServico(){
    var tabelaServico = new Object();

    var $cdServ = $("#servico").val();
    var $cdProf = $("#profissional").val();

    var servicos = JSON.parse(localStorage.getItem('DadosServico'));
    for (var i = 0; i < servicos.length; i++) {
        if(servicos[i].cdServico == $cdServ){
            tabelaServico.servico = servicos[i].nmServico;
        }
    }

    var profissionais = JSON.parse(localStorage.getItem('DadosProfissional'));
    for (var i = 0; i < profissionais.length; i++) {
        if(profissionais[i].cdProfissional == $cdProf){
            tabelaServico.profissional = profissionais[i].nmProfissional;
        }
    }

    var $val = $("#valor").val();
    $val = $val.replace(/,/gi, ".");
    tabelaServico.valor = $val;

    tabelaServico.detalhes = $("#detalhes").val();

    var tabelaServicos = JSON.parse(localStorage.getItem('DadosTabelaServico'));
    var $cod;

    for (var i = 0; i < tabelaServicos.length; i++) {
        $cod = tabelaServicos[i].codigo;
    }
    tabelaServico.codigo = ($cod + 1);

    tabelaServicos.push(tabelaServico);
    localStorage.setItem('DadosTabelaServico', JSON.stringify(tabelaServicos));
    //$("#servico").val("");
    $("#valor").val("");
    //$("#profissional").val("");
    $("#detalhes").text("");

    preencherTabelaServico(tabelaServicos);
}

function salvarProduto(){
    var tabelaProduto = new Object();

    var $cdProduto = $("#produto").val();

    var produtos = JSON.parse(localStorage.getItem('DadosProduto'));
    for (var i = 0; i < produtos.length; i++) {
        if(produtos[i].cdProduto == $cdProduto){
            tabelaProduto.produto = produtos[i].nmProduto;
        }
    }

    var $val = $("#valorUnitario").val();
    $val = $val.replace(/,/gi, ".");

    tabelaProduto.valorUnitario = $val;
    tabelaProduto.quantidade = $("#qtd").val();
    tabelaProduto.subTotal = (tabelaProduto.valorUnitario * tabelaProduto.quantidade).toFixed(2);

    var tabelaProdutos = JSON.parse(localStorage.getItem('DadosTabelaProduto'));
    var $cod;

    for (var i = 0; i < tabelaProdutos.length; i++) {
        $cod = tabelaProdutos[i].codigo;
    }
    tabelaProdutos.codigo = ($cod + 1);
    tabelaProdutos.push(tabelaProduto);
    localStorage.setItem('DadosTabelaProduto', JSON.stringify(tabelaProdutos));

    preencherTabelaProduto(tabelaProdutos);
}


function preencherServico(){
    var tabelaServicos = JSON.parse(localStorage.getItem('DadosTabelaServico'));

    var tabelaServico = new Object(); 
    tabelaServico.codigo = 1;
    tabelaServico.servico = "Maquiagem";
    tabelaServico.valor = 100.00;
    tabelaServico.profissional = "Marília";
    tabelaServico.detalhes = "Olhos esfumaçados pretos, delineador gatinho, batom vermelho Avon";
   
    tabelaServicos.push(tabelaServico);

    tabelaServico = new Object();
    tabelaServico.codigo = 2;    
    tabelaServico.servico = "Corte de cabelo";
    tabelaServico.valor = 20.00;
    tabelaServico.profissional = "Ricardo";
    tabelaServico.detalhes = "Chanel normal";
   
    tabelaServicos.push(tabelaServico);

    tabelaServico = new Object();
    tabelaServico.codigo = 3;    
    tabelaServico.servico = "Depilação";
    tabelaServico.valor = 80.00;
    tabelaServico.profissional = "Joana";
    tabelaServico.detalhes = "Pernas e braços";
   
    tabelaServicos.push(tabelaServico);


    localStorage.setItem('DadosTabelaServico', JSON.stringify(tabelaServicos));

}

function preencherProduto(){
    var tabelaProdutos = JSON.parse(localStorage.getItem('DadosTabelaProduto'));

    var tabelaProduto = new Object();  
    tabelaProduto.codigo = 1;  
    tabelaProduto.produto = "Shampoo Seda";
    tabelaProduto.valorUnitario = 30.00;
    tabelaProduto.quantidade = 1;
    tabelaProduto.subTotal = 30.00;
   
    tabelaProdutos.push(tabelaProduto);

    tabelaProduto = new Object(); 
    tabelaProduto.codigo = 2;    
    tabelaProduto.produto = "Condicionador Seda";
    tabelaProduto.valorUnitario = 28.00;
    tabelaProduto.quantidade = 1;
    tabelaProduto.subTotal = 28.00;
   
    tabelaProdutos.push(tabelaProduto);

    tabelaProduto = new Object();
    tabelaProduto.codigo = 3;     
    tabelaProduto.produto = "Esmaltes Avon";
    tabelaProduto.valorUnitario = 5.00;
    tabelaProduto.quantidade = 5;
    tabelaProduto.subTotal = 25.00;
   
    tabelaProdutos.push(tabelaProduto);


    localStorage.setItem('DadosTabelaProduto', JSON.stringify(tabelaProdutos));

}

function exibirModalExcluirServico(codigo){
    var tabelaServicos = JSON.parse(localStorage.getItem('DadosTabelaServico'));
    for (var posicao=0; posicao < tabelaServicos.length; posicao++) {
      if (tabelaServicos[posicao].codigo == codigo) {
        
        $("#serv").val(tabelaServicos[posicao].servico )

         $("#botaoExcluirModal").click(function () {
            removeLinhaTabelaServico(codigo);
        });
    
      } 
    }     

      $("#confirm-delete-servico").modal();   
  }

function removeLinhaTabelaServico(codigo){
    var tabelaServicos = JSON.parse(localStorage.getItem('DadosTabelaServico'));

    for (var posicao=0; posicao < tabelaServicos.length; posicao++) {
      if (tabelaServicos[posicao].codigo == codigo) {
        tabelaServicos.splice(posicao, 1); 
      } 
    }   

    localStorage.setItem('DadosTabelaServico', JSON.stringify(tabelaServicos));
    $("#confirm-delete-servico").modal("hide");    
    preencherTabelaServico(tabelaServicos);
}

function exibirModalExcluirProduto(codigo){
    var tabelaProdutos = JSON.parse(localStorage.getItem('DadosTabelaProduto'));
    for (var posicao=0; posicao < tabelaProdutos.length; posicao++) {
      if (tabelaProdutos[posicao].codigo == codigo) {
        
        $("#prod").val(tabelaProdutos[posicao].produto )

         $("#botaoExcluirModal2").click(function () {
            removeLinhaTabelaProduto(codigo);
        });
    
      } 
    }     

      $("#confirm-delete-produto").modal();   
  }

function removeLinhaTabelaProduto(codigo){
    var tabelaProdutos = JSON.parse(localStorage.getItem('DadosTabelaProduto'));

    for (var posicao=0; posicao < tabelaProdutos.length; posicao++) {
      if (tabelaProdutos[posicao].codigo == codigo) {
        tabelaProdutos.splice(posicao, 1); 
      } 
    }   

    localStorage.setItem('DadosTabelaProduto', JSON.stringify(tabelaProdutos)); 
    $("#confirm-delete-produto").modal("hide");  
    preencherTabelaProduto(tabelaProdutos);
}

function exibirModalDetalhes(){
    $("#addDetalhesModal").modal();
}

function addDetalhe(){
    var $det = $("#detalhes").val();
    $("#addDetalhesModal").modal("hide")
}

function calcularTotal(){
    var tabelaServicos = JSON.parse(localStorage.getItem('DadosTabelaServico'));
    var tabelaProdutos = JSON.parse(localStorage.getItem('DadosTabelaProduto'));
    var $totalServico = 0.00;
    var $totalProduto = 0.00;
    var $totalGeral = 0.00;

    for (var i = 0; i < tabelaServicos.length; i++) {
        parseFloat($totalServico = parseFloat($totalServico + parseFloat(tabelaServicos[i].valor)));
    }


    for (var j = 0; j < tabelaProdutos.length; j++) {
        parseFloat($totalProduto = parseFloat($totalProduto + parseFloat(tabelaProdutos[j].subTotal)));
    }

    $totalGeral = parseFloat($totalServico + $totalProduto);

    $("#totalServico").html("Total dos servicos: R$" +$totalServico);
    $("#totalProduto").html("Total dos produtos: R$" +$totalProduto);
    $("#totalGeral").html("Total geral: R$" +$totalGeral);
}

function exibirCadastrarCliente(){
    $("#areaRegistro").hide();
    $("#areaFormulario").show();
    
}




