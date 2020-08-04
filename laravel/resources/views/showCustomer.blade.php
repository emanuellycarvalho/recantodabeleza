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
						<h3>{{$customers->nmCliente}}</h3>
						<div class='cart-table-warp'>
                            <div class='row'>
                            @if ($customers->foto)
                                <div class='col-lg-3 order-2 order-lg-0 text-center'>
                                    <img src="{{url("storage/{$customers->foto}")}}">
                                </div>
                            @endif 
                                <div class='col-lg-7 order-2 order-lg-1'>
								@if ($customers->dtNasc != null)
                                	<b>Nasceu em </b> {{$customers->dtNasc}} <b class='pink'> |</b>
                                @else
                                    <b>Data de nascimento não informada</b>
                                @endif
                                	<b>RG: </b> {{$customers->rg}}
                                    <br>
									<b>Sexo: </b> {{$customers->sexo}} <br>
                                    <hr>
                                    <b>Telefone: </b> {{$customers->telefone}} <br> <br>
                                    <b>E-mail: </b> {{$customers->email}} <br> <br>
                                    <b>Endereço: </b> {{$customers->cidade}} - {{$customers->bairro}} - {{$customers->rua}}, {{$customers->numero}} @if($customers->complemento!=null) - {{$customers->complemento}} @endif<br> <br>
                                </div>
                            </div>
                        </div>
                        <div class='total-cost'>
                        	<a href='{{url("adm/customer")}}' class='site-btn sb-dark'>Voltar</a>	
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Clients section end -->

@endsection('content')