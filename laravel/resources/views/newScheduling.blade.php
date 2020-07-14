@extends('templates.adm')

@section('title') Agendamento @endsection('title')

@section('icon') <img class='responsive' src='{{url("/img/icons/scheduling-light.png")}}' width='35px'> @endsection('icon')

@section('content')
<script src='{{url("/assets/fullcalendar/daygrid/main.js")}}'></script>
<script src='{{url("/assets/fullcalendar/core/main.js")}}'></script>
<script src='{{url("/assets/fullcalendar/core/locales-all.js")}}'></script>
<script src='{{url("/assets/js/fullcalendar.js")}}'></script>
<script> 
    var emps = "0-Selecione um funcionario;";
    sessionStorage.setItem('emps', emps);
</script>

    <!-- Suppliers section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
                <div class='col-lg-8'>
                    <div class='text-center mb-5 alert-danger'>
                        @if(isset($errors) && count($errors) > 0) 
                            @foreach($errors->all() as $error)
                                {{$error}} <br>							
                            @endforeach
                        @endif
                        @if(isset($errorCEP)) 
                            {{$errorCEP}}
                        @endif
                    </div>
                </div>
                <div class='col-lg-6'>
                    <form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/scheduling")}}' enctype='multiform/form-data'>
                        @csrf
                        <div class='row'>

                            <div class='col-md-4 col-xs-12'>
                                <div class='form-group'>
                                    <input type='hidden' name='hoje' id='hoje' value= '@php echo date("Y-m-d") @endphp'>
                                    <input type='hidden' name='servicos' id='servicos'>
                                    <input type='hidden' name='funcionarios' id='funcionarios'>
                                    <label for='data'>Data*</label> <br>
                                    <input type='text' name='data' id='data' class='calendar' value='{{$att->date ?? date("d/m/Y")}}' autofocus> 
                                    <small> Calendário </small>
                                </div>
                            </div> 
                            
                            <div class='col-md-4 col-xs-12'>
                                <div class='form-group'>
                                    <label for='inicio'>Início*</label>
                                    <input type='time' name='inicio' id='inicio'>
                                </div>
                            </div>

                            <div class='col-md-4 col-xs-12'>
                                <div class='form-group'>
                                    <label for='fim'>Fim</label>
                                    <input type='time' name='fim' id='fim'>
                                </div>
                            </div>

                            <div class='col-md-10 col-xs-12'>
                                <div class='form-group'>
                                    <label for='cliente'>Cliente*</label>
                                    <select name='cliente' id='cliente'>
                                        <option value='0' disabled selected> Selecione um cliente </option>
                                            @foreach($clients as $cli)
                                                <option value='{{$cli->cdCliente}}'> {{$cli->telefone}} | {{$cli->nmCliente}} </option>
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

                            <div class='row'>

                                <div class='col-md-5 col-xs-12'>
                                    <div class='form-group'>
                                        <label for='servico1'>Servico*</label>
                                        <select name='servico1' id='servico1'>
                                            <option value='0' disabled selected> Selecione um serviço por vez </option>
                                            <option value='2'> Massagem capilar </option>
                                            <option value='1'> Massagem corporal </option>
                                            <option value='3'> Desing de sobrancelhas </option>
                                            <option value='4'> Manicure </option>
                                            <option value='5'> Pedicure </option>
                                        </select>
                                    </div>
                                </div>

                                <div class='col-md-5 col-xs-12'>
                                    <div class='form-group'>
                                        <label for='funcionario1'>Funcionário*</label>
                                        <!--
                                        <input type='text' name='funcionario' id='funcionario' placeholder='Selecione um funcionario'>
                                         -->
                                        <select name='funcionario1' id='funcionario1'>
                                            <option value='0' disabled selected> Selecione um funcionário </option>
                                            @foreach($employees as $emp) 
                                                @if($emp->cdTipoFuncionario == $id)
                                                    <script> 
                                                        var emps = sessionStorage.getItem('emps');
                                                        emps += '{{$emp->cdFuncionario}}-{{$emp->nmFuncionario}};';
                                                        sessionStorage.setItem('emps', emps);
                                                    </script>
                                                    <option value='{{$emp->cdFuncionario}}'> {{$emp->nmFuncionario}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class='col-md-2 col-xs-12'>    
                                    <img class='addOnTable' src='{{url("img/icons/addOnTable.png")}}' title='Adicionar' id='addOnTable'>
                                </div>

                            </div>

                        </div>

                        <div class='row'>
                        </div>

                        <div class='row justify-content-end'>
                            <a onClick='confirmarCancelar();' class='site-btn sb-dark' id='white'>Cancelar</a>
                            <button type='submit' class='site-btn'>Salvar</button>
                        </div>
                    </form>
                </div>
			</div>
		</div>
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
				<form class='contact-form' name='cadastroClienteSimples' id='cadastroClienteSimples' method='post' action='{{url("adm/client")}}'>
					@csrf
					<div class='row'>	
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='nome'>Nome*</label>
								<input type='text' name='nome' id='nome' placeholder='Nome'>
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
        //PREENCHER INPUTS
		if (document.referrer == 'http://localhost/BicJr/recantodabeleza/laravel/public/adm/employee/create'){
			document.getElementById('data').value = localStorage.getItem('data');
			document.getElementById('inicio').value = localStorage.getItem('inicio');
			document.getElementById('fim').value = localStorage.getItem('fim');
			document.getElementById('cliente').value = localStorage.getItem('cliente');
			//document.getElementById('servico').value = localStorage.getItem('servico');
			//document.getElementById('funcionario').value = localStorage.getItem('funcionario');
			localStorage.clear();
		}

		function saveData(){
			localStorage.setItem('data', $('#data').val());
			localStorage.setItem('inicio', $('#inicio').val());
			localStorage.setItem('fim', $('#fim').val());
			localStorage.setItem('cliente', $('#cliente').val());
			//localStorage.setItem('servico', $('#servico').val());
			//localStorage.setItem('funcionario', $('#funcionario').val());
		}
	</script>
	<!-- New client section end -->


@endsection('content')

@section('del') scheduling @endsection('del')