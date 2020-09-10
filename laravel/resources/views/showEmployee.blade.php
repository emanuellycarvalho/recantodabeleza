@extends('templates.adm')

@section('title') Visualizar Funcionário @endsection('title')

@section('icon') <img src='{{url("/img/icons/seeEmployee-light.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- Employee section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-lg-7'>
					<div class='cart-table'>
						<div class='sup'>
                            <h3>{{$emp->nmFuncionario}}</h3> 
                            <b>CPF: </b> {{$emp->cpf}} <b class='pink'> | </b> 
                            {{$emp->sexo}} <b class='pink'> | </b> 
                            {{$emp->where('cdFuncionario', $emp->cdFuncionario)->first()->relEmployeeType->nmFuncao}} 
                            <br><br>
                            <div class='cart-table-warp mb-3'>
                                <div class='row'> <!-- Contato -->
                                    
                                    <div class='col-lg-6 order-2 order-lg-0'>
                                        <b>Rua </b>{{$emp->rua}}, {{$emp->numero}} <br>
                                        <b>Bairro</b> {{$emp->bairro}} <br> 
                                        <b>Cidade </b>{{$emp->cidade}} <br>
                                        <b>CEP: </b> {{$emp->cep ?? '' }} 
                                    </div>
                                    <div class='col-lg-6 order-2 order-lg-1'><br>
                                        <b> Telefone </b> {{$emp->telefone}} <br> <b>E-mail </b> {{$emp->email}}
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
		</div>
	</section>
    <!-- Employees section end -->

@endsection('content')