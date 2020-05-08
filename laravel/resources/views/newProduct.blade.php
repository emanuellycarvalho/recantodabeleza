@extends('templates.adm')

@if(isset($etype)) 
	@section('title') Editar Produto @endsection('title')
	@section('icon') <img src='{{url("/img/icons/editProduct.png")}}' width='35px'> @endsection('icon')
@else
	@section('title') Novo Produto @endsection('title')
	@section('icon') <img src='{{url("/img/icons/newProduct.png")}}' width='35px'> @endsection('icon')
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
				@if(isset($etype)) 
                <form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/product/$etype->cdProduto")}}' enctype='multiform/form-data'>
					@method('PUT')				
				@else
                <form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/product")}}' enctype='multiform/form-data'>
				@endif
					@csrf
					<div class='row'>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='nmProduto'>Nome*</label>
								<input type='text' name='nmProduto' id='nmProduto' placeholder='Nome' value='{{$etype->nmProduto ?? "" }}'>
							</div>
						</div>
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='marca'>Marca*</label>
								<input type='text' name='marca' id='marca' placeholder='Marca'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='preco'>Preço*</label>
								<input type='text' name='preco' id='preco' placeholder='R$ 0 000,00'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='qtd'>Estoque*</label>
								<input type='number' name='qtd' id='qtd' placeholder='Quantidade em estoque'>
							</div>
						</div>

					</div>

					<div class='row'>

						<div class='col-md-12 col-xs-12'>
							<div class='form-group'>
								<label for='desc'>Descrição</label>
								<textarea name='desc' id='desc' placeholder='Descrição do produto para o cliente'></textarea>
							</div>
						</div>

					</div>

					<div class='row'>

						<div class='col-md-12 col-xs-12'>
							<div class='form-group'>
								<label for='foto'>Foto</label>
								<textarea name='foto' id='foto' ></textarea>
							</div>
						</div>

					</div>

					<div class='row'>
					</div>

					<div class='row justify-content-end'>
						<a href='{{url("adm/product")}}' class='site-btn sb-dark'>Cancelar</a>
						<button type='submit' class='site-btn'>Salvar</button>
					</div>
				</form>
			</div>	
		</div>
	</section>
	<!-- Contact section end -->
@endsection('content')