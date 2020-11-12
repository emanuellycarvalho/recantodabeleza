$(document).ready(function () {
  
  $('#select_service').on('change', function(){selectService()});
  $('input[name="valor[]"]').on('input', function(){
      $(this).val('R$ ' + $(this).val());
  })

  $('#addOnTable').on('click', function (event) {
      event.preventDefault();

      //armazena os dados dos selects preenchidos
      const employee_id = $('#select_employee').val();
      const employee_name = $('#select_employee option:selected').html();
      
      const service_id = $('#select_service').val();
      const service_name = $('#select_service option:selected').html();
    
      const value = $('input[name="valor[]"]').val();

      
      if (verifyServiceData(service_id, employee_id, value.substring(3)) == null){
          return;
      }

      //cria os inputs com estes valores
      createFields({id: employee_id, name: employee_name}, {id: service_id, name: service_name}, value);
      removeOptionsSelected(service_id);

      //coloca o primeiro select em sua posição original
      $('#select_employee').val(0);
      $('#select_service').val(0);
});

    window.selectService = function (){
      const service_id = $('#select_service').val();
      var option = document.querySelectorAll('option[label="' + service_id + '"]');
      var valor = option[0].value.replace('.', ',');
      
      document.querySelector('input[name="valor[]"]').value = 'R$ ' + valor;
    }

//verifica se os dois selects estão preenchidos
  function verifyServiceData(service_id, employee_id, value){
    document.getElementById('service_error').innerHTML="";
    
    if(service_id == null || employee_id == null){
      var alrt = 'Você precisa selecionar um serviço e um funcionário por vez.';
      $('#service_error').append(alrt);
      return null;
    }

    if(value.replace(',' , '.') <= 0 || value == null){
      var alrt = 'O valor do serviço precisa ser maior que zero.';
      $('#service_error').append(alrt);
      return;
    }

    return 1;
  }
  
  //cria os inputs com os valores selecionados numa nova div
  function createFields(employee, service, valor) {
      
    var row = $('<div>').addClass('row selected');
    var div = $('<div>').addClass('col-md-4 col-xs-12');
  
    $('<input>').attr({ name: 'service_id[]', value: service.id, type: 'hidden' }).appendTo(div);
    $('<input>').attr({ name: 'service_name[]', value: service.name, type: 'text', readonly: true }).appendTo(div);
    div.appendTo(row);
    
    div = $('<div>').addClass('col-md-4 col-xs-12');
  
    $('<input>').attr({ name: 'employee_id[]', value: employee.id, type: 'hidden' }).appendTo(div);
    $('<input>').attr({ name: 'employee_name[]', value: employee.name, type: 'text', readonly: true }).appendTo(div);
    div.appendTo(row);
  
    div = $('<div>').addClass('col-md-3 col-xs-12');
  
    $('<input>').attr({id:'valor', name: 'valor[]', value: valor, type: 'text', readonly: true }).appendTo(div);
    div.appendTo(row);
  
    div = $('<div>').addClass('col-md-1 col-xs-12');
    $('<img>').attr({class: 'removeFromTable', src: 'http://localhost/BicJr/recantodabeleza/laravel/public/img/icons/removeFromTable.png'}).click(removeItem).appendTo(div);
    div.appendTo(row);
  
    row.prependTo('.services');
    updateTotalValue();
  }
  
  //remove do primeiro select as options que já foram selecionadas anteriormente
  function removeOptionsSelected(service_id) {  
    $('#select_service option[value="' + service_id + '"]').each(function () {
      $(this).remove(); 
    });
  }
  
  function removeItem(event) {
    event.preventDefault();
    document.getElementById('service_error').innerHTML="";
    
    //armazena o botão que foi acionado
    const button = $(event.currentTarget);
  
    //pega a div mais perto do botão que foi acionado
    const service_div = button.closest('.selected');
  
    const service_id = service_div.find("[name='service_id[]']").val();
    const service_name = service_div.find("[name='service_name[]']").val();
  
    var option = document.querySelectorAll('option[label="' + service_id + '"]');
  
    for (var item of option) {
      var valor = item.value;
    }
  
    //volta com eles pros primeiros selects
    $('#select_service').append(`<option value="${service_id}">${service_name}</option>`);
  
    //remove a div 
    service_div.remove();
    updateTotalValue();
  }

  function updateTotalValue(){
    const inputs = document.querySelectorAll('input[id="valor"]');
    var total = 0;

    for(var input of inputs){
      var value = input.value.substring(3); 
      value = parseFloat(value.replace(',', '.'));
      total += value;  
    }

    document.getElementById('total').value = total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
  }

    //VERIFICAR O HORARIO CHANGE
    const inputInicio = document.getElementById('inicio');
    if (inputInicio != null){
      inputInicio.addEventListener('change', (event) => {
          validarHora();
      });
    }

    const inputFim = document.getElementById('fim');
    if (inputFim != null){
      inputFim.addEventListener('change', (event) => {
          validarHora();      
      });
    }
});

function validarHora(){
    $('.verificar').hide();

    document.getElementById('validarHora').innerHTML = '';
    document.getElementById('fim').style.boxShadow = 'none';
    document.getElementById('inicio').style.boxShadow = 'none';

    const horaInicio = document.getElementById('inicio').value;
    const horaFim = document.getElementById('fim').value;
    const inicio = '07:00';
    const fim = '17:00';

    var algoErrado = false;
    
    if(horaInicio > horaFim){
    document.getElementById('validarHora').innerHTML = 'O horário de término é menor que o de início.';
    algoErrado = true;
    }
    
    if(horaInicio == horaFim){
    document.getElementById('validarHora').innerHTML = 'O horário de término é igual ao de início.';
    algoErrado = true;
    }
    
    if((horaInicio != '' || horaFim != '') || horaInicio < inicio || horaFim < inicio || horaInicio > fim || horaFim > fim){
    document.getElementById('validarHora').innerHTML = 'O estabelecimento funciona de 7:00 à 17:00';
    algoErrado = true;
    } 
    
    if(algoErrado){
    $('.verificar').show();
    document.getElementById('fim').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
    document.getElementById('inicio').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
    }
}

window.cleanNotifications = function(divName){
  document.getElementById(`${divName}_error`).innerHTML="";

  if(document.getElementById(`${divName}_warning`) != null)
    document.getElementById(`${divName}_warning`).innerHTML="";
    
}
