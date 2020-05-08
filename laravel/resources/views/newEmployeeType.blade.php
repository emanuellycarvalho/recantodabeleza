@extends('templates.adm')

@if(isset($etype)) 
	@section('title') Editar Tipo de Funcionário @endsection('title')
	@section('icon') <img src='{{url("/img/icons/editEmployeeType-light.png")}}' width='35px'> @endsection('icon')
@else
	@section('title') Novo Tipo de Funcionário @endsection('title')
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
                            <label for='nmFuncao'>Função*</label>
                            <input type='text' name='nmFuncao' id='nmFuncao' placeholder='Nome' value='{{$etype->nmFuncao ?? "" }}'>
                        </div>
                    </div>
                    
                    <div class='col-md-6 col-xs-12'>
                        <div class='form-group'>
                            <label for='salarioBase'>Salário Base*</label>
                            <input type='text' name='salarioBase' id='salarioBase' placeholder='R$ 0 000,00' @if(isset($etype)) value='{{$etype->salarioBase()}}' @endif>
                        </div>
                    </div>
					<div class='row justify-content-end'>
						<a href='{{url("adm/employeeType")}}' class='site-btn sb-dark'>Cancelar</a>
						<button type='submit' class='site-btn'>Salvar</button>
					</div>
				</form>
			</div>	
		</div>
	</section>
	<!-- Contact section end -->
@endsection('content')