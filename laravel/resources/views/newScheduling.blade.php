@extends('templates.adm')

@if(isset($scd)) 
	@section('title') Editar Agendamento @endsection('title')
@else
    @section('title') Criar Agendamento @endsection('title')
@endif

@section('icon') <img class='responsive' src='{{url("/img/icons/scheduling-light.png")}}' width='35px'> @endsection('icon')

@section('content')

<script src='{{url("assets/js/scheduling.js")}}'></script>

    <!-- Suppliers section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
                <div class='col-lg-8'>
                </div>
                <div class='col-lg-6'>
                @if(isset($scd)) 
					<form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/scheduling/$scd->cdAgendamento")}}'>
                    
					@method('PUT')
                @else
                    <form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/scheduling")}}' enctype='multiform/form-data'>
                @endif
                        @csrf
                        <div class='row'>

                            <div class='col-md-4 col-xs-12'>
                                <div class='form-group'>
                                    <input type='hidden' name='hoje' id='hoje' value= '@php echo date("Y-m-d") @endphp'>
                                    <input type='hidden' name='servicos' id='servicos'>
                                    <input type='hidden' name='funcionarios' id='funcionarios'>
                                    <label for='data'>Data*</label> <br>
                                    <input type='text' name='data' id='data'  value='{{$date ?? "" }}' autofocus> 
                                </div>
                            </div>  
                            
                            <div class='col-md-4 col-xs-12'>
                                <div class='form-group'>
                                    <label for='inicio'>Início*</label>
                                    <input type='time' name='inicio' id='inicio' class='time' value='{{$start ?? ""}}'>
                                </div>
                            </div>

                            <div class='col-md-4 col-xs-12'>
                                <div class='form-group'>
                                    <label for='fim'>Fim</label>
                                    <input type='time' name='fim' id='fim' class='time' value='{{$end ?? ""}}'>
                                </div>
                            </div>
                        </div>

                        <div class='col-md-8 offset-md-4'> <div class='validar' id='validarHora'></div></div> 

                        <div class='row'> 
                            <div class='col-md-10 col-xs-12'>
                                <div class='form-group'>
                                    <label for='cliente'>Cliente*</label>
                                    <select name='cliente' id='cliente'>
                                        <option value='0' disabled selected> Selecione um cliente </option>
                                            @foreach($clients as $cli)
                                                @if(isset($scd->cdCliente) && $cli->cdCliente == $scd->cdCliente)
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

                        <div id='services'>
                        
                            <div class='col-md-12 col-xs-12'>
                                <div class='cf-title'><h4>Serviços</h4></div>
                                <hr class='pink'>
                            </div>

                            <div class='text-center mb-5 alert-danger' id='service_error'>
                            </div>

                            <div class='row'> 

                                <div class='col-md-4 col-xs-12'>
                                    <label for='select_service'>Serviço*</label>
                                    <select name='select_service[]' id='select_service'>
                                        <option value='0' disabled selected> Selecione um serviço por vez </option>
                                        @foreach($services as $svc)
                                            <script>
                                                var values = [];
                                                if(sessionStorage.getItem('values') != null){
                                                    values = sessionStorage.getItem('values');
                                                }
                                                var val = values + '{{$svc->valorServico}}';
                                                values[{{$svc->cdServico}}] = val;
                                                sessionStorage.setItem('values', values);
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
                                    <!--
                                    <input type='text' name='funcionario' id='funcionario' placeholder='Selecione um funcionario'>
                                        --> 
                                    <select name='select_employee' id='select_employee'>
                                        <option value='0' disabled selected> Selecione um funcionário </option>
                                        @foreach($employees as $emp) 
                                           <option value='{{$emp->cdFuncionario}}'> {{$emp->nmFuncionario}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class='col-md-3 col-xs-12'>
                                    <label for='valor'>Valor</label>
                                    <input name='valor[]' placeholder='00,00'>
                                </div>

                                <div class='col-md-1 col-xs-12'>    
                                    <img class='addOnTable' src='{{url("img/icons/addOnTable.png")}}' title='Adicionar' id='addOnTable'>
                                </div>

                            </div>

                        </div>

                        <div class='services'>

                        </div>

                        <div class='row'>
                            <div class='col-md-3 col-xs-12 offset-md-8'>
                                <div class='form-group'>
                                    <input name='total' id='total' placeholder='Total' value='0' readonly>
                                </div>
                            </div>
                        </div>

                        <div class='row justify-content-end'>
                            <a onclick='window.history.back()' class='site-btn sb-dark' id='white'>{{$back}}</a>
                            <button type='submit' class='site-btn'>Salvar</button>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</section>
    <!-- Suppliers section end -->

    @if(isset($rel))
        <script>
            @foreach($rel as $r) 
                createFields({id: {{$r->cdFuncionario}}, name: '{{$r->nmFuncionario}}'}, {id: {{$r->cdServico}}, name: '{{$r->nmServico}}'});
            @endforeach
        </script>
   @endif

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
							</div>
						</div>
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='telefone'>Telefone*</label>
								<input type='text' name='telefone' id='telefone' placeholder='Telefone'>
							</div>
						</div>
					</div>
					<div class='row justify-content-end'>
						<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Cancelar</button>
						<button type='submit' class='site-btn' onclick='saveData()'>Adicionar</button>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
    
	<script>
/*     select `TbFuncionario`.*, `tbFuncionarioServico`.`cdServico` as `pivot_cdServico`, 
    `tbFuncionarioServico`.`cdFuncionario` as `pivot_cdFuncionario`, 
    `tbFuncionarioServico`.`created_at` as `pivot_created_at`, 
    `tbFuncionarioServico`.`updated_at` as `pivot_updated_at` 
    from `TbFuncionario` inner join `tbFuncionarioServico` 
    on `TbFuncionario`.`id` = `tbFuncionarioServico`.`cdFuncionario` 
    where `tbFuncionarioServico`.`cdServico` is null */

    $(document).ready(function(){
        //N PRA M DE FUNCIONARIO SERVIÇO
        $('#select_service').on('change', function(event){
            const cdServico = $(this).val();
            $.ajax({
                url: '{{route("getESRelationship")}}',
                method:'GET',
                data:{id: cdServico},
                dataType:'json',
                success:function(data)
                {
                alert('foi');
                }
            });
        });
    });
        //PREENCHER INPUTS
		if (document.referrer == 'http://localhost/BicJr/recantodabeleza/laravel/public/adm/scheduling/create'){
			document.getElementById('data').value = localStorage.getItem('data');
			document.getElementById('inicio').value = localStorage.getItem('inicio');
			document.getElementById('fim').value = localStorage.getItem('fim');
			document.getElementById('cliente').value = localStorage.getItem('cliente');
			localStorage.clear();
		}

		function saveData(){
			localStorage.setItem('data', $('#data').val());
			localStorage.setItem('inicio', $('#inicio').val());
			localStorage.setItem('fim', $('#fim').val());
			localStorage.setItem('cliente', $('#cliente').val());
        }
	</script> 
	<!-- New client section end -->


@endsection('content')

@section('del') scheduling @endsection('del')