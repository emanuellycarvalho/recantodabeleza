
    $(document).ready(function () {

        //SERVICO
        $('#select_service').on('change', function(event) {
            //pega o valor do serviço
            var option = document.querySelectorAll('option[label="' + $('#select_service').val() + '"]');
            document.getElementById('valorServico').value = option[0].value;

        });

        $('#addOnTable-service').on('click', function (event) {
            event.preventDefault();

            //armazena os dados dos selects preenchidos
            const employee_id = $('#select_employee').val();
            const employee_name = $('#select_employee option:selected').html();
            
            const service_id = $('#select_service').val();
            const service_name = $('#select_service option:selected').html();

            const value = $('#valorServico').val();
            
            if (verifyServiceData(service_id, employee_id, value) == null){
                return;
            }

            //cria as linhas com estes valores
            createServiceRow({id: employee_id, name: employee_name}, {id: service_id, name: service_name}, value);
            removeOptionsSelected(employee_id, service_id);

            //coloca os selects nas posições originais
            $('#select_employee').val(0);
            $('#select_service').val(0);
            $('#valorServico').val(0);
        });

        //PRODUTO
        $('#select_product').on('change', function(event) {
            //pega o valor do produto
            var option = document.querySelectorAll('option[label="' + $('#select_product').val() + '"]');
            document.getElementById('precoProduto').value = option[1].value;
            document.getElementById('qtd').value = 1;
        });

        $('#addOnTable-product').on('click', function (event) {
            event.preventDefault();

            const product_id = $('#select_product').val();
            const product_name = $('#select_product option:selected').html();
            
            const amt = $('#qtd').val();
            const value = $('#precoProduto').val();

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
            const alrt = 'Desculpe, correu um erro com o valor.';
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
        cel5.innerHTML = `<center> R$ ${value} </center>`;
        cel7.innerHTML = `<center> <img class='addOnTable margin-off' src='http://localhost/BicJr/recantodabeleza/laravel/public/img/icons/removeFromTable.png' title='Remover'> </center>`;

        $(cel7).on('click', function (event){
        removeServiceItem(this);
        });
        
    }

    function createProductRow(product) {

        //console.log('valor: ' + product.value);
        //console.log('quantidade: ' + product.amt);
        var value = (parseFloat(product.value) * parseFloat(product.amt)).toString();
        value = value.substring(0, value.indexOf('.') + 3);

        if(addToTotal('product', value) == 0){
            const alrt = 'Desculpe, correu um erro com o valor.';
            $('#product_warning').append(alrt);
            return;
        }

        const table = document.getElementsByTagName('table')[1];
    
        const newRow = table.insertRow(table.rows.length);
        
        const cel1 = newRow.insertCell(0); //produto
        const cel2 = newRow.insertCell(1); //id
        const cel3 = newRow.insertCell(2); //qtd
        const cel4 = newRow.insertCell(3); //vazia
        const cel5 = newRow.insertCell(4); //qtd*valor
        const cel6 = newRow.insertCell(5); //vazia
        const cel7 = newRow.insertCell(6); //excluir
     
        cel2.style.visibility = 'hidden';
        cel4.style.visibility = 'hidden';
        cel6.style.visibility = 'hidden';
    

        cel1.innerHTML = `${product.name}`;
        cel2.innerHTML = product.id;
        cel3.innerHTML = `<center> ${product.amt} </center>`;
        cel5.innerHTML = `<center> R$ ${value} </center>`;
        cel7.innerHTML = `<center> <img class='addOnTable margin-off' src='http://localhost/BicJr/recantodabeleza/laravel/public/img/icons/removeFromTable.png' title='Remover'> </center>`;

        $(cel7).on('click', function (event){
        removeProductItem(this);
        });
        
    }

    function removeServiceItem(cel){
    
        //pega a linha do botão que foi acionado
        const row = cel.parentNode;
        
        const value = row.childNodes[4].innerText.substring(3);

        //atualiza o campo referente ao valor final
        if(removeFromTotal('service', value) == 0){
            var alrt = 'Desculpe, correu um erro com o valor.';
            $('#service_warning').append(alrt);
            return;
        }

        //pega a tabela
        const table = document.getElementById('serviceTable');

        //pega os valores do funcionário e serviço    
        const service_name = row.childNodes[0].innerHTML;
        const service_id = row.childNodes[1].innerHTML;

        const employee_name = row.childNodes[2].innerHTML;
        const employee_id = row.childNodes[3].innerHTML;

        //volta com eles pros primeiros selects
        $('#select_employee').append(`<option value="${employee_id}">${employee_name}</option>`);
        $('#select_service').append(`<option value="${service_id}">${service_name}</option>`);

        table.deleteRow(row.rowIndex);
    }

    function removeProductItem(cel){
    
        const row = cel.parentNode;
        
        const value = row.childNodes[4].innerText.substring(3);

        if(removeFromTotal('product', value) == 0){
            var alrt = 'Desculpe, correu um erro com o valor.';
            $('#product_warning').append(alrt);
            return;
        }

        const table = document.getElementById('productTable');

        const product_name = row.childNodes[0].innerHTML;
        const product_id = row.childNodes[1].innerHTML;

        $('#select_product').append(`<option value="${product_id}">${product_name}</option>`);

        table.deleteRow(row.rowIndex);
    }

    function addToTotal(divName, value){
        cleanNotifications(divName);
        if(value != null){
            //console.log('valor: ' + value);
            value = parseFloat(value);
            const divTotal = document.getElementById(`${divName}Total`);
            //console.log(divTotal);
            var valueDiv;

            if(divTotal.innerHTML == ''){
                divTotal.innerText = 'R$';
                valueDiv = $('<b>').attr({id:`${divName}Value`}).appendTo(divTotal);
                //console.log(valueDiv.prevObject[0]);
                valueDiv.prevObject[0].innerText = value;
            } else {
                valueDiv = document.getElementById(`${divName}Value`);
                //console.log(valueDiv);
                var total = (parseFloat(valueDiv.innerText) + value).toString();
                
                valueDiv.innerText = total.substring(0, total.indexOf(".") + 3);

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
            //console.log('valor da tabela: ' + value);
            //console.log('valor da div: ' + valueDiv.innerText);
            value = parseFloat(value);
            //console.log('valores pós parseFloat: ' + value + ', - ' + parseFloat(valueDiv.innerText));
            var total = parseFloat(valueDiv.innerText) - value;
            
            if(total < 0){
                valueDiv.innerText = 0;
                return 0;
            };
            
            total = (total).toString();
            valueDiv.innerText = total.substring(0, total.indexOf(".") + 3);
            
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
            service = parseFloat(document.getElementById('serviceValue').innerText);
        }
        if(document.getElementById('productValue') != null){
            product = parseFloat(document.getElementById('productValue').innerText);
        }

        var total = (service+product).toString();
        total = total.substring(0, total.indexOf(".") + 3);
        if (total == null){
            return 0;
        }

        document.getElementById('total').value = total;
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

    function cleanNotifications(divName){
    document.getElementById(`${divName}_error`).innerHTML="";
    document.getElementById(`${divName}_warning`).innerHTML="";
    }

    function removeOptionsSelected(product_id) {
        $('#select_product option[value="' + product_id + '"]').each(function () {
            $(this).remove();
        });
    }