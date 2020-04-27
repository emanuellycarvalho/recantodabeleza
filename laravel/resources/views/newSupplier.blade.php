@extends(templates.adm)

@section('title') Fornecedores @endsection('title')

@section('icon') <img src='{{url("/img/icons/newSupplier-light.png")}}' width='35px'> @endsection('icon')

@section('content')

<!-- Contact section -->
<section class='contact-section'>
		<div class='container'>
			<div class='col-lg-10 offset-md-1'>
				<form class='contact-form' name='cadastroPessoa' action='{{url("supplier")}}'>
					@csrf
					<div class='row'>
						
						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='nmFonecedor'>Nome*</label>
								<input type='text' name='nmFonecedor' id='nmFonecedor' placeholder='Nome'>
							</div>
						</div>
						

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='telefone'>Telefone*</label>
								<input type='text' name='telefone' id='telefone' placeholder='(00) 00000-0000'>
							</div>
						</div>
                    </div>

                    <div class='row'>

						<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='cnpj'>CNPJ*</label>
								<input type='text' name='cnpj' id='cnpj'>
							</div>
						</div>

						<div class='col-md-6 col-xs-12'>
							<label for='email'>Email</label>
							<input type='email' name='email' id='email' placeholder='E-mail'>
						</div>

					</div>
										
					<div class='col-md-12'>
						<div class='row'><p><br></p></div>
						<div class='row justify-content-end'>
							<a href='{{url("supplier")}}' class='site-btn sb-dark'>Cancelar</a>
							<input type='submit' class='site-btn'>CADASTRAR</input>	
						</div>
						<div class='row'><p><br></p></div>
					</div>
				</form>
			</div>	
		</div>
	</section>
	<!-- Contact section end -->

@endsection('content')