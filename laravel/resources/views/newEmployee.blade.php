@extends('templates.adm')

@if(isset($emp)) 
	@section('title') Editar Funcionário @endsection('title')
	@section('icon') <img src='{{url("/img/icons/editEmployee-light.png")}}' width='35px'> @endsection('icon')
@else
	@section('title') Novo Funcionário @endsection('title')
	@section('icon') <img src='{{url("/img/icons/newEmployee-light.png")}}' width='35px'> @endsection('icon')
@endif

@section('content')

<!-- Contact section -->
<section class='contact-section'>
		<div class='container'>
			<div class='col-lg-10 offset-md-1'>
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
								<label for='nmFunc'>Nome completo*</label>
								<input type='text' name='nmFunc' id='nmFunc' placeholder='Nome' value='{{$emp->nmFuncionario ?? ""}}'>
							</div>
						</div>
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<div class='border'>
									<label for='sexo'>Sexo</label>
									<div class='cf-radio-btns address-rb'> 
										<!-- tirar 'address-rb' pra colocar um por linha -->
										<div class='col-md-12'>
											<div class='cfr-item'>
												<input type='radio' name='sexo' id='feminino' value='Feminino'>
												<label for='feminino'>Feminino</label>
											</div>
											<div class='cfr-item'>
												<input type='radio' name='sexo' id='masculino' value='Masculino'>
												<label for='masculino'>Masculino</label>
											</div>
											<div class='cfr-item'>
												<input type='radio' name='sexo' id='outro' value='Outro'>
												<label for='outro'>Outro</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
		
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='sexo'>Tipo</label>
								<!-- preenchimento via banco com os tipos de funcionário -->
								<select name='tipo' id='tipo'>
									<option value='0' disable>Selecione</option>
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

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='telefone'>Telefone*</label>
								<input type='text' name='telefone' id='telefone' placeholder='(00) 00000-0000' value='{{$emp->telefone ?? ""}}'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='dtNasc'>Data de nascimento</label>
								<input type='text' name='dtNasc' id='dtNasc' placeholder='00/00/00' value='{{$emp->dtNasc()}}' >
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='cpf'>CPF*</label>
								<input type='text' name='cpf' id='cpf' value='{{$emp->cpf ?? ""}}'>
							</div>
						</div>

						<div class='col-md-12 col-xs-12'>
							<label for='email'>Email*</label>
							<input type='email' name='email' id='email' placeholder='E-mail' value='{{$emp->email ?? ""}}'>
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
							<input type='password' name='senha2' id='senha2'>
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
								<label for='cep'>CEP</label>
								<input type='text' name='cep' id='cep' placeholder='00000-000' value='{{$emp->cep ?? ""}}'>
							</div>
						</div>
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='rua'>Rua</label>
								<input type='text' name='rua' id='rua' value='{{$emp->rua ?? ""}}'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='bairro'>Bairro*</label>
								<input type='text' name='bairro' id='bairro' value='{{$emp->bairro ?? ""}}'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='cidade'>Cidade*</label>
								<input type='text' name='cidade' id='cidade' value='{{$emp->cidade ?? ""}}'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='numero'>Número</label>
								<input type='text' name='numero' id='numero' value='{{$emp->numero ?? ""}}'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='complemento'>Complemento</label>
								<input type='text' name='complemento' id='complemento' placeholder='Ex.: Apartamento' value='{{$emp->complemento ?? ""}}'>
							</div>
						</div>
					</div>
										
					<div class='col-md-12'>
						<div class='row'><p><br></p></div>
						<div class='row justify-content-end'>
							<a href='{{url("adm/employee")}}' class='site-btn sb-dark'>Cancelar</a>
							<button class='site-btn'>Salvar</button>	
						</div>
						<div class='row'><p><br></p></div>
					</div>
				</form>
			</div>	
		</div>
	</section>
	<!-- Contact section end -->

@endsection('content')