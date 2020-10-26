
    $(document).ready(function () {
 
        $('#tipoPagamento').on('change', function (event){
            const paymentType = document.getElementById('tipoPagamento').value;

            if(paymentType == 'crediario' || paymentType == 'credito'){
                $('#parcelas').removeAttr('readonly');
            } else {
                $('#parcelas').attr('readonly', 'readonly');
                $('#parcelas').val(1);
            }  

            if(paymentType == 'credito' || paymentType == 'debito'){
                document.getElementById('nao_pago').disabled = true;
                document.getElementById('pago').checked = true;
            } else {
                document.getElementById('nao_pago').disabled = false;
            } 
        
        });

        //SERVICO
        $('#select_service').on('change', function(event) {
            //pega o valor do serviço
            var option = document.querySelectorAll('option[label="' + $('#select_service').val() + '"]');
            var val = option[0].value;
            document.getElementById('valorServico').value = 'R$ ' + val.replace('.', ',');

        });

        $('#addOnTable-service').on('click', function (event) {
            event.preventDefault();

            //armazena os dados dos selects preenchidos
            const employee_id = $('#select_employee').val();
            const employee_name = $('#select_employee option:selected').html();
            
            const service_id = $('#select_service').val();
            const service_name = $('#select_service option:selected').html();

            const value = $('#valorServico').val().substring(3);
            
            if (verifyServiceData(service_id, employee_id, value) == null){
                return;
            }

            //cria as linhas com estes valores
            createServiceRow({id: employee_id, name: employee_name}, {id: service_id, name: service_name}, value);
            removeOptionsSelectedEmployee(service_id);

            //coloca os selects nas posições originais
            $('#select_employee').val(0);
            $('#select_service').val(0);
            $('#valorServico').val(0);
        });

        //PRODUTO
        $('#select_product').on('change', function(event) {
            //pega o valor do produto
            var option = document.querySelectorAll('option[label="' + $('#select_product').val() + '"]');
            var val = option[1].value;
            document.getElementById('precoProduto').value = 'R$ ' + menageValueFormat(val.replace('.', ','));
            document.getElementById('qtd').value = 1;
        });

        $('#addOnTable-product').on('click', function (event) {
            event.preventDefault();

            const product_id = $('#select_product').val();
            const product_name = $('#select_product option:selected').html();
            
            const amt = $('#qtd').val();
            const value = $('#precoProduto').val().substring(3);

            if (verifyProductData(product_id, amt, value) == null){
                return;
            }

            createProductRow({id: product_id, name: product_name, amt: amt, value: value});
            removeOptionsSelected(product_id);

            $('#qtd').val(0);
            $('#precoProduto').val(0);
            $('#select_product').val(0);
        });
    });

    function createServiceRow(employee, service, value) {

        if(addToTotal('service', value) == 0){
            const alrt = 'Desculpe, ocorreu um erro com o valor.';
            $('#service_warning').append(alrt);
            return;
        }
        // pega a primeira tabela
        const table = document.getElementsByTagName('table')[0];
    
        // adiciona uma linha vazia à tabela
        // table.rows.length = final
        const newRow = table.insertRow(table.rows.length);
    
        // adiciona células à nova linha
        const cel1 = newRow.insertCell(0); //servico
        const cel2 = newRow.insertCell(1); //id
        const cel3 = newRow.insertCell(2); //funcionario
        const cel4 = newRow.insertCell(3); //id
        const cel5 = newRow.insertCell(4); //valor 
        const cel6 = newRow.insertCell(5); //vazia
        const cel7 = newRow.insertCell(6); //excluir
        // esconde as célular de id
        cel2.style.visibility = 'hidden';
        cel4.style.visibility = 'hidden';
        cel6.style.visibility = 'hidden';
    
        // preenche as células
        cel1.innerHTML = `${service.name}`;
        cel2.innerHTML = service.id;
        cel3.innerHTML = `<center> ${employee.name} </center>`;
        cel4.innerHTML = employee.id;
        cel5.innerHTML = `<center> R$ ${menageValueFormat(value)} </center>`;
        cel7.innerHTML = `<center> <img class='addOnTable margin-off' src='http://localhost/BicJr/recantodabeleza/laravel/public/img/icons/removeFromTable.png' title='Remover'> </center>`;

        $(cel7).on('click', function (event){
          removeServiceItem(this);
        });
        
        const services = document.getElementById('servicos').value;
        if(services != '' || services != null){
            document.getElementById('servicos').value = services + ',' + service.id;
        } else {
            document.getElementById('servicos').value = service.id;
        }
        
        const employees = document.getElementById('funcionarios').value;
        if(employees != '' || employees != null){
            document.getElementById('funcionarios').value = employees + ',' + employee.id;
        } else {
            document.getElementById('funcionarios').value = employee.id;
        }        

        const values = document.getElementById('valoresServicos').value;
        if(values != null || values != ''){
            document.getElementById('valoresServicos').value = values + ',' + value.replace(',', '.');
        } else {
            document.getElementById('valoresServicos').value = value.replace(',', '.');
        }
    }

    function createProductRow(product) {

        var value = product.value.replace(',', '.');
        var finalValue = (value * parseInt(product.amt)).toString();
        finalValue = finalValue.substring(0, value.indexOf('.') + 3);
        finalValue = finalValue.replace('.', ',');
        value = value.replace('.', ',');

        if(addToTotal('product', finalValue) == 0){
            const alrt = 'Desculpe, ocorreu um erro com o valor.';
            $('#product_warning').append(alrt);
            return;
        }

        const table = document.getElementsByTagName('table')[1];
    
        const newRow = table.insertRow(table.rows.length);
        
        const cel1 = newRow.insertCell(0); //produto
        const cel2 = newRow.insertCell(1); //id
        const cel3 = newRow.insertCell(2); //unitario
        const cel4 = newRow.insertCell(3); //vazia
        const cel5 = newRow.insertCell(4); //qtd
        const cel6 = newRow.insertCell(5); //vazia
        const cel7 = newRow.insertCell(6); //qtd*valor
        const cel8 = newRow.insertCell(7); //vazia
        const cel9 = newRow.insertCell(8); //excluir
     
        cel2.style.visibility = 'hidden';
        cel4.style.visibility = 'hidden';
        cel6.style.visibility = 'hidden';
    

        cel1.innerHTML = `${product.name.substring(0, 30)}`;
        cel2.innerHTML = product.id;
        cel3.innerHTML = `<center> R$ ${value} </center>`;
        cel5.innerHTML = `<center> ${product.amt} </center>`;
        cel7.innerHTML = `<center> R$ ${menageValueFormat(finalValue)} </center>`;
        cel9.innerHTML = `<center> <img class='addOnTable margin-off' src='http://localhost/BicJr/recantodabeleza/laravel/public/img/icons/removeFromTable.png' title='Remover'> </center>`;

        $(cel9).on('click', function (event){
            removeProductItem(this);
        });

        const products = document.getElementById('produtos').value;
        if(products != null){
            document.getElementById('produtos').value = products + ',' + product.id;
        }else {
            document.getElementById('produtos').value = product.id;
        }

        const amt = document.getElementById('quantidades').value;
        if(amt != null || amt != ''){
            document.getElementById('quantidades').value = amt + ',' + product.amt;
        } else {
            document.getElementById('quantidades').value = product.amt;
        }

        const values = document.getElementById('valoresProdutos').value;
        if(values != null || values != ''){
            document.getElementById('valoresProdutos').value = values + ',' + value.replace(',', '.');
        } else {
            document.getElementById('valoresProdutos').value = value.replace(',', '.');
        }
    }

    function removeServiceItem(cel){
    
        //pega a linha do botão que foi acionado
        const row = cel.parentNode;
        
        const value = row.childNodes[4].innerText.substring(3);
        //console.log(value); return;

        //atualiza o campo referente ao valor final
        if(removeFromTotal('service', value) == 0){
            var alrt = 'Desculpe, ocorreu um erro com o valor.';
            $('#service_warning').append(alrt);
        }

        //pega a tabela
        const table = document.getElementById('serviceTable');

        //pega os valores do funcionário e serviço    
        const service_name = row.childNodes[0].innerHTML;
        const service_id = row.childNodes[1].innerHTML;

        const employee_name = row.childNodes[2].innerHTML;
        const employee_id = row.childNodes[3].innerHTML;

        const services = removeFromStringArray(document.getElementById('servicos').value, service_id);
        const employees = removeFromStringArray(document.getElementById('funcionarios').value, employee_id);
        const values = removeFromStringArray(document.getElementById('valoresServicos').value, employee_id);

        //console.log(services + ', ' + employees + ', ' + values);
        
        if(services == 'lombrou' || employees == 'lombrou' || values == 'lombrou'){
            cleanNotifications('service');
            var alrt = 'Ocorreu um erro ao remover o serviço.';
            $('#service_warning').append(alrt);
            return;
        } 

        document.getElementById('servicos').value = services; 
        document.getElementById('funcionarios').value = employees; 
        document.getElementById('valoresServicos').value = values; 
        
        //volta com eles pros primeiros selects
        $('#select_employee').append(`<option value="${employee_id}">${employee_name}</option>`);
        $('#select_service').append(`<option value="${service_id}">${service_name}</option>`);

        table.deleteRow(row.rowIndex);
    }

    function removeProductItem(cel){
    
        const row = cel.parentNode;
        
        const value = row.childNodes[4].innerText.substring(3);

        if(removeFromTotal('product', value) == 0){
            var alrt = 'Desculpe, ocorreu um erro com o valor.';
            $('#product_warning').append(alrt);
        }

        const table = document.getElementById('productTable');

        const product_name = row.childNodes[0].innerHTML;
        const product_id = row.childNodes[1].innerHTML;

        const products = removeFromStringArray(document.getElementById('produtos').value, product_id);
        const values = removeFromStringArray(document.getElementById('valoresProdutos').value, product_id);

        if(products == 'lombrou' || values == 'lombrou'){
            cleanNotifications('product');
            var alrt = 'Ocorreu um erro ao remover o produto.';
            $('#product_warning').append(alrt);
            return;
        } 

        document.getElementById('produtos').value = products; 
        document.getElementById('valoresProdutos').value = values; 

        $('#select_product').append(`<option value="${product_id}">${product_name}</option>`);

        table.deleteRow(row.rowIndex);
    }

    function addToTotal(divName, value){
        cleanNotifications(divName);
        if(value != null){
            const divTotal = document.getElementById(`${divName}Total`);
            //console.log(value);
            var valueDiv;

            if(divTotal.innerHTML == ''){
                divTotal.innerText = 'R$';
                valueDiv = $('<b>').attr({id:`${divName}Value`}).appendTo(divTotal);    
                valueDiv.prevObject[0].innerText = menageValueFormat(value);
            } else {
                valueDiv = document.getElementById(`${divName}Value`);
                var already = valueDiv.innerText.replace(',', '.');
                var total = (parseFloat(already) + parseFloat(value)).toString();
                valueDiv.innerText = menageValueFormat(total.replace('.', ','));

                if(valueDiv.innerText == 'NaN' || valueDiv.innerText == '[o'){
                    valueDiv.innerText = 0;
                    return 0;
                }
            }

            return updateTotalValue();
        } 

        return 0;
    }

    function removeFromTotal(divName, value){
        cleanNotifications(divName);
        var valueDiv = document.getElementById(`${divName}Value`);

        if(value != null && valueDiv.innerText != null){
            value = parseFloat(value.replace(',', '.'));
            var total = parseFloat(valueDiv.innerText.replace(',', '.')) - value;
            //console.log(total); return;

            if(total < 0 || total < 1){
                valueDiv.innerText = 0;
                return 0;
            };
            
            total = total.toString().replace('.', ',');
            valueDiv.innerText = menageValueFormat(total);
            
            if(valueDiv.innerText == 'NaN' || valueDiv.innerText == '[o'){
                valueDiv.innerText = 0;
                return 0;
            }

            return updateTotalValue();
        } 

        return 0;
    }

    function updateTotalValue(){
        var service = 0;
        var product = 0;

        if(document.getElementById('serviceValue') != null){
            service = parseFloat(document.getElementById('serviceValue').innerText.replace(',', '.'));
        }
        if(document.getElementById('productValue') != null){
            product = parseFloat(document.getElementById('productValue').innerText.replace(',', '.'));
        }

        var total = (service+product).toString().replace('.', ',');
        total = 'R$ ' + menageValueFormat(total);
        if (total == null){
            return 0;
        }

        document.getElementById('total').value = total;
        document.getElementById('valorFinal').value = total;
        return;
    }

    function verifyServiceData(service_id, employee_id, value){
        cleanNotifications('service');

        if(service_id == null || employee_id == null){
            var alrt = 'Você precisa selecionar um serviço e um funcionário por vez.';
            $('#service_error').append(alrt);
            return;
        }

        if(qtd <= 0 || qtd == null){
            var alrt = 'A quantidade precisa ser maior que zero.';
            $('#service_error').append(alrt);
            return;
        }

        if(value <= 0 || value == null){
            var alrt = 'O valor do serviço precisa ser maior que zero.';
            $('#service_error').append(alrt);
            return;
        }

        return 1;
    }
    
    function verifyProductData(product_id, amt, value){
        cleanNotifications('product');
        
        if(product_id == null){
        var alrt = 'Você precisa selecionar um produto por vez.';
        $('#product_error').append(alrt);
        return;
        }
    
        if(value <= 0 || value == null){
        var alrt = 'O valor do produto precisa ser maior que zero.';
        $('#product_error').append(alrt);
        return;
        }

        if(amt <= 0 || amt == null){
            var alrt = 'Você precisa adicionar um ou mais produtos.';
            $('#product_error').append(alrt);
            return;
        }
    
        return 1;
    }

    function removeFromStringArray(string, element){
        //console.log('array: ' +  string);
        //console.log('element: ' + element);
        if (string != null && element != null){
            var array = string.split(',');
            array.splice(array.indexOf(element), 1);
            return array.toString();
        }

        return 'lombrou';
    }

    function cleanNotifications(divName){
        document.getElementById(`${divName}_error`).innerHTML="";
        document.getElementById(`${divName}_warning`).innerHTML="";
    }

    function removeOptionsSelectedEmployee(service_id) {
        /* $('#select_employee option[value="' + employee_id + '"]').each(function () {
          $(this).remove();
        }); */
      
        $('#select_service option[value="' + service_id + '"]').each(function () {
          $(this).remove();
        });
      }

    function removeOptionsSelected(product_id) {
        $('#select_product option[value="' + product_id + '"]').each(function () {
            $(this).remove();
        });
    }

    function menageValueFormat(value){
        if(value != null){
            const index = value.indexOf(',');
            value = value.split('');
            
            if(value[index+1] == null)
                value[index+1] = 0;
            
            if(value[index+2] == null)
                value[index+2] = 0;

            var final = value[0];
            for($i = 1; $i < index+3; $i ++){
                final += value[$i];
            }

            return final;
        }
        return null;
    }