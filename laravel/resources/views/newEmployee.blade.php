@extends('templates.adm')

@if(isset($emp)) 
	@section('title') Editar Funcionário @endsection('title')
	@section('icon') <img src='{{url("/img/icons/editEmployee-light.png")}}' width='35px'> @endsection('icon')
@else
	@section('title') Adicionar Funcionário @endsection('title')
	@section('icon') <img src='{{url("/img/icons/newEmployee-light.png")}}' width='35px'> @endsection('icon')
@endif

@section('content') 

<!-- Contact section -->
<section class='contact-section'>
		<div class='container'>
			@if(isset($errors) && count($errors) > 0) 
				@foreach($errors->all() as $error)
					@if(strpos($error, "CPF") !== false)
						O CPF que você inseriu já foi cadastrado no sistema.
					@endif				
				@endforeach
			@endif
			
			<div class='col-lg-10 offset-md-1'>
				@if(isset($emp)) 
					<form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/employee/$emp->cdFuncionario")}}'>
					@method('PUT')				
				@else
					<form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/employee")}}'>
				@endif
					@csrf
					<div class='cf-title'><h4>Dados pessoais</h4></div>
					
					<div class='row'> <!-- grupo de inputs referente aos dados pessoais -->
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='nome'>Nome completo*</label>
								<input type='text' name='nome' id='nome' placeholder='Nome' value='{{$emp->nmFuncionario ?? old("nome")}}' autofocus>
							</div>
						</div>
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<div class='border'>
									<label for='sexo'>Sexo</label>
									<div id='customRadio'>
										<div class='custom-control custom-radio custom-control-inline'>
											<input type='radio' class='custom-control-input' name='sexo' id='feminino' value='Feminino' >
											<label class='custom-control-label' for='feminino'>Feminino</label>
										</div>
										<div class='custom-control custom-radio custom-control-inline'>
											<input type='radio' class='custom-control-input' name='sexo' id='masculino' value='Masculino' >
											<label class='custom-control-label' for='masculino'>Masculino</label>
										</div>
										<div class='custom-control custom-radio custom-control-inline'>
											<input type='radio' class='custom-control-input' name='sexo' id='outro' value='Outro' >
											<label class='custom-control-label' for='outro'>Outro</label>
										</div>			
									</div>						
								</div>
							</div> 
						</div>
		
						<div class='col-md-5 col-xs-12'>
							<div class='form-group'>
								<label for='tipo'>Tipo*</label>
								<!-- preenchimento via banco com os tipos de funcionário -->
								<select name='tipo' id='tipo'>
									<option value='0' disable selected>Selecione</option>
                                    @foreach($etypes as $type)
										{{$v = $emp->cdTipoFuncionario ?? 0}}
										@if($type->cdTipoFuncionario == $v)
	                                        <option value='{{$type->cdTipoFuncionario}}' selected>{{$type->nmFuncao}}</option>
										@else
    	                                    <option value='{{$type->cdTipoFuncionario}}'>{{$type->nmFuncao}}</option>
										@endif
                                    @endforeach
								</select>
							</div>
						</div> 

						<div class='col-md-1 col-xs-12'>
							<button type='button' class='plus-btn' data-toggle='modal' data-target='#newTypeModal' tabindex='-1'> + </button>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='telefone'>Telefone*</label>
								<input type='text' name='telefone' id='telefone' placeholder='(00) 00000-0000' value='{{$emp->telefone ?? old("telefone")}}'>
								<small id='verificarTelefone' class='verificar'>
									O telefone que você inseriu é inválido.
								</small>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='dtNasc'>Data de nascimento</label>
								<input type='text' name='dtNasc' id='dtNasc' placeholder='00/00/0000' value='{{$emp->dtNasc ?? old("dtNasc")}}' >
								<small id='verificarDtNasc' class='verificar'>
									A data de nascimento que você inseriu é inválida.
								</small>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='cpf'>CPF*</label>
								<input type='text' name='cpf' id='cpf' value='{{$emp->cpf ?? old("cpf")}}'>
								<small id='verificarCPF' class='verificar'>
									
								</small>
							</div>
						</div>

						<div class='col-md-12 col-xs-12'>
							<label for='email'>Email*</label>
							<input type='email' name='email' id='email' placeholder='E-mail' value='{{$emp->email ?? old("email")}}' autocomplete='off'>
						</div>

						@if(!isset($emp))
						<div class='col-md-6 col-xs-12'>
							<label for='senha'>Senha*</label>
							<input type='password' name='senha' id='senha'>
							<small class='form-text text-muted'>
							Sua senha deve ter no mínimo seis caracteres.
							</small>
						</div>
						@else 
						<div class='col-md-6 col-xs-12'>
							<input type='hidden' name='senha' id='senha' value='{{$emp->senha}}' readonly>
						</div>
						@endif
						<div class='col-md-6 col-xs-12'>
							<label for='senha2'>Confirmar senha*</label>
							<input type='password' name='senha2' id='senha2' >
							<small id='verificarSenha' class='verificar'>
								As senhas não conferem.
							</small>
							@if(isset($emp))
								<small class='form-text text-muted'>
									Sua senha atual.
								</small>
							@endif
						</div>


					</div>
													
					<hr>
					
					<div class='cf-title'><h4>Endereço</h4></div>

					<div class='row'>  <!-- grupo de inputs referente aos dados de endereço -->
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='cep'>CEP*</label>
								<input type='text' name='cep' id='cep' placeholder='00000-000' value='{{$emp->cep ?? old("cep")}}'>
								<small id='verificarCEP' class='verificar'>
									CEP não encontrado.
								</small>
								<small  class='form-text text-muted'>
									Não sabe seu CEP? <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target='_blank'> Clique aqui. </a>
								</small>
							</div>
						</div>
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='rua'>Rua*</label>
								<input type='text' name='rua' id='rua' value='{{$emp->rua ?? old("rua")}}' readonly>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='bairro'>Bairro*</label>
								<input type='text' name='bairro' id='bairro' value='{{$emp->bairro ?? old("bairro")}}' readonly>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='cidade'>Cidade*</label>
								<input type='text' name='cidade' id='cidade' value='{{$emp->cidade ?? old("cidade")}}' readonly>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='numero'>Número*</label>
								<input type='text' name='numero' id='numero' value='{{$emp->numero ?? old("numero")}}'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='complemento'>Complemento</label>
								<input type='text' name='complemento' id='complemento' placeholder='Ex.: Apartamento' value='{{$emp->complemento ?? old("complemento")}}'>
							</div>
						</div>
					</div>
										
					<div class='col-md-12'>
						<div class='row'><p><br></p></div>
						<div class='row justify-content-end'>
							<a onclick='confirmarCancelar();' class='site-btn sb-dark' id='white'>Cancelar</a>
							<button class='site-btn'>Salvar</button>	
						</div>
						<div class='row'><p><br></p></div>
					</div>
				</form>
			</div>	
		</div>
	</section>
	<!-- Contact section end -->

	<!-- New type section -->
	<div class='modal fade' id='newTypeModal' tabindex='-1' role='dialog' aria-labelledby='newTypeModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title' id='newTypeModalLabel'>Novo tipo de funcionário</h5>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
				<form class='contact-form' name='cadastro1' id='cadastro1' method='post' action='{{url("adm/employeeType")}}'>
					@csrf
					<div class='row'>	
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='nomeFuncao'>Função*</label>
								<input type='text' name='nomeFuncao' id='nomeFuncao' placeholder='Nome'>
							</div>
						</div>
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='salarioBase'>Salário Base*</label>
								<input type='text' name='salarioBase' id='salarioBase' placeholder='00 000,00'>
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
	<!-- New type section end -->
	

	<!-- Confirm cancel section -->
	<div class='modal fade' id='confirmCancelModal' tabindex='-1' role='dialog' aria-labelledby='confirmCancelLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content'>
				<div class='modal-header'>
					<h5 class='modal-title' id='confirmCancelLabel'>Confirmar</h5>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button>
				</div>
				<div class='modal-body'>
					<h5>Deseja voltar para a tabela de funcionários?</h5>
					Os novos dados inseridos serão perdidos.
				</div>
				<div class='modal-footer'>
					<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Não</button>
					<a href='{{url("adm/employee")}}' class='site-btn' id='white'>Sim</a>
				</div>
			</div>
		</div>
	</div>

	<script>   

		window.confirmarCancelar = function(){
            if(verificarCampos()){
                $('#confirmCancelModal').modal();
                $('confirmar').on('click', function(){
                    window.location.href= '{{url("/adm/employee")}}';
                });
            } else {
                window.location.href= '{{url("/adm/employee")}}';
            }  
        }

        function verificarCampos(){
            if ($('#nome').val() == '' && $('#telefone').val() == '' && $('#cpf').val() == '' && 
                $('#email').val() == '' && $('#senha').val() == '' && $('#rua').val() == '' && 
                $('#bairro').val() == '' && $('#cidade').val() == '' && $('#numero').val() == '' &&
                $('#complemento').val() == '' && $('#cep').val() == '' && $('#dtNasc').val() == '')
            {
                return false;
            }
            return true;
        }

		if (document.referrer == 'http://localhost/BicJr/recantodabeleza/laravel/public/adm/employee/create'){
			document.getElementById('nome').value = localStorage.getItem('nome');
			document.getElementById('telefone').value = localStorage.getItem('telefone');
			document.getElementById('dtNasc').value = localStorage.getItem('dtNasc');
			document.getElementById('cpf').value = localStorage.getItem('cpf');
			document.getElementById('email').value = localStorage.getItem('email');
			document.getElementById('cep').value = localStorage.getItem('cep');
			document.getElementById('bairro').value = localStorage.getItem('bairro');
			document.getElementById('rua').value = localStorage.getItem('rua');
			document.getElementById('cidade').value = localStorage.getItem('cidade');
			document.getElementById('numero').value = localStorage.getItem('numero');
			document.getElementById('complemento').value = localStorage.getItem('comp');
			localStorage.clear();
		}

		function saveData(){
			localStorage.clear();
			localStorage.setItem('nome', $('#nome').val());
			localStorage.setItem('telefone', $('#telefone').val());
			localStorage.setItem('dtNasc', $('#dtNasc').val());
			localStorage.setItem('cpf', $('#cpf').val());
			localStorage.setItem('email', $('#email').val());
			localStorage.setItem('cep', $('#cep').val());
			localStorage.setItem('bairro', $('#bairro').val());
			localStorage.setItem('rua', $('#rua').val());
			localStorage.setItem('cidade', $('#cidade').val());
			localStorage.setItem('numero', $('#numero').val());
			localStorage.setItem('comp', $('#complemento').val());
		}

    </script>
	<!-- Confirm cancel section end -->

@endsection('content')