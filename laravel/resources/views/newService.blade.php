@extends('templates.adm')

@if(isset($svc)) 
	@section('title') Editar Serviço @endsection('title')
	@section('icon') <img src='{{url("/img/icons/editEmployeeType-light.png")}}' width='35px'> @endsection('icon')
@else
	@section('title') Adicionar Serviço @endsection('title')
	@section('icon') <img src='{{url("/img/icons/newEmployeeType-light.png")}}' width='35px'> @endsection('icon')
@endif

@section('content')

<!-- Contact section -->
<section class='contact-section'>
		<div class='container'>
			<div class='col-lg-10 offset-md-1'>
			@if(isset($svc))
				<form class='contact-form' name='edicao' id='edicao' method='post' action='{{url("adm/service/$svc->cdServico")}}' enctype='multiform/form-data'>
				@method('PUT')
			@else
	            <form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/service")}}' enctype='multiform/form-data'>
			@endif
					@csrf
                    <div class='col-md-12 col-xs-12'>
                        <div class='form-group'>
                            <label for='descricao'>Descrição*</label>
                            <input type='text' name='descricao' id='descricao' placeholder='Insira uma descrição ou um nome' value='{{$svc->descricao ?? old("descricao")}}' autofocus required>
                        </div>
                    </div>
                    
                    <div class='col-md-6 col-xs-12'>
                        <div class='form-group'>
                            <label for='valorServico'>Valor*</label>
                            <input type='text' name='valorServico' id='valorServico' placeholder='R$00,00' value='{{$svc->valorServico ?? old("valorServico")}}' required>
                        </div>
                    </div>

                    <div class='col-md-6 col-xs-12'>
                        <div class='form-group'>
                            <label for='comissao'>Comissão*</label>
                            <input type='text' name='comissao' id='comissao' placeholder='00,00%' value='{{$svc->comissao ?? old("comissao")}}' required>
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
					<h5>Deseja voltar para a tabela de serviços?</h5>
					Se confirmar vai perder todos os dados inseridos no formulário.
				</div>
				<div class='modal-footer'>
					<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Cancelar</button>
					<a href='{{url("adm/employee")}}' class='site-btn' id='white' name='confirmar'>Confirmar</a>
				</div>
			</div>
		</div>
	<!-- Confirm cancel section end -->
@endsection('content')