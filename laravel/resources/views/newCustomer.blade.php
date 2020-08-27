@extends('templates.adm')

@if(isset($cust)) 
	@section('title') Editar Cliente @endsection('title')
	@section('icon') <img src='{{url("/img/icons/editClient-light.png")}}' width='35px'> @endsection('icon')
@else
	@section('title') Novo Cliente @endsection('title')
	@section('icon') <img src='{{url("/img/icons/newClient-light.png")}}' width='35px'> @endsection('icon')
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
				@if(isset($cust)) 
					<form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/customer/$cust->cdCliente")}}' enctype='multipart/form-data'>
					@method('PUT')				
				@else
					<form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/customer")}}' enctype='multipart/form-data'>
				@endif
					@csrf
					<div class='cf-title'><h4>Dados pessoais</h4></div>

					<div class='row'> <!-- grupo de inputs referente aos dados pessoais -->

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='nmCliente'>Nome completo*</label>
								<input type='text' name='nmCliente' id='nmCliente' placeholder='Nome' value='{{$cust->nmCliente ?? old("nmCliente")}}' autofocus>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<div class='border'>
									<label for='sexo'>Sexo</label>
									<div id='customRadio'>
									@if(isset($cust))
										@switch($cust->sexo) 
											@case ("Feminino")
											<div class='custom-control custom-radio custom-control-inline'>
												<input type='radio' class='custom-control-input' name='sexo' id='feminino' value='Feminino' checked="yes">
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
												@break
											@case ("Masculino")
											<div class='custom-control custom-radio custom-control-inline'>
												<input type='radio' class='custom-control-input' name='sexo' id='feminino' value='Feminino' >
												<label class='custom-control-label' for='feminino'>Feminino</label>
											</div>
											<div class='custom-control custom-radio custom-control-inline'>
												<input type='radio' class='custom-control-input' name='sexo' id='masculino' value='Masculino' checked="yes">
												<label class='custom-control-label' for='masculino'>Masculino</label>
											</div>
											<div class='custom-control custom-radio custom-control-inline'>
												<input type='radio' class='custom-control-input' name='sexo' id='outro' value='Outro' >
												<label class='custom-control-label' for='outro'>Outro</label>
											</div>
												@break
											@case ("Outro")
											<div class='custom-control custom-radio custom-control-inline'>
												<input type='radio' class='custom-control-input' name='sexo' id='feminino' value='Feminino' >
												<label class='custom-control-label' for='feminino'>Feminino</label>
											</div>
											<div class='custom-control custom-radio custom-control-inline'>
												<input type='radio' class='custom-control-input' name='sexo' id='masculino' value='Masculino' >
												<label class='custom-control-label' for='masculino'>Masculino</label>
											</div>
											<div class='custom-control custom-radio custom-control-inline'>
												<input type='radio' class='custom-control-input' name='sexo' id='outro' value='Outro' checked="yes">
												<label class='custom-control-label' for='outro'>Outro</label>
											</div>
												@break												
									@endswitch
								@else
									<div class='custom-control custom-radio custom-control-inline'>
										<input type='radio' class='custom-control-input' name='sexo' id='feminino' value='Feminino' >
										<label class='custom-control-label' for='feminino'>Feminino</label>
									</div>
									<div class='custom-control custom-radio custom-control-inline'>
										<input type='radio' class='custom-control-input' name='sexo' id='masculino' value='Masculino' >
										<label class='custom-control-label' for='masculino'>Masculino</label>
									</div>
									<div class='custom-control custom-radio custom-control-inline'>
										<input type='radio' class='custom-control-input' name='sexo' id='outro' value='Outro'>
										<label class='custom-control-label' for='outro'>Outro</label>
									</div>
								@endif
									</div>						
								</div>
							</div>
						</div> 

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='telefone'>Telefone*</label>
								<input type='text' name='telefone' id='telefone' placeholder='(00) 00000-0000' value='{{$cust->telefone ?? old("telefone")}}'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='dtNasc'>Data de nascimento</label>
								<input type='text' name='dtNasc' id='dtNasc' placeholder='00/00/00' @if(isset($cust)) value='{{$cust->dtNasc()}}' @endif >
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='rg'>RG*</label>
								<input type='text' name='rg' id='rg' value='{{$cust->rg ?? old("rg")}}'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<label for='email'>Email*</label>
							<input type='email' name='email' id='email' placeholder='E-mail' value='{{$cust->email ?? old("email")}}' autocomplete='off'>
						</div>

						@if(!isset($cust))
						<div class='col-md-6 col-xs-12'>
							<label for='senha'>Senha*</label>
							<input type='password' name='senha' id='senha'>
							<small class='form-text text-muted'>
							Sua senha deve ter no mínimo seis caracteres.
							</small>
						</div>

						<div class='col-md-6 col-xs-12'>
							<label for='senha2'>Confirmar senha*</label>
							<input type='password' name='senha2' id='senha2' oninput='verificarSenha()' >
							<small id='verificar'>
								As senhas não conferem.
							</small>
						</div>

						<div class="col-md-12 col-xs-12">
							<div class="form-group">
								<label for="foto">Foto</label>
								<input class="form-control" id="foto" name="foto" type="file" value='' accept="image/png, image/jpeg">
							</div>
						</div>
						@else
						<div>
							<input type='hidden' name='senha' id='senha' value='{{$cust->senha}}' readonly>
						</div>
						<div class='col-md-6 col-xs-12'>
							<label for='senha2'>Confirmar senha*</label>
							<input type='password' name='senha2' id='senha2' oninput='verificarSenha()' >
							<small id='verificar'>
								As senhas não conferem.
							</small>
							@if(isset($cust))
								<small class='form-text text-muted'>
									Sua senha atual.
								</small>
							@endif
						</div>

						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="foto">Foto</label>
								<input class="form-control" id="foto" name="foto" type="file" value='{{$cust->foto ?? "" }}' accept="image/png, image/jpeg">
							</div>
						</div>

						@endif
					</div>
													
					<hr>
					
					<div class='cf-title'><h4>Endereço</h4></div>

					<div class='row'>  <!-- grupo de inputs referente aos dados de endereço -->
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='cep'>CEP</label>
								<input type='text' name='cep' id='cep' placeholder='00000-000' value='{{$cust->cep ?? old("cep")}}'>
								<small  class='form-text text-muted'>
									Não sabe seu CEP? <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target='_blank'> Clique aqui. </a>
								</small>
							</div>
						</div>
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='rua'>Rua*</label>
								<input type='text' name='rua' id='rua' value='{{$cust->rua ?? old("rua")}}'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='bairro'>Bairro*</label>
								<input type='text' name='bairro' id='bairro' value='{{$cust->bairro ?? old("bairro")}}'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='cidade'>Cidade*</label>
								<input type='text' name='cidade' id='cidade' value='{{$cust->cidade ?? old("cidade")}}'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='numero'>Número*</label>
								<input type='text' name='numero' id='numero' value='{{$cust->numero ?? old("numero")}}'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='complemento'>Complemento</label>
								<input type='text' name='complemento' id='complemento' placeholder='Ex.: Apartamento' value='{{$cust->complemento ?? old("complemento")}}'>
							</div>
						</div>
					</div>
										
					<div class='col-md-12'>
						<div class='row'><p><br></p></div>
						<div class='row justify-content-end'>
							<a onClick='confirmarCancelar();' class='site-btn sb-dark' id='white'>Cancelar</a>
							<button class='site-btn'>Salvar</button>	
						</div>
						<div class='row'><p><br></p></div>
					</div>
				</form>
			</div>	
		</div>
	</section>
	<!-- Contact section end -->

	<script>
		if (document.referrer == 'http://localhost/BicJr/recantodabeleza/laravel/public/adm/custloyee/create'){
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
			localStorage.setItem('nmCliente', $('#nmCliente').val());
			localStorage.setItem('telefone', $('#telefone').val());
			localStorage.setItem('dtNasc', $('#dtNasc').val());
			localStorage.setItem('rg', $('#rg').val());
			localStorage.setItem('email', $('#email').val());
			localStorage.setItem('cep', $('#cep').val());
			localStorage.setItem('bairro', $('#bairro').val());
			localStorage.setItem('rua', $('#rua').val());
			localStorage.setItem('cidade', $('#cidade').val());
			localStorage.setItem('numero', $('#numero').val());
			localStorage.setItem('complemento', $('#complemento').val());
			localStorage.setItem('foto', $('#foto').val());
		}
	</script>
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
					<h5>Deseja voltar para a tabela de clientes?</h5>
					Os novos dados inseridos serão perdidos.
				</div>
				<div class='modal-footer'>
					<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Cancelar</button>
					<a href='{{url("adm/custloyee")}}' class='site-btn' id='white'>Confirmar</a>
				</div>
			</div>
		</div>
	</div>

	<script> 
        window.confirmarCancelar = function(){
            if(verificarCampos()){
                $('#confirmCancelModal').modal();
                $('confirmar').on('click', function(){
                    window.location.href= '{{url("/adm/customer")}}';
                });
            } else {
                window.location.href= '{{url("/adm/customer")}}';
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

    </script>
	<!-- Confirm cancel section end -->

@endsection('content')