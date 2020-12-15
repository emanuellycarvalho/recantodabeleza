@extends('templates.adm')

@if(isset($etype)) 
	@section('title') Editar Tipo de Funcionário @endsection('title')
	@section('icon') <img src='{{url("/img/icons/editEmployeeType-light.png")}}' width='35px'> @endsection('icon')
@else
	@section('title') Adicionar Tipo de Funcionário @endsection('title')
	@section('icon') <img src='{{url("/img/icons/newEmployeeType-light.png")}}' width='35px'> @endsection('icon')
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
				@if(isset($etype)) 
                <form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/employeeType/$etype->cdTipoFuncionario")}}'>
					@method('PUT')				
				@else
                <form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/employeeType")}}'>
				@endif
					@csrf
                    <div class='col-md-6 col-xs-12'>
                        <div class='form-group'>
                            <label for='nomeFuncao'>Função*</label>
                            <input type='text' name='nomeFuncao' id='nomeFuncao' placeholder='Nome' required value='{{$etype->nmFuncao ?? "" }}' autofocus>
                        </div>
                    </div>
                    
                    <div class='col-md-6 col-xs-12'>
                        <div class='form-group'>
                            <label for='salarioBase'>Salário Base*</label>
                            <input type='text' name='salarioBase' id='salarioBase' placeholder='R$ 0 000,00' required @if(isset($etype)) value='{{$etype->salarioBase()}}' @endif>
                        </div>
                    </div>
					<div class='row justify-content-end'>
						<a onClick='confirmarCancelar()' class='site-btn sb-dark' id='white'>Cancelar</a>
						<button type='submit' class='site-btn'>Salvar</button>
					</div>
				</form>
			</div>	
		</div>
	</section>
	<!-- Contact section end -->

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
					<h5>Deseja voltar para a tabela de tipos?</h5>
					Os novos dados inseridos serão perdidos.
				</div>
				<div class='modal-footer'>
					<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Não</button>
					<a href='{{url("adm/employee")}}' class='site-btn' id='white' name='confirmar'>Sim</a>
				</div>
			</div>
		</div>
	<!-- Confirm cancel section end -->
@endsection('content')