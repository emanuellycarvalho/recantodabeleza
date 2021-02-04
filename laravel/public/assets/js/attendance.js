
    $(document).ready(function () {

        $('#tipoPagamento').on('change', function (){
            const paymentType = document.getElementById('tipoPagamento').value;

            if(paymentType == 'crediario'){
                parcel();
                unpaid();
            }

            if(paymentType == 'credito'){
                parcel();
                paid();
            }

            if(paymentType == 'debito' || paymentType == 'dinheiro'){
                uniqueParcel();
                paid();
            }
        });
    });

    function paid(){
        document.getElementById('pago').checked = true;
        document.getElementById('nao_pago').disabled = true;
        return;
    }

    function unpaid(){
        document.getElementById('pago').disabled = true;
        document.getElementById('nao_pago').checked = true;
        return;
    }

    function parcel(){
        $('#parcelas').removeAttr('readonly');
        return;        
    }

    function uniqueParcel(){
        $('#parcelas').val(1);
        $('#parcelas').attr('readonly', 'readonly');
    }

    //SERVICO -----------------------------------------------------------------------------------------------------

    $(document).ready(function () {

        $('#select_service').on('change', function(){selectService()});

        $('#addOnTable-service').on('click', function (event) {
            event.preventDefault();
            $('body').css('cursor', 'progress');

            //armazena os dados dos selects preenchidos
            const employee_id = $('#select_employee').val();
            const employee_name = $('#select_employee option:selected').html();

            const service_id = $('#select_service').val();
            const service_name = $('#select_service option:selected').html();

            const value = $('#valorServico').val();

            if (verifyServiceData(service_id, employee_id, value) == null)
                return;

            //cria as linhas com estes valores
            createServiceRow({id: employee_id, name: employee_name}, {id: service_id, name: service_name}, value);
            removeOptionsSelectedService(service_id);

            //coloca os selects nas posições originais
            $('#select_employee').val(0);
            $('#select_service').val(0);
            $('#valorServico').val(0);

            $('body').css('cursor', 'default');

        });
    });

    function createServiceRow(employee, service, value) {

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
        cel5.innerHTML = `<center> R$ ${value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} </center>`;
        cel7.innerHTML = `<center> <img class='addOnTable margin-off' src="../../img/icons/removeFromTable.png" title='Remover'> </center>`;

        $(cel7).on('click', function (event){
          removeServiceItem(this);
        });


        if(addToClassTotal('service', updateServiceTotal()) < 0){
            const alrt = 'Desculpe, ocorreu um erro com o valor.';
            $('#service_warning').append(alrt);
            return;
        }

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

    function removeServiceItem(cel){
        $('body').css('cursor', 'progress');

        //pega a linha do botão que foi acionado
        const row = cel.parentNode;

        //pega a célula em que está o valor e extrai o número apenas
        const value = row.childNodes[4].innerText.substring(3).replace(',', '.');

        //atualiza o campo referente ao valor final
        if(removeFromTotal('service', value) < 0){
            const alrt = 'Desculpe, ocorreu um erro com o valor.';
            $('#service_warning').append(alrt);
            return;
        }

        //pega a tabela
        const table = document.getElementById('serviceTable');

        //pega os valores do funcionário e serviço
        const service_name = row.childNodes[0].innerHTML;
        const service_id = row.childNodes[1].innerHTML;

        const employee_id = row.childNodes[3].innerHTML;

        const services = removeFromStringArray(document.getElementById('servicos').value, service_id);
        const employees = removeFromStringArray(document.getElementById('funcionarios').value, employee_id);
        const values = removeFromStringArray(document.getElementById('valoresServicos').value, value);

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
        $('#select_service').append(`<option value="${service_id}">${service_name}</option>`);
        table.deleteRow(row.rowIndex);

        $('body').css('cursor', 'default');

        return updateTotalValue();

    } //tudo certo

    function updateServiceTotal(){
        const tableRows = document.getElementById('serviceTable').querySelectorAll('tr');
        var total = 0;

        for(var i = 2; i < tableRows.length; i++){
            if(tableRows[i] != null){
                var row = tableRows[i];
                var cells = row.querySelectorAll('td');
                var value = cells[4].innerText.substring(3);
                value = value.replace(',', '.');
                value = parseFloat(value);
                total += value;
            }
        }

        return total;
    }; //tudo certo

    function removeOptionsSelectedService(service_id) {

        $('#select_service option[value="' + service_id + '"]').each(function () {
          $(this).remove();
        });
      }

    //PRODUTO -----------------------------------------------------------------------------------------------------

    $(document).ready(function () {

        $('#select_product').on('change', function(event) {
            const product_id = $('#select_product').val();
            var option = document.querySelectorAll('option[label="' + product_id + '"]');
            var x = 1;
            if(option[x] == null){
                x = 0;
            }
            var value = option[x].value.replace('.', ',');
            if(value.indexOf(',') == -1){
                value += ',00';
            }
            document.getElementById('precoProduto').value = value;
            document.getElementById('qtd').value = 1;
        }); //tudo certo

        $('#addOnTable-product').on('click', function (event) {
            event.preventDefault();
            $('body').css('cursor', 'progress');

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

            $('body').css('cursor', 'default');
        });
    });
    function createProductRow(product) {
        var value = parseFloat(product.value.replace(',', '.'));
        var finalValue = formatFinalValue(value, parseInt(product.amt));
        value = value.toString().replace('.', ',');

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
        cel3.innerHTML = `<center> R$ ${value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} </center>`;
        cel5.innerHTML = `<center> ${product.amt} </center>`;
        cel7.innerHTML = `<center> R$ ${finalValue.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} </center>`;
        cel9.innerHTML = `<center> <img class='addOnTable margin-off' src='../../img/icons/removeFromTable.png' title='Remover'> </center>`;

        $(cel9).on('click', function (event){
            removeProductItem(this);
        });

        if(addToClassTotal('product', updateProductTotal()) < 0){
            const alrt = 'Desculpe, ocorreu um erro com o valor.';
            $('#product_warning').append(alrt);
            return;
        }

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

    function removeProductItem(cel){
        $('body').css('cursor', 'progress');

        const row = cel.parentNode;
        const value = row.childNodes[6].innerText.substring(3).replace(',', '.');

        if(removeFromTotal('product', value) < 0){
            const alrt = 'Desculpe, ocorreu um erro com o valor.'; 
            $('#product_warning').append(alrt);
            return;
        }

        const table = document.getElementById('productTable');

        const product_name = row.childNodes[0].innerHTML;
        const product_id = row.childNodes[1].innerHTML;
        
        const amt = row.childNodes[4].innerHTML;

        const products = removeFromStringArray(document.getElementById('produtos').value, product_id);
        const values = removeFromStringArray(document.getElementById('valoresProdutos').value, value);
        const amts = removeFromStringArray(document.getElementById('quantidades').value, amt);

        if(products == 'lombrou' || values == 'lombrou' || amt == 'lombrou'){
            cleanNotifications('product');
            var alrt = 'Ocorreu um erro ao remover o produto.';
            $('#product_warning').append(alrt);
            return;
        }

        document.getElementById('produtos').value = products;
        document.getElementById('valoresProdutos').value = values;
        document.getElementById('quantidades').value = amts;

        $('#select_product').append(`<option value="${product_id}">${product_name}</option>`);

        table.deleteRow(row.rowIndex);
        updateProductTotal();

        $('body').css('cursor', 'default');
        return updateTotalValue();
    }

    function updateProductTotal(){
        const tableRows = document.getElementById('productTable').querySelectorAll('tr');
        var total = 0;

        for(var i = 2; i < tableRows.length; i++){
            if(tableRows[i] != null){
                var row = tableRows[i];
                var cells = row.querySelectorAll('td');
                var value = cells[6].innerText.substring(3);
                value = value.replace(',', '.');
                value = parseFloat(value);
                total += value;
            }
        }

        return total;
    };

    function formatFinalValue(value, amt){
        var finalValue = (value * amt).toString();
        finalValue = finalValue.replace('.', ',');
        finalValue = finalValue.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        
        if(finalValue.indexOf(',') == -1){
            finalValue += ',00';
        }

        return finalValue;
    }

    function verifyProductData(product_id, amt, value){
        cleanNotifications('product');
        value = parseFloat(value.replace(',', '.'));

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

    function removeOptionsSelected(product_id) {
        $('#select_product option[value="' + product_id + '"]').each(function () {
            $(this).remove();
        });
    }

    //GERAL -----------------------------------------------------------------------------------------------------

    function addToClassTotal(divName, value){
        cleanNotifications(divName);
        if(value > -1){
            value = value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
            const divTotal = document.getElementById(`${divName}Total`);
            var valueDiv;

            if(divTotal.innerHTML == ''){
                valueDiv = $('<b>').attr({id:`${divName}Value`}).appendTo(divTotal);
                valueDiv.prevObject[0].innerText = value;
            } else {
                valueDiv = document.getElementById(`${divName}Value`);
                valueDiv.innerText = value;
            }

            return updateTotalValue();
        }

        return -1;
    }

    function removeFromTotal(divName, value){
        cleanNotifications(divName);
        var valueDiv = document.getElementById(`${divName}Value`);

        if(value != null && valueDiv != null && valueDiv.innerText != null){
            var total = valueDiv.innerText.substr(3).replace(',', '.');
            value = value.replace(',', '.');
            total = parseFloat(total) - parseFloat(value);

            if(total <= 0 || isNaN(total)){
                valueDiv.innerText = '';
                return total;
            };

            total = total.toString().replace('.', ',');
            total = total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

            if(total.indexOf(',') == -1){
                total += ',00';
            }

            total = total.substr(0, (total.indexOf(',') + 3));
            valueDiv.innerText = 'R$ ' + total;

            return updateTotalValue();
        }
        valueDiv.innerText = '';
        return -1;
    }

    function updateTotalValue(){
        var service = 0;
        var product = 0;

        if(document.getElementById('serviceValue') != null){
            service = parseFloat(document.getElementById('serviceValue').innerText.replace(',', '.').substring(3));
        }
        if(document.getElementById('productValue') != null){
            product = parseFloat(document.getElementById('productValue').innerText.replace(',', '.').substring(3));
        }

        if(isNaN(service)){
            service = 0;
        }

        if(isNaN(product)){
            product = 0;
        }

        var total = (service+product).toString();

        if (total == null){
            return -1;
        }
        
        total = total.replace('.', ',');

        if(total.indexOf(',') == -1){
            total += ',00';
        }

        total = total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        total = total.substr(0, (total.indexOf(',') + 3));

        document.getElementById('total').value = 'R$ ' + total;
        document.getElementById('valorFinal').value = total;
        return 1;
    }

    //tudo certo

    function removeFromStringArray(string, element){
        if (string != null && element != null){
            var array = string.split(',');
            array.splice(array.indexOf(element), 1);
            return array.toString();
        }

        return 'lombrou';
    }