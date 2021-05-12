@extends('templates.adm')

@if(isset($sup)) 
	@section('title') Editar Fornecedor @endsection('title')
	@section('icon') <img src='{{url("/img/icons/editSupplier-light.png")}}' width='35px'> @endsection('icon')
@else
	@section('title') Adicionar Fornecedor @endsection('title')
	@section('icon') <img src='{{url("/img/icons/newSupplier-light.png")}}' width='35px'> @endsection('icon')
@endif 

@section('content')
<script src='{{url("assets/js/product.js")}}'></script>

<!-- Contact section -->
<section class='contact-section'>
		<div class='container'>
			@if(isset($errors) && count($errors) > 0) 
				<div class='row justify-content-center'>
					<div class='text-center mb-1 col-lg-8 alert-danger'>
						Fornecedor não cadastrado por inserção de dados inválidos.	
					</div>
				</div>			
			@endif
			<div class='col-lg-10 offset-md-1'>
				@if(isset($sup)) 
					<form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/supplier/$sup->cdFornecedor")}}'>
					@method('PUT')				
				@else
					<form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/supplier")}}'>
				@endif
					@csrf
					<div class='row'>
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='nome'>Nome*</label>
								<input  type='text' name='nome' id='nome' placeholder='Nome' value='{{$sup->nmFornecedor ?? ""}}' autofocus>
							</div>
						</div>
						

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='telefone'>Telefone*</label>
								<input  type='text' name='telefone' id='telefone' value='{{$sup->telefone ?? ""}}' placeholder='(00) 00000-0000'>
							</div>
						</div>
                    </div>

                    <div class='row'>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='cnpj'>CNPJ*</label>
								<input  type='text' name='cnpj' id='cnpj' value='{{$sup->cnpj ?? ""}}'>
								<small id='verificarCNPJ' class='verificar'>
								</small>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<label for='email'>Email*</label>
							<input  type='email' name='email' id='email' value='{{$sup->email ?? ""}}' placeholder='E-mail'>
							<small id='verificarEmail' class='verificar'>
							</small>
						</div>

					</div>

					<div id='products'>
                        
						<div class='col-md-12 col-xs-12'>
							<div class='cf-title'><h4>Produtos</h4></div>
							<hr class='pink'>
						</div>

						<div class='text-center mb-5 alert-danger' id='product_error'>
						</div>

						<div class='row'>

							<div class='col-md-11 col-xs-12'>
								<label for='select_product'>Produto</label>
								<select name='select_product[]' id='select_product'>
									<option value='0' disabled selected> Selecione um produto por vez </option>
									@foreach($products as $prod)
										<script>
											var values = [];
											if(sessionStorage.getItem('values') != null){
												values = sessionStorage.getItem('values');
											}
											var val = values + '{{$prod->nmProduto}}';
											values[{{$prod->cdProduto}}] = val;
											sessionStorage.setItem('values', values);
										</script> 
										<option value='{{$prod->cdProduto}}'> {{$prod->nmProduto}}</option>
									@endforeach
								</select>
							</div>

							<div class='col-md-1 col-xs-12'>    
								<img class='addOnTable' src='{{url("img/icons/newProduct.png")}}' title='Adicionar' id='addOnTable'>
							</div>

						</div>

					</div>

					<div class='products'>
							@if(isset($rel))
									@foreach ($rel as $r)
									<script type='text/javascript'>
										function createFields(product) {
												var row = $('<div>').addClass('row selected');
												var div = $('<div>').addClass('col-md-11 col-xs-12');
												$('<input>').attr({ name: 'product_id[]', value: product.id, type: 'hidden' }).appendTo(div);
												$('<input>').attr({ name: 'product_name[]', value: product.name, type: 'text', readonly: true }).appendTo(div);
												div.appendTo(row);
												div = $('<div>').addClass('col-md-3 col-xs-12');
											
												div = $('<div>').addClass('col-md-1 col-xs-12');
												$('<img>').attr({class: 'removeFromTable', src: 'http://localhost/BicJr/recantodabeleza/laravel/public/img/icons/deleteproduct.png'}).click(removeItem).appendTo(div);
												div.appendTo(row);
											
												row.prependTo('.products');
												removeOptionsSelected(product.id);
										}

										function removeItem(event) {
											event.preventDefault();
											document.getElementById('product_error').innerHTML="";
											
											//armazena o botão que foi acionado
											const button = $(event.currentTarget);
											
											//pega a div mais perto do botão que foi acionado
											const product_div = button.closest('.selected');
											
											//pega os valores do funcionário e serviço
											const product_id = product_div.find("[name='product_id[]']").val();
											const product_name = product_div.find("[name='product_name[]']").val();
											
											//volta com eles pros primeiros selects
											$('#select_product').append(`<option value="${product_id}">${product_name}</option>`);
											
											//remove a div 
											product_div.remove();
										}

										function removeOptionsSelected(product_id) {
											$('#select_product option[value="' + product_id + '"]').each(function () {
												$(this).remove();
											});
										}
									</script>

									<iframe hidden="true" onload="createFields({id: '{{$r->cdProduto}}', name: '{{$r->nmProduto}}'})"></iframe>
									@endforeach
							@endif
						</div>
										
					<div class='col-md-12'>
						<div class='row'><p><br></p></div>
						<div class='row justify-content-end'>
						<a onClick='confirmarCancelar()' class='site-btn sb-dark' id='white'>Cancelar</a>
							<button type='submit' class='site-btn' onclick='saveData()'>Salvar</button>	
						</div>
						<div class='row'><p><br></p></div>
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
					<h5>Deseja voltar para a tabela de fornecedores?</h5>
					Os novos dados inseridos serão perdidos.
				</div>
				<div class='modal-footer'>
					<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Não</button>
					<a href='{{url("adm/supplier")}}' class='site-btn' id='white'>Sim</a>
				</div>
			</div>
		</div>
	</div>

	<script> 

		$(document).ready(function(){

			//DESABILITA O SUBMIT
			$('#cadastro').submit(function(){
				event.preventDefault();
				var erros = 0;
				$('#cadastro input').each(function(){
					$(this).css('boxShadow') == 'rgba(220, 53, 69, 0.25) 0px 0px 0px 3.2px' ? erros++ : '';
				});
				
				erros == 0 ? this.submit() : '';
			});

			//VERIFICA CNPJ JÁ EXISTENTE
			$('#cnpj').on('blur', function(){
				document.getElementById('cnpj').style.boxShadow = 'none';
				document.getElementById('verificarCNPJ').innerText = '';

				const cnpj = document.getElementById('cnpj').value;

				if(cnpj == null || cnpj == '')
				return;

				if(!validaCPFeCNPJ(cnpj)){
					document.getElementById('cnpj').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
					document.getElementById('verificarCNPJ').innerText = 'O CNPJ que você inseriu é inválido.'
					$('#verificarCNPJ').show();
					return;
				} 

				$.ajax
				({ 
					type: 'GET',
					dataType: 'json',
					url: '{{route("getSuppliersCNPJs")}}',
					success: function (data)
					{
						data.map(function(item){
							if(item.cnpj == cnpj){
								document.getElementById('cnpj').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
								document.getElementById('verificarCNPJ').innerText = 'CNPJ já registrado no sistema.'
								$('#verificarCNPJ').show();
							}
						});
					}
				});
			});

			//VERIFICA EMAIL JÁ EXISTENTE
			$('#email').on('blur', function(event){
				event.preventDefault();
				const email = document.getElementById('email').value;
				
				if(email == null || email == ''){
					$('#verificarEmail').hide();
					return;
				}

				if(document.getElementById('email').style.boxShadow == 'rgba(220, 53, 69, 0.25) 0px 0px 0px 0.2rem')
					$('#verificarEmail').hide();

				$.ajax
				({ 
					type: 'GET',
					dataType: 'json',
					url: '{{route("getSuppliersEmails")}}',
					success: function (data)
					{
						var x = true;
						data.map(function(item){
							if(item.email == email){
								x = false;
								document.getElementById('email').style.boxShadow = '0 0 0 0.2rem rgba(220, 53, 69, 0.25)';
								document.getElementById('verificarEmail').innerText = 'Email já registrado no sistema.'
								$('#verificarEmail').show();
							}
						});
					}
				});
			});
		});
		
        window.confirmarCancelar = function(){
            if(verificarCampos()){
                $('#confirmCancelModal').modal();
                $('confirmar').on('click', function(){
                    window.location.href= '{{url("/adm/supplier")}}';
                });
            } else {
                window.location.href= '{{url("/adm/supplier")}}';
            }  
        }

        function verificarCampos(){
			if ($('#nome').val() == '' || $('#nome').val() == null && 
				$('#telefone').val() == '' || $('#telefone').val() == null && 
				$('#cnjp').val() == '' || $('#cnpj').val() == null && 
				$('#email').val() == '' || $('#email').val() == null)
            {
                return false;
            }
            return true;
        }

		if (document.referrer == 'http://localhost/BicJr/recantodabeleza/laravel/public/adm/supplier/create'){
			document.getElementById('nome').value = localStorage.getItem('nome');
			document.getElementById('telefone').value = localStorage.getItem('telefone');
			document.getElementById('cnpj').value = localStorage.getItem('cnpj');
			document.getElementById('email').value = localStorage.getItem('email');
			localStorage.clear();
		}

		function saveData(){
			localStorage.setItem('nome', $('#nome').val());
			localStorage.setItem('telefone', $('#telefone').val());
			localStorage.setItem('cnpj', $('#cnpj').val());
			localStorage.setItem('email', $('#email').val());
		}
    </script>
	<!-- Confirm cancel section end -->

@endsection('content')