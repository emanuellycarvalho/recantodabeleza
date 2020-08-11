function verifyServiceData(service_id, employee_id, value){
    document.getElementById('service_error').innerHTML="";
    
    if(service_id == null || employee_id == null){
      var alrt = 'Você precisa selecionar um serviço e um funcionário por vez.';
      $('#service_error').append(alrt);
      return null;
    }
  
    if(qtd <= 0 || qtd == null){
      var alrt = 'A quantidade precisa ser maior que zero.';
      $('#service_error').append(alrt);
      return null;
    }
  
    if(value <= 0 || value == null){
      var alrt = 'O valor do serviço precisa ser maior que zero.';
      $('#service_error').append(alrt);
      return null;
    }
  
    return 1;
  }
  
  function verifyProductData(product_id, value){
    document.getElementById('product_error').innerHTML="";
    
    if(product_id == null){
      var alrt = 'Você precisa selecionar um produto por vez.';
      $('#product_error').append(alrt);
      return null;
    }
  
    if(value <= 0 || value == null){
      var alrt = 'O valor do serviço precisa ser maior que zero.';
      $('#service_error').append(alrt);
      return null;
    }
  
    return 1;
  }

  function createServiceRow(employee, service, value) {
  
    // pega a primeira tabela
    var table = document.getElementsByTagName('table')[0];
  
    // adiciona uma linha vazia à tabela
    // table.rows.length = final
    var newRow = table.insertRow(table.rows.length);
  
    // adiciona células à nova linha
    var cel1 = newRow.insertCell(0);
    var cel2 = newRow.insertCell(1);
    var cel3 = newRow.insertCell(2);
    var cel4 = newRow.insertCell(3);
    var cel5 = newRow.insertCell(4);
    var cel6 = newRow.insertCell(5);
    var cel7 = newRow.insertCell(6);
    // esconde as célular de id
    cel2.style.visibility = 'hidden';
    cel4.style.visibility = 'hidden';
    cel6.style.visibility = 'hidden';
  
    // preenche as células
    cel1.innerHTML = `${service.name}`;
    cel2.innerHTML = service.id;
    cel3.innerHTML = `<center> ${employee.name} </center>`;
    cel4.innerHTML = employee.id;
    cel5.innerHTML = `<center> R$ ${value} </center>`;
    cel7.innerHTML = `<center> <img class='addOnTable margin-off' src='http://localhost/BicJr/recantodabeleza/laravel/public/img/icons/removeFromTable.png' title='Remover'> </center>`
    
    $(cel7).on('click', function (event){
      document.getElementById('service_error').innerHTML="";
  
      //pega a linha do botão que foi acionado
      const row = this.parentNode;
  
      //pega a tabela
      const table = document.getElementById('serviceTable');
  
      //pega os valores do funcionário e serviço    
      const service_name = row.childNodes[0];
      const service_id = row.childNodes[1];
  
      const employee_name = row.childNodes[2];
      const employee_id = row.childNodes[3];
  
      const value = row.childNodes[4];
      
      //atualiza o campo referente ao valor final
      removeFromTotal(value);
  
      //volta com eles pros primeiros selects
      $('#select_employee').append(`<option value="${employee_id}">${employee_name}</option>`);
      $('#select_service').append(`<option value="${service_id}">${service_name}</option>`);
  
      table.deleteRow(row.rowIndex);
    });
  
  }
  