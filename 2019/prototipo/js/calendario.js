var agendamentos;
$(document).ready(function() {

  var cores = new Array ('#F7D358','#F6CEEC','#F3F781','#81F781','#A9D0F5','#F6CECE','#F5A9BC','#F79F81','#81DAF5','#D0A9F5'); 
  
  var agendamentos = JSON.parse(localStorage.getItem("DadosAgendamento"));

  var dadosAgenda = new Array();
  
  for (var i = 0; i < agendamentos.length; i++) {
      var posicao =  Math.floor((Math.random() * 10) + 1);
      var agenda = new Object();    

      agenda.id = agendamentos[i].cdAgendamento;
      agenda.title = agendamentos[i].cliente;
      agenda.start = agendamentos[i].dtAgendamento+' '+agendamentos[i].horaInicial
      agenda.end = agendamentos[i].dtAgendamento+' '+agendamentos[i].horaFinal
      agenda.color = cores[posicao]

      dadosAgenda.push(agenda);
  }
   

  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    defaultDate: Date(),
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    eventClick: function(event) {

      console.log(1)
      
      $('#visualizar #id').text(event.id);
      $('#visualizar #id').val(event.id);
      $('#visualizar #title').text(event.title);
      $('#visualizar #title').val(event.title);
      $('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
      $('#visualizar #start').val(event.start.format('DD/MM/YYYY HH:mm:ss'));
      $('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
      $('#visualizar #end').val(event.end.format('DD/MM/YYYY HH:mm:ss'));
      $('#visualizar #color').val(event.color);
      $('#visualizar').modal('show');
      return false;

    },
    
    selectable: true,
    selectHelper: true,
    select: function(start, end){
      $('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
      $('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
      //$('#cadastrar').modal('show');  
      $(location).attr('href', 'agendaratendimento.php?');         
    },

    events: dadosAgenda
  });
});

//Mascara para o campo data e hora
function DataHora(evento, objeto){
  var keypress=(window.event)?event.keyCode:evento.which;
  campo = eval (objeto);
  if (campo.value == '00/00/0000 00:00:00'){
    campo.value=""
  }
 
  caracteres = '0123456789';
  separacao1 = '/';
  separacao2 = ' ';
  separacao3 = ':';
  conjunto1 = 2;
  conjunto2 = 5;
  conjunto3 = 10;
  conjunto4 = 13;
  conjunto5 = 16;
  if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
    if (campo.value.length == conjunto1 )
    campo.value = campo.value + separacao1;
    else if (campo.value.length == conjunto2)
    campo.value = campo.value + separacao1;
    else if (campo.value.length == conjunto3)
    campo.value = campo.value + separacao2;
    else if (campo.value.length == conjunto4)
    campo.value = campo.value + separacao3;
    else if (campo.value.length == conjunto5)
    campo.value = campo.value + separacao3;
  }else{
    event.returnValue = false;
  }
}

/*$('.btn-canc-vis').on("click", function() {
  //$('.form').slideToggle();
  //$('.visualizar').slideToggle();
  $(location).attr('href', 'agendaratendimento.php?id='+$("#id").val());  
});*/

$('.btn-canc-edit').on("click", function() {
  $('.visualizar').slideToggle();
  $('.form').slideToggle();
});

/*$("button.excluir").click(function(){
    var $this = $(this);
    var $meu_alerta = $("#confirm-delete");
    $meu_alerta.modal();
});*/

