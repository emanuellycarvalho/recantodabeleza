@extends('templates.adm')

@if(isset($atd)) 
	@section('title') Editar Atendimento @endsection('title')
@else
    @section('title') Registrar Atendimento @endsection('title')
@endif

@section('icon') <img class='responsive' src='{{url("/img/icons/attendance-light.png")}}' width='35px'> @endsection('icon')

@section('content')

<script src='{{url("assets/js/scheduling.js")}}'></script>
<script src='{{url("assets/js/attendance.js")}}'></script>

    <!-- Suppliers section -->
    <section class='cart-section spad'>
		<div class='container'>
            <div class='contact-form' id='totalValue'>
                <div class='form-group'>
                    <div class='labelBackground'> 
                        <label for='total'>Valor Final</label>
                    </div>
                    <input name='total' id='total' placeholder='Total' value='0'>
                </div>
            </div>
			<div class='row justify-content-center' id='attendance'>
                <div class='col-lg-8'>
                @if(isset($atd)) 
					<form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/attendance/$atd->cdAtendimento")}}'>
                    
					@method('PUT')
                @else
                    <form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/attendance")}}' enctype='multiform/form-data'>
                @endif
                        @csrf

                        <input type='hidden' name='produtos' id='produtos'>
                        <input type='hidden' name='servicos' id='servicos'>
                        <input type='hidden' name='valoresServicos' id='valoresServicos'>
                        <input type='hidden' name='valoresProdutos' id='valoresProdutos'>
                        <input type='hidden' name='valorFinal' id='valorFinal'>
                        <input type='hidden' name='funcionarios' id='funcionarios'>
                        <input type='hidden' name='quantidades' id='quantidades'>
                        <input type='hidden' name='hoje' id='hoje' value= '@php echo date("Y-m-d") @endphp'>

                        <!-- form header -->
                        <div class='row'>

                            <div class='col-md-3 col-xs-12'>
                                <div class='form-group'>
                                    <label for='data'>Data*</label> <br>
                                    <input type='text' name='data' id='data' class='calendar' placeholder='00/00/0000' value='{{$date ?? "" }}' autofocus> 
                                    <small id='verificarData' class='verificar'>
									    Data posterior a hoje. Tente agendamento.
								    </small>
                                </div>
                            </div>  

                            <div class='col-md-7 col-xs-12'>
                                <div class='form-group'>
                                    <label for='cliente'>Cliente*</label>
                                    <select name='cliente' id='cliente'>
                                        <option value='0' disabled selected> Selecione um cliente </option>
                                            @foreach($clients as $cli)
                                                @if(isset($atd->cdCliente) && $cli->cdCliente == $atd->cdCliente)
                                                    <option value='{{$cli->cdCliente}}' selected> {{$cli->telefone}} | {{$cli->nmCliente}} </option>
                                                @else
                                                    <option value='{{$cli->cdCliente}}'> {{$cli->telefone}} | {{$cli->nmCliente}} </option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class='col-md-2 col-xs-12'>
                                <button type='button' class='plus-btn' data-toggle='modal' data-target='#newClientModal'> + </button>
                            </div>

                        </div>

                        <div class='row' id='pagamento'>
                            
                            <div class='col-md-4'>
                                <div class='form-group'>
                                    <label for='tipoPagamento'>Pagamento*</label>
                                    <select name='tipoPagamento' id='tipoPagamento'>
                                        <option value='0' disabled selected> Selecione um tipo de pagamento </option>
                                        <option value='dinheiro'> Dinheiro </option>
                                        <option value='crediario'> Crediário </option>
                                        <option value='debito'> Cartão (Débito) </option>
                                        <option value='credito'> Cartão (Crédito) </option>
                                    </select>
                                </div>
                            </div> 

                            <div class='col-md-2'>
                                <label for='parcelas'>Parcelas</label>
                                <input type='number' name='parcelas' id='parcelas' min='1' max='12' readonly>
                            </div>

                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <div class='border'>
                                        <label for='situacao'>Situação</label>
                                        <div id='customRadio'>
                                            <div class='custom-control custom-radio custom-control-inline'>
                                                <input type='radio' class='custom-control-input' name='situacao' id='pago' value='P' >
                                                <label class='custom-control-label' for='pago'>Pago</label>
                                            </div>
                                            <div class='custom-control custom-radio custom-control-inline'>
                                                <input type='radio' class='custom-control-input' name='situacao' id='nao_pago' value='N' >
                                                <label class='custom-control-label' for='nao_pago'>Não pago</label>
                                            </div>			
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- end form header -->

                </div> <!-- col lg 6 -->
 
                <div class='col-lg-9 contact-form itens'> <!-- services section -->
                    <div id='services'>
                        
                        <div class='col-md-12 col-xs-12'>
                            <div class='cf-title'><h4>Serviços</h4></div>
                            <hr class='pink'>
                        </div>

                        <div class='text-center mb-5 alert-danger' id='service_error'>
                        </div>

                        <div class='text-center mb-5 alert-warning' id='service_warning'>
                        </div>

                        <div class='row'>

                            <div class='col-md-4 col-xs-12'>
                                <label for='select_service'>Serviço*</label>
                                <select name='select_service[]' id='select_service'>
                                    <option value='0' disabled selected> Selecione um serviço por vez </option>
                                    @foreach($services as $svc)
                                        <script>
                                            var values = [];
                                            if(sessionStorage.getItem('servicesValues') != null){
                                                values = sessionStorage.getItem('servicesValues');
                                            }
                                            var val = values + '{{$svc->valor}}';
                                            values[{{$svc->cdServico}}] = val;
                                            sessionStorage.setItem('servicesValues', values);
                                        </script> 
                                        <option value='{{$svc->cdServico}}'> {{$svc->nmServico}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id='valores' hidden>
                                <select multiple name='valores' id='valores' readonly>
                                    @foreach($services as $svc)
                                        <option label='{{$svc->cdServico}}' value='{{$svc->valorServico}}'></option>
                                    @endforeach
                                </select> 
                            </div>
                            
                            <div class='col-md-4 col-xs-12'>
                                <label for='select_employee'>Funcionário*</label>
                                <!-- <input type='text' name='funcionario' id='funcionario' placeholder='Selecione um funcionario'> --> 
                                <select name='select_employee' id='select_employee'>
                                    <option value='0' disabled selected> Selecione um funcionário </option>
                                    @foreach($employees as $emp) 
                                        <option value='{{$emp->cdFuncionario}}'> {{$emp->nmFuncionario}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class='col-md-3 col-xs-12'>
                                <label for='valorServico'>Valor*</label>
                                <input name='valorServico' id='valorServico' placeholder= '00,00'>
                            </div>

                            <div class='col-md-1 col-xs-12'>    
                                <img class='addOnTable' src='{{url("img/icons/addOnTable.png")}}' title='Adicionar' id='addOnTable-service'>
                            </div>

                        </div>

                    </div>

                    <div class='services'> 
                        <div class='cart-table itens'>
                            <div class='cart-table-warp'>
                                @csrf
                                <table id='serviceTable' class='tablesorter'>
                                <thead>
                                    <tr>
                                        <th class='product-th'>Serviço</th>
                                        <th style='visibility: hidden;'></th>
                                        <th class='quy-th'>Funcionario</th>
                                        <th style='visibility: hidden;'></th>
                                        <th class='quy-th' id='none'>Valor</th>
                                        <th style='visibility: hidden;'></th>
                                        <th class='quy-th' id='none'>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody'>
                                    <tr></tr>
                                </tbody>
                                </table>
                            </div>
                            <div class='total-cost-free'>
                                <div class='col-md-3 offset-md-9 value' id='serviceTotal'></div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end services section -->
                
                <div class='row'> . </div>

                <div class='col-lg-9 contact-form itens'> <!-- products section -->
                    <div id='products'>
                        
                        <div class='col-md-12 col-xs-12'>
                            <div class='cf-title'><h4>Produtos</h4></div>
                            <hr class='pink'>
                        </div>

                        <div class='text-center mb-5 alert-danger' id='product_error'>
                        </div>

                        <div class='text-center mb-5 alert-warning' id='product_warning'>
                        </div>

                        <div class='row'> 

                            <div class='col-md-4 col-xs-12'>
                                <label for='select_product'>Produto*</label>
                                <select name='select_product[]' id='select_product'>
                                    <option value='0' disabled selected> Selecione um produto por vez </option>
                                    @foreach($products as $pdt)
                                        <script>
                                            var values = [];
                                            if(sessionStorage.getItem('productsValues') != null){
                                                values = sessionStorage.getItem('productsValues');
                                            }
                                            var val = values + '{{$pdt->valor}}';
                                            values[{{$pdt->cdProduto}}] = val;
                                            sessionStorage.setItem('productsValues', values);
                                        </script> 
                                        <option value='{{$pdt->cdProduto}}'> {{$pdt->nmProduto}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id='valores' hidden>
                                <select multiple name='valores' id='valores' readonly>
                                    @foreach($products as $pdt)
                                        <option label='{{$pdt->cdProduto}}' value='{{$pdt->precoProduto}}'></option>
                                    @endforeach
                                </select> 
                            </div>
 
                            <div class='col-md-4 col-xs-12'>
                                <label for='precoProduto'>Valor unitário*</label>
                                <input type='text' name='precoProduto' id='precoProduto' placeholder= '00,00'>
                            </div>

                            <div class='col-md-3 col-xs-12'>
                                <label for='qtd'>Quantidade*</label>
                                <input type='number' name='qtd' id='qtd' min='1' placeholder= '000'>
                                </div>

                            <div class='col-md-1 col-xs-12'>    
                                <img class='addOnTable' src='{{url("img/icons/addOnTable.png")}}' title='Adicionar' id='addOnTable-product'>
                            </div>

                        </div>

                    </div>

                    <div class='products'> 
                        <div class='cart-table itens' >
                            <div class='cart-table-warp'>
                                @csrf
                                <table id='productTable' class='tablesorter'>
                                <thead>
                                    <tr>
                                        <th class='product-th'>Produto</th>
                                        <th style='visibility: hidden;'></th>
                                        <th class='quy-th' id='none'>Uni</th>
                                        <th style='visibility: hidden;'></th>
                                        <th class='quy-th' id='none'>Qtd</th>
                                        <th style='visibility: hidden;'></th>
                                        <th class='quy-th' id='none'>Valor final</th>
                                        <th style='visibility: hidden;'></th>
                                        <th class='quy-th' id='none'>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody'>
                                    <tr> 
                                        <td class='quy-col'>
                                            <a href='' title='Visualizar produto'>
                                                <div class='pc-title'>
                                                    <h4></h4>
                                                    <p></p>
                                                </div>
                                            </a>
                                        </td>
                                        <td class='quy-col' id='product'><center></center></td>
                                        <td class='quy-col' id='unitary'><center></center></td>
                                        <td class='quy-col' id='quantity'><center></center></td>
                                        <td class='quy-col' id='finalValue'><center></center></td>
                                        <td class='quy-col' id='delete'><center></center></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            <div class='total-cost-free'>
                                <div class='col-md-3 offset-md-9 value' id='productTotal'></div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end products section -->

                <div class='contact-form'> <!-- form footer -->

                    <div class='row'> . </div>                
                    <div class='row justify-content-end'> <!-- form footer -->

                        <div class='contact-form'> 
                            <a onclick='window.history.back()' class='site-btn sb-dark' id='white'>Cancelar</a>
                            <button type='submit' class='site-btn'>Salvar</button>
                        </div>
                    
                </div> <!-- end form footer -->
            </form> <!-- end form -->
            </div> <!-- jutify content center --> 
		</div> <!-- container -->
	</section>
    <!-- Suppliers section end -->

    <!-- New client section -->
	<div class='modal fade' id='newClientModal' tabindex='-1' role='dialog' aria-labelledby='newClientModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title' id='newClientModalLabel'>Novo cliente</h5>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
				<form class='contact-form' name='cadastro1' id='cadastro1' method='post' action='{{url("adm/customer")}}'>
					@csrf
					<div class='row'>	
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='nmCliente'>Nome*</label>
								<input type='text' name='nmCliente' id='nmCliente' placeholder='Nome'>
                                <small class='verificar' id='verificarNome'> Por favor, preencha este campo. </small>
							</div>
						</div>
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='telefone'>Telefone*</label>
								<input type='text' name='telefone' id='telefone' placeholder='Telefone'>
                                <small class='verificar' id='verificarTelefone'> Por favor, insira um telefone válido. </small>
							</div>
						</div>
					</div>
					<div class='row justify-content-end'>
						<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Cancelar</button>
						<button type='submit' class='site-btn' id='addClient'>Adicionar</button>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
    
    <script> 
    
        $(document).ready(function(){
            $('#verificarData').hide();
            $('#data').on('blur', function(){verificarData()});
            $('#data').on('mouseleave', function(){verificarData()});
            
            $('#data').on('input', function(){
                verificarData();
            });

            $('#cadastro').on('submit', function(){
                event.preventDefault();
                //alert(verificarData());
                verificarData() ? this.submit() : '';
            });
        });

        function verificarData(){
            document.getElementById('data').style.boxShadow = 'none';
            $('#verificarData').hide();
            
            const data = document.getElementById('data').value;
            const hoje = moment().format('L');

            if(data >= hoje){
                document.getElementById('data').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
                $('#verificarData').show();
                return false;
            }

            if(data < moment().subtract(5, 'years').calendar()){
                document.getElementById('data').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
                document.getElementById('verificarData').innerText = 'O limite de tempo para registrar é de 5 anos';
                $('#verificarData').show();
                return false;
            }

            return true;
        } 

        //PREENCHER INPUTS
		if (document.referrer == 'http://localhost/BicJr/recantodabeleza/laravel/public/adm/attendance/create'){
			/* document.getElementById('data').value = localStorage.getItem('data');
			document.getElementById('inicio').value = localStorage.getItem('inicio');
			document.getElementById('fim').value = localStorage.getItem('fim');
			document.getElementById('cliente').value = localStorage.getItem('cliente'); */
			localStorage.clear();
		}

		function saveData(){
			/* localStorage.setItem('data', $('#data').val());
			localStorage.setItem('inicio', $('#inicio').val());
			localStorage.setItem('fim', $('#fim').val());
			localStorage.setItem('cliente', $('#cliente').val()); */
        }
	</script> 
	<!-- New client section end -->
 

@endsection('content')

@section('del') attendance @endsection('del')