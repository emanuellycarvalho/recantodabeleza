@extends('templates.adm')

@if(isset($supplier)) 
	@section('title') Editar Fornecedor @endsection('title')
	@section('icon') <img src='{{url("/img/icons/editSupplier-light.png")}}' width='35px'> @endsection('icon')
@else
	@section('title') Novo Fornecedor @endsection('title')
	@section('icon') <img src='{{url("/img/icons/newSupplier-light.png")}}' width='35px'> @endsection('icon')
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
				</div>
				@if(isset($supplier)) 
					<form class='contact-form' name='cadastroPessoa' method='post' action='{{url("adm/supplier/$supplier->cdFornecedor")}}'>
					@method('PUT')				
				@else
					<form class='contact-form' name='cadastroPessoa' method='post' action='{{url("adm/supplier")}}'>
				@endif
					@csrf
					<div class='row'>
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='nmFornecedor'>Nome*</label>
								<input required type='text' name='nmFornecedor' id='nmFornecedor' placeholder='Nome' value='{{$supplier->nmFornecedor ?? ""}}'>
							</div>
						</div>
						

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='telefone'>Telefone*</label>
								<input required type='text' name='telefone' id='telefone' value='{{$supplier->telefone ?? ""}}' placeholder='(00) 00000-0000'>
							</div>
						</div>
                    </div>

                    <div class='row'>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='cnpj'>CNPJ*</label>
								<input required type='text' name='cnpj' value='{{$supplier->cnpj ?? ""}}' id='cnpj'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<label for='email'>Email*</label>
							<input required type='email' name='email' id='email' value='{{$supplier->email ?? ""}}' placeholder='E-mail'>
						</div>

					</div>
										
					<div class='col-md-12'>
						<div class='row'><p><br></p></div>
						<div class='row justify-content-end'>
							<a href='{{url("adm/supplier")}}' class='site-btn sb-dark'>Cancelar</a>
							<button type='submit' class='site-btn'>Salvar</button>	
						</div>
						<div class='row'><p><br></p></div>
					</div>
				</form>
			</div>	
		</div>
	</section>
	<!-- Contact section end -->

@endsection('content')