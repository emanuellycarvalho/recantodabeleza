@extends('templates.adm')

@section('title') Visualizar Funcionario @endsection('title')

@section('icon') <img src='{{url("/img/icons/seeEmployee-light.png")}}' width='35px'> @endsection('icon')

@section('content')
   	<!-- Client section -->
       <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-lg-9'>
					<div class='cart-table'>
						<h3>{{$emp->nmFuncionario}}</h3>
						<div class='cart-table-warp'>
                            <div class='row'>
                                <div class='col-lg-7 order-2 order-lg-1'>
								@if ($emp->dtNasc != null)
                                	<b>Nasceu em </b> {{$emp->dtNasc}} <b class='pink'> |</b>
                                @else
                                    <b>Data de nascimento não informada</b>
                                @endif
                                	<b>CPF: </b> {{$emp->cpf}}
                                    <br>
									<b>Sexo: </b> {{$emp->sexo}} <br>
                                    <hr>
                                    <b>Telefone: </b> {{$emp->telefone}} <br> <br>
                                    <b>E-mail: </b> {{$emp->email}} <br> <br>
                                    <b>Endereço: </b> {{$emp->cidade}} - {{$emp->bairro}} - {{$emp->rua}}, {{$emp->numero}} @if($emp->complemento!=null) - {{$emp->complemento}} @endif<br> <br>
                                </div>
                            </div>
                        </div>
                        <div class='total-cost'>
                        	<a href='{{url("adm/employee")}}' class='site-btn sb-dark'>Voltar</a>	
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Clients section end -->

@endsection('content')