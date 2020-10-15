@extends('tatdclates.adm')

@section('title') Visualizar Funcionário @endsection('title')

@section('icon') <img src='{{url("/img/icons/seeAttendance-light.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- Attendance section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-lg-7'>
					<div class='cart-table'>
						<div class='sup'>
                            <h3>{{$atdc->nmFuncionario}}</h3> 
                            <b>CPF: </b> {{$atdc->cpf}} <b class='pink'> | </b> 
                            {{$atdc->sexo}} <b class='pink'> | </b> 
                            {{$atdc->where('cdFuncionario', $atdc->cdFuncionario)->first()->relAttendanceType->nmFuncao}} 
                            <br><br>
                            <div class='cart-table-warp mb-3'>
                                <div class='row'> <!-- Contato -->
                                    
                                    <div class='col-lg-6 order-2 order-lg-0'>
                                        <b>Rua </b>{{$atdc->rua}}, {{$atdc->numero}} <br>
                                        <b>Bairro</b> {{$atdc->bairro}} <br> 
                                        <b>Cidade </b>{{$atdc->cidade}} <br>
                                        <b>CEP: </b> {{$atdc->cep ?? '' }} 
                                    </div>
                                    <div class='col-lg-6 order-2 order-lg-1'><br>
                                        <b> Telefone </b> {{$atdc->telefone}} <br> <b>E-mail </b> {{$atdc->email}}
                                    </div>
                                </div>
                            </div>
                            <div class='total-cost'>
                                <a href='{{url("adm/attendance")}}' class='site-btn sb-dark'>Voltar</a>	
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Attendances section end -->

@endsection('content')