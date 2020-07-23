@extends('templates.adm')

@section('title') Visualizar Cliente @endsection('title')

@section('icon') <img src='{{url("/img/icons/seeClient-light.png")}}' width='35px'> @endsection('icon')

@section('content')
   	<!-- Client section -->
       <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-lg-9'>
					<div class='cart-table'>
						<h3>Fulano da Silva</h3>
						<div class='cart-table-warp'>
                            <div class='row'>
                                <div class='col-lg-3 order-2 order-lg-0 text-center'>
                                    <img src='{{$cust->foto}}' width='200px'>
                                </div>
                                <div class='col-lg-7 order-2 order-lg-1'>
								@if ({{$cust->dtNasc}} != null)
                                	<b>Nasceu em </b> {{$cust->dtNasc}} <b class='pink'> |</b>
                                @else
                                    <b>Data de nascimento não informada</b>
                                @endif
                                	<b>RG: </b> MG{{$cust->rg}} <b class='pink'>|</b>
									<b>Sexo: </b> Outro <br>
                                    <hr>
                                    <b>Telefone: </b> {{$cust->telefone}} <br> <br>
                                    <b>E-mail: </b> {{$cust->email}} <br> <br>
                                    <b>Endereço: </b> {{$cust->cidade}} - {{$cust->bairro}} - {{$cust->rua}}, {{$cust->numero}} @if({{$cust->complemento}}!=null) - {{$cust->complemento}} @endif<br> <br>
                                </div>
                            </div>
                        </div>
                        <div class='total-cost'>
                        	<a href='clientes.php' class='site-btn sb-dark'>Voltar</a>	
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Clients section end -->

@endsection('content')