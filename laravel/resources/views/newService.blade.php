@extends('templates.adm')

@if(isset($svc)) 
	@section('title') Editar Serviço @endsection('title')
	@section('icon') <img src='{{url("/img/icons/service-light.png")}}' width='35px'> @endsection('icon')
@else
	@section('title') Adicionar Serviço @endsection('title')
	@section('icon') <img src='{{url("/img/icons/service-light.png")}}' width='35px'> @endsection('icon')
@endif			
@section('content')
<script src='{{url("assets/js/service.js")}}'></script>

<!-- Contact section -->
<section class='contact-section'>
		<div class='container'>
			<div class='col-lg-10 offset-md-1'>
			@if(isset($svc))
				<form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/service/$svc->cdServico")}}' enctype='multiform/form-data'>
				@method('PUT')
			@else
	            <form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/service")}}' enctype='multiform/form-data'>
			@endif
					@csrf
					<div class='row'>
						<div class='col-md-12 col-xs-12'>
							<div class='form-group'>
								<label for='nome'>Nome</label>
								<input type='text' name='nmServico' id='nmServico' placeholder='Nome do serviço' value='{{$svc->nmServico ?? old("nmServico")}}' autofocus required>
							</div>
						</div>					
					</div>

					<div class='row'>
						<div class='col-md-6'>
							<div class='form-group'>
								<label for='valorServico'>Valor*</label>
								<input type='text' name='valorServico' id='valorServico' placeholder='R$ 00,00' value='{{$svc->valorServico ?? old("valorServico")}}' required>
							</div>
						</div>

						<div class='col-md-6'>
							<div class='form-group'>
								<label for='comissao'>Comissão (%)*</label>
								<input type='text' name='comissao' id='comissao' placeholder='Porcentagem' value='{{$svc->comissao ?? old("comissao")}}' required>
							</div>
						</div>		
					</div>
					
					<div class='row'>
						<div class='col-md-12 col-xs-12'>
							<div class='form-group'>
								<label for='descricao'>Descrição</label>
								<textarea name="descricao" id="descricao" cols="15" rows="5">{{$svc->descricao ?? old("descricao")}}</textarea>
							</div>
						</div>
					</div>

					<div id='employees'>
                        
                            <div class='col-md-12 col-xs-12'>
                                <div class='cf-title'><h4>Funcionários</h4></div>
                                <hr class='pink'>
                            </div>

                            <div class='text-center mb-5 alert-danger' id='employee_error'>
                            </div>

                            <div class='row'>

                                <div class='col-md-11 col-xs-12'>
                                    <label for='select_employee'>Funcionário</label>
                                    <select name='select_employee[]' id='select_employee'>
                                        <option value='0' disabled selected> Selecione um funcionário por vez </option>
                                        @foreach($employees as $emp)
                                            <script>
                                                var values = [];
                                                if(sessionStorage.getItem('values') != null){
                                                    values = sessionStorage.getItem('values');
                                                }
                                                var val = values + '{{$emp->nmFuncionario}}';
                                                values[{{$emp->cdFuncionario}}] = val;
                                                sessionStorage.setItem('values', values);
                                            </script> 
                                            <option value='{{$emp->cdFuncionario}}'> {{$emp->nmFuncionario}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class='col-md-1 col-xs-12'>    
                                    <img class='addOnTable' src='{{url("img/icons/newEmployee.png")}}' title='Adicionar' id='addOnTable'>
                                </div>

                            </div>

                        </div>

						<div class='employees'>

						</div>
						@if(isset($rel))
							<script scr='{{url("assets/js/service.js")}}'>
								@foreach($rel as $r) 
									createFields({id: {{$r->cdFuncionario}}, name: '{{$r->nmFuncionario}}'});
								@endforeach
							</script>
   						@endif
					<div class='row justify-content-end mt-3 mb-4'>
						<a onclick='confirmarCancelar()' class='site-btn sb-dark' id='white'>Cancelar</a>
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
					<h5 class='modal-title' id='confirmCancelLabel'>Confirmar cancelamento</h5>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button>
				</div>
				<div class='modal-body'>
				@if(isset($svc)) 
					<h5>Deseja voltar para a tabela de serviços?</h5>
					Se confirmar, os dados alterados serão perdidos.
				@else
					<h5>Deseja voltar para a tabela de serviços?</h5>
					Se confirmar vai perder todos os dados inseridos no formulário.
				@endif
				</div>
				<div class='modal-footer'>
					<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Não</button>
					<a href='{{url("adm/service")}}' class='site-btn' id='white' name='confirmar'>Sim</a>
				</div>
			</div>
		</div>
	<!-- Confirm cancel section end -->

	<script> 
        window.confirmarCancelar = function(){
            if(verificarCampos()){
                $('#confirmCancelModal').modal();
                $('confirmar').on('click', function(){
                    window.location.href= '{{url("/adm/service")}}';
                });
            } else {
                window.location.href= '{{url("/adm/service")}}';
            }  
        }

        function verificarCampos(){
			if ($('#nmServico').val() == '' || $('#nmServico').val() == null && 
				$('#descricao').val() == '' || $('#descricao').val() == null && 
				$('#valor').val() == '' || $('#valor').val() == null && 
				$('#comissao').val() == '' || $('#comissao').val() == null)
            {
                return false;
            }
            return true;
        }
    </script>
@endsection('content')