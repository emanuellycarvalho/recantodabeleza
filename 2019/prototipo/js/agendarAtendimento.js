/*cloneform = $('#dadosServico').html();
$(document).on('click','.remDiv, .addDiv', function(e){
   thisClass = e.target.className;
   thisClass == 'remDiv' ?
   ($('.'+thisClass).length > 1 ?
   $(this).closest('.row').prev().add($(this).closest('.row')).remove() : 0) :
   $('#dadosServico').append(cloneform);
});*/

if(!localStorage.DadosAgendamento){
  var agendamentos = new Array();
  localStorage.setItem('DadosAgendamento', JSON.stringify(agendamentos));
 
}

$(document).ready(function(){
    $("#areaFormulario").hide();
    $("#areaAgendamento").show();

    preencherSelectCliente();
    preencherSelectCidade(0);

    preencherSelectProfissional(1);
    preencherSelectServico(1);

    $("#cliente").select2();
    $("#cdCidade").select2();
    $("#profissional_1").select2();
    $("#servico_1").select2();

    $("#delAgenda").hide();
    $("#tabelaRemover").hide();

    /*var tabelaServicos = JSON.parse(localStorage.getItem('DadosTabelaServico'));
    preencherTabelaServico(tabelaServicos);

    var tabelaProdutos = JSON.parse(localStorage.getItem('DadosTabelaProduto'));
    preencherTabelaProduto(tabelaProdutos);*/

    preencherAgendamentos();

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

function preencherSelectProfissional(numero){
    var profissionais = JSON.parse(localStorage.getItem('DadosProfissional'));
    
    var idSelect = "#profissional_"+numero

    $(idSelect +" option").remove();
    
    for(var posicao = 0; posicao < profissionais.length; posicao++){
      
        var novoOption = "<option  value="+profissionais[posicao].cdProfissional+">"+profissionais[posicao].nmProfissional+"</option>";             
      
      $(idSelect).append(novoOption);
    }
}

function preencherSelectServico(numero){
    var servicos = JSON.parse(localStorage.getItem('DadosServico'));
    
    var idSelect = "#servico_"+numero

    $(idSelect +" option").remove();
    
    for(var posicao = 0; posicao < servicos.length; posicao++){
      
        var novoOption = "<option  value="+servicos[posicao].cdServico+">"+servicos[posicao].nmServico+"</option>";             
      
      $(idSelect).append(novoOption);
    }
}

function preencherAgendamentos(){

    var agendamentos = JSON.parse(localStorage.getItem('DadosAgendamento'));

    if (agendamentos.length <= 0) {

        var agendamento = new Object();    
        agendamento.dtAgendamento = "2019-07-02";
        agendamento.horaInicial = "10:00";
        agendamento.horaFinal = "11:00";
        agendamento.cliente = "Ana";
        agendamento.atendimentos = [];
        var atendimento = new Object();
        atendimento.servico = "1";
        atendimento.profissional = "2";
        agendamento.atendimentos[0] = atendimento;    
        agendamento.cdAgendamento = 1;
        agendamentos.push(agendamento);


        agendamento = new Object();    
        agendamento.dtAgendamento = "2019-06-29";
        agendamento.horaInicial = "11:00";
        agendamento.horaFinal = "12:00";
        agendamento.cliente = "Joaquim";   
        agendamento.atendimentos = [];
        var atendimento = new Object();
        atendimento.servico = "2";
        atendimento.profissional = "3";
        agendamento.atendimentos[0] = atendimento;
        agendamento.cdAgendamento = 2;
        agendamentos.push(agendamento);



        agendamento = new Object();    
        agendamento.dtAgendamento = "2019-06-28";
        agendamento.horaInicial = "13:00";
        agendamento.horaFinal = "14:00";
        agendamento.cliente = "Marcela";
        agendamento.atendimentos = [];
        var atendimento = new Object();
        atendimento.servico = "3";
        atendimento.profissional = "4";
        agendamento.atendimentos[0] = atendimento;
        agendamento.cdAgendamento = 3;
        agendamentos.push(agendamento);

        localStorage.setItem('DadosAgendamento', JSON.stringify(agendamentos));

    }
}

function exibirCadastrarCliente(){
    $("#areaAgendamento").hide();
    $("#areaFormulario").show();

}


function inserirDado(numero){
    /*var agendamento = new Object();

    agendamento.data = $("#dtAgendamento")*/
    /*$("#addAgenda").hide();
    $("#tabelaInserir").hide();
    */
    $("#delAgenda").show();
    $("#tabelaRemover").show();

    $(".imgServico").attr("src", "imagens/tabelaRemover.png"); 
    $(".btnServico").attr("title", "Remover Serviço");   
    $(".btnServico").attr("onclick", "apagarDado($(this))"); 


    var classeTemp = "divServico_"+numero

    var novaLinha = "<div class='col-4 "+classeTemp+"'>" +
        "<label for='servico_"+numero+"'>Serviço:</label>" +  
        "<select id='servico_"+numero+"' name='servico_"+numero+"' class='form-control selectServico'>" +
        "<option value='' disabled selected>Selecione um serviço</option>" + 
        "</select>" + 
        "</div>" + 
        "<div class='col-1 "+classeTemp+"'></div>" +
        "<div class='col-4 "+classeTemp+"'>" +
        "<label for='profissional_"+numero+"'>Profissional:</label>" +  
        "<select id='profissional_"+numero+"' name='profissional_"+numero+"' class='form-control selectProfissional'>" +
        "<option value='' disabled selected>Selecione um profissional</option>" + 
        "</select>" + 
        "</div>" + 
        "<div class='col-3 "+classeTemp+"'>" +

        "<button id='btnServico_"+numero+"'  value="+numero+" class='btnServico' type='button' title='Adicionar Serviço' onclick='inserirDado("+ (numero+1) +")'><img src='imagens/tabelaInserir3.png' class='imgServico' id='imgServico'></button>"+

        
        "</div>";

    $('#divServico').append(novaLinha);

    preencherSelectProfissional(numero);
    preencherSelectServico(numero);

    $("#profissional_"+numero).select2();
    $("#servico_"+numero).select2();


    /*$("#addAgenda").show();
    $("#tabelaInserir").show();*/

}

function apagarDado(temp){
    //console.log(temp[0].id)   
    //console.log(temp[0].value)
    var classeDivServico = ".divServico_"+temp[0].value
    $(classeDivServico).hide();
}


function salvarAgendamento(){
    var agendamento = new Object();

    agendamento.dtAgendamento = $("#dtAgendamento").val();
    agendamento.horaInicial = $("#horaInicial").val();
    agendamento.horaFinal = $("#horaFinal").val();

    var $cdCliente = $("#cliente").val();
    var $nmCliente;
    var clientes = JSON.parse(localStorage.getItem("DadosCliente"));
    for (var i = 0; i < clientes.length; i++) {
        if($cdCliente == clientes[i].cdCliente){
            $nmCliente = clientes[i].nmCliente;
        }
    }
    agendamento.cliente = $nmCliente;

    agendamento.atendimentos = [];

    var listaServicos = $(".selectServico");
    var listaProfissionais = $(".selectProfissional");

    for(posicao = 0; posicao < listaServicos.length; posicao++){

        var atendimento = new Object();

        atendimento.servico = listaServicos[posicao].value;
        atendimento.profissional = listaProfissionais[posicao].value;

        agendamento.atendimentos[posicao] = atendimento;
        
    }

    

    //agendamento.servico = $("#servico").val()
    //agendamento.profissional = $("#profissional").val();

    /*var servicos = new Array();
    var cont = 1;
    for (var i = 0; i < 20; i++) {
        servicos[i] = document.select[cont].val();
        cont+=2; 
    }

    var profissionais = new Array();
    var cont2 = 2;
    for (var j = 0; j < 20; j++) {
        profissionais[j] = document.select[cont].val(); 
        cont+=2;
    }

    agendamento.servicos[]= servicos;
    agendamento.profissionais[]= profissionais;*/
    var agendamentos = JSON.parse(localStorage.getItem('DadosAgendamento'));
    var $cod = 0;

    if(agendamentos.length > 0){
        for (var i = 0; i < agendamentos.length; i++) {
            $cod = agendamentos[i].cdAgendamento;
        }
    }

    agendamento.cdAgendamento = $cod + 1;


    /*
    console.log(agendamento.dtAgendamento);
    console.log(agendamento.horaInicial);
    console.log(agendamento.horaFinal);
    console.log(agendamento.cliente);
    console.log(agendamento.servico);
    console.log(agendamento.profissional);
    console.log(agendamento.codigo);
    */

    agendamentos.push(agendamento);
    localStorage.setItem('DadosAgendamento', JSON.stringify(agendamentos));

}