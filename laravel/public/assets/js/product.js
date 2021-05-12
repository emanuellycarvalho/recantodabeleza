$(document).ready(function () {

  $('#addOnTable').on('click', function (event) {
        event.preventDefault();
        //armazena os dados dos selects preenchidos
        const product_id = $('#select_product').val();
        const product_name = $('#select_product option:selected').html();
        
        if (verifyServiceData(product_id) == null){
            return;
        }
  
        //cria os inputs com estes valores
        createFields({id: product_id, name: product_name});
        removeOptionsSelected(product_id);
  
        //coloca o primeiro select em sua posição original
        $('#select_product').val(0);
    });
  
  //verifica se o select está preenchido
    function verifyServiceData(product_id){
      document.getElementById('product_error').innerHTML="";
      if(product_id == null){
        var alrt = 'Você precisa selecionar um produto por vez.';
        $('#product_error').append(alrt);
        return null;
      }
      return 1;
    }
    
    //cria os inputs com os valores selecionados numa nova div
    function createFields(product) {
      var row = $('<div>').addClass('row selected');
      var div = $('<div>').addClass('col-md-11 col-xs-12');
      $('<input>').attr({ name: 'product_id[]', value: product.id, type: 'hidden' }).appendTo(div);
      $('<input>').attr({ name: 'product_name[]', value: product.name, type: 'text', readonly: true }).appendTo(div);
      div.appendTo(row);
      div = $('<div>').addClass('col-md-3 col-xs-12');
    
      div = $('<div>').addClass('col-md-1 col-xs-12');
      $('<img>').attr({class: 'removeFromTable', src: 'http://localhost/BicJr/recantodabeleza/laravel/public/img/icons/deleteProduct.png'}).click(removeItem).appendTo(div);
      div.appendTo(row);
    
      row.prependTo('.products');
    }
    
    //remove do primeiro select as options que já foram selecionadas anteriormente
    function removeOptionsSelected(product_id, service_id) {
      $('#select_product option[value="' + product_id + '"]').each(function () {
        $(this).remove();
      });
    }
        
    function removeItem(event) {
      event.preventDefault();
      document.getElementById('product_error').innerHTML="";
      
      //armazena o botão que foi acionado
      const button = $(event.currentTarget);
    
      //pega a div mais perto do botão que foi acionado
      const service_div = button.closest('.selected');
    
      //pega os valores do funcionário e serviço
      const product_id = service_div.find("[name='product_id[]']").val();
      const product_name = service_div.find("[name='product_name[]']").val();
    
      //volta com eles pros primeiros selects
      $('#select_product').append(`<option value="${product_id}">${product_name}</option>`);
    
      //remove a div 
      service_div.remove();
    }
  
  });