$(document).ready(function () {
    $('#addOnTable').on('click', function (event) {
        event.preventDefault();
        console.log('teste');
        //armazena os dados dos selects preenchidos
        const employee_id = $('#select_employee').val();
        const employee_name = $('#select_employee option:selected').html();
        
        if (verifyServiceData(employee_id) == null){
            return;
        }
  
        //cria os inputs com estes valores
        createFields({id: employee_id, name: employee_name});
        removeOptionsSelected(employee_id);
  
        //coloca o primeiro select em sua posição original
        $('#select_employee').val(0);
    });
  
  //verifica se o select está preenchido
    function verifyServiceData(employee_id){
      document.getElementById('employee_error').innerHTML="";
      console.log('teste2');
      if(employee_id == null){
        var alrt = 'Você precisa selecionar um funcionário por vez.';
        $('#employee_error').append(alrt);
        return null;
      }
      return 1;
    }
    
    //cria os inputs com os valores selecionados numa nova div
    function createFields(employee) {
      console.log('teste3');
      var row = $('<div>').addClass('row selected');
      var div = $('<div>').addClass('col-md-11 col-xs-12');
      $('<input>').attr({ name: 'employee_id[]', value: employee.id, type: 'hidden' }).appendTo(div);
      $('<input>').attr({ name: 'employee_name[]', value: employee.name, type: 'text', readonly: true }).appendTo(div);
      div.appendTo(row);
      console.log(employee);
      div = $('<div>').addClass('col-md-3 col-xs-12');
    
      div = $('<div>').addClass('col-md-1 col-xs-12');
      $('<img>').attr({class: 'removeFromTable', src: 'http://localhost/estagio/recantodabeleza/laravel/public/img/icons/deleteEmployee.png'}).click(removeItem).appendTo(div);
      div.appendTo(row);
    
      row.prependTo('.employees');
    }
    
    //remove do primeiro select as options que já foram selecionadas anteriormente
    function removeOptionsSelected(employee_id, service_id) {
      $('#select_employee option[value="' + employee_id + '"]').each(function () {
        $(this).remove();
      });
    }
        
    function removeItem(event) {
      event.preventDefault();
      document.getElementById('employee_error').innerHTML="";
      
      //armazena o botão que foi acionado
      const button = $(event.currentTarget);
    
      //pega a div mais perto do botão que foi acionado
      const service_div = button.closest('.selected');
    
      //pega os valores do funcionário e serviço
      const employee_id = service_div.find("[name='employee_id[]']").val();
      const employee_name = service_div.find("[name='employee_name[]']").val();
    
      //volta com eles pros primeiros selects
      $('#select_employee').append(`<option value="${employee_id}">${employee_name}</option>`);
    
      //remove a div 
      service_div.remove();
    }
  
  });