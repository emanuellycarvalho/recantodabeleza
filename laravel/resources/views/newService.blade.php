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

					<div class='col-md-12 col-xs-12'>
                                <div class='cf-title'><h4>Dados Gerais</h4></div>
                                <hr class='pink'>
                    </div>

					<div class='row'>
						<div class='col-md-12 col-xs-12'>
							<div class='form-group'>
								<label for='nome'>Nome*</label>
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
								<textarea name='descricao' id='descricao' placeholder='Descrição do serviço'>{{$svc->descricao ?? old("descricao")}}</textarea>
							</div>
						</div>

					</div>

					<div id='employees'>
                        
                            <div class='col-md-12 col-xs-12'>
                                <div class='cf-title'><h4>Funcionários Aptos</h4></div>
                                <hr class='pink'>
                            </div>

                            <div class='text-center mb-5 alert-danger' id='employee_error'>
                            </div>

                            <div class='row'>

                                <div class='col-md-11 col-xs-12'>
                                    <label for='select_employee'>Funcionário</label>
                                    <select name='select_employee[]' id='select_employee'>
                                        <option value='0' disabled selected> Selecione um funcionário </option>
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
							@if(isset($rel))
									@foreach ($rel as $r)
									<script type='text/javascript'>
										function createFields(employee) {
												var row = $('<div>').addClass('row selected');
												var div = $('<div>').addClass('col-md-11 col-xs-12');
												$('<input>').attr({ name: 'employee_id[]', value: employee.id, type: 'hidden' }).appendTo(div);
												$('<input>').attr({ name: 'employee_name[]', value: employee.name, type: 'text', readonly: true }).appendTo(div);
												div.appendTo(row);
												div = $('<div>').addClass('col-md-3 col-xs-12');
											
												div = $('<div>').addClass('col-md-1 col-xs-12');
												$('<img>').attr({class: 'removeFromTable', src: 'http://localhost/BicJr/recantodabeleza/laravel/public/img/icons/deleteEmployee.png'}).click(removeItem).appendTo(div);
												div.appendTo(row);
											
												row.prependTo('.employees');
												removeOptionsSelected(employee.id);
										}

										function removeItem(event) {
											event.preventDefault();
											document.getElementById('employee_error').innerHTML="";
											
											//armazena o botão que foi acionado
											const button = $(event.currentTarget);
											
											//pega a div mais perto do botão que foi acionado
											const service_div = button.closest('.selected');
											
											//pega os valores do funcionário e serviço
											const employee_id = service_div.find("[name='employee_id[]']").val();
											const employee_name = service_div.find("[name='employee_name[]']").val();
											
											//volta com eles pros primeiros selects
											$('#select_employee').append(`<option value="${employee_id}">${employee_name}</option>`);
											
											//remove a div 
											service_div.remove();
										}

										function removeOptionsSelected(employee_id) {
											$('#select_employee option[value="' + employee_id + '"]').each(function () {
												$(this).remove();
											});
										}
									</script>

									<iframe hidden="true" onload="createFields({id: '{{$r->cdFuncionario}}', name: '{{$r->nmFuncionario}}'})"></iframe>
									@endforeach
							@endif
						</div>
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