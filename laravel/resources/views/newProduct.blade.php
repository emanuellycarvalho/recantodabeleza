@extends('templates.adm')

@if(isset($prod)) 
	@section('title') Editar Produto @endsection('title')
	@section('icon') <img class='responsive' src='{{url("/img/icons/editProduct.png")}}' width='35px'> @endsection('icon')
@else
	@section('title') Adicionar Produto @endsection('title')
	@section('icon') <img class='responsive' src='{{url("/img/icons/newProduct.png")}}' width='35px'> @endsection('icon')
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
				@if(isset($prod)) 
                <form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/product/$prod->cdProduto")}}' enctype='multipart/form-data'>
					@method('PUT')				
				@else
                <form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/product")}}' enctype='multipart/form-data'>
				@endif
					@csrf
					<div class='row'>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='nome'>Nome*</label>
								<input type='text' name='nmProduto' id='nmProduto' placeholder='Nome' value='{{$prod->nmProduto ?? "" }}' autofocus required>
							</div>
						</div>
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='marca'>Marca*</label>
								<input type='text' name='marca' id='marca' placeholder='Marca' value='{{$prod->marca ?? "" }}' required>
							</div>
						</div>

						<div class='col-md-4 col-xs-12'>
							<div class='form-group'>
								<label for='preco'>Preço*</label>
								<input type='text' name='precoProduto' id='precoProduto' placeholder='R$ 0 000,00' oninput='verificarPreco()' value='{{$prod->precoProduto ?? "" }}' required>
								<small id='verificarPreco'>
									Por favor, insira um valor maior ou igual a 1.
								</small>
							</div>
						</div>

                        <div class='col-md-4 col-xs-12'>
							<div class='form-group'>
								<label for='comissao'>Comissão*</label>
								<input type='text' name='comissao' id='comissao' placeholder='00,00%' value='{{$prod->comissao ?? "" }}' required>
							</div>
						</div>

						<div class='col-md-4 col-xs-12'>
							<div class='form-group'>
								<label for='qtd'>Estoque*</label>
								<input type='number' name='qtd' id='qtd' placeholder='Quantidade em estoque' value='{{$prod->qtd ?? "" }}' required>
							</div>
						</div>

					</div>

					<div class='row'>

						<div class='col-md-12 col-xs-12'>
							<div class='form-group'>
								<label for='descricao'>Descrição</label>
								<textarea name='descricao' id='descricao' placeholder='Descrição do produto para o cliente' value='{{$prod->descricao ?? "" }}'></textarea>
							</div>
						</div>

					</div>

					<div class='row'>
						<div class="col-md-12 col-xs-12">
							<div class="form-group">
								<label for="foto">Foto*</label>
								<input class="form-control" id="foto" name="fotoProd" type="file" value='{{$prod->foto ?? ""}}' accept="image/png, image/jpeg">
							</div>			
						</div>

					</div>

					<div class='row justify-content-end'>
						<a onClick='confirmarCancelar();' class='site-btn sb-dark' id='white'>Cancelar</a>
						<button type='submit' class='site-btn'>Salvar</button>
					</div>
				</form>
			</div>	
		</div>
	</section>

	<script> 
        window.confirmarCancelar = function(){
            if(verificarCampos()){
                $('#confirmCancelModal').modal();
                $('confirmar').on('click', function(){
                    window.location.href= '{{url("/adm/product")}}';
                });
            } else {
                window.location.href= '{{url("/adm/product")}}';
            }  
        }

        function verificarCampos(){
			if ($('#nmProduto').val() == '' && $('#marca').val() == '' && $('#preco').val() == '' && 
				$('#qtd').val() == '' && $('#desc').val() == '' && $('#foto').val() == '')
            {
                return false;
            }
            return true;
        }
    </script>
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
					<h5>Deseja voltar para a tabela de produtos?</h5>
					Se confirmar vai perder todos os dados inseridos na tabela.
				</div>
				<div class='modal-footer'>
					<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Cancelar</button>
					<a href='{{url("adm/product")}}' class='site-btn' id='white'>Confirmar</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Confirm cancel section end -->
@endsection('content')