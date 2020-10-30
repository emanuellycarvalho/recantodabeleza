@extends('templates.adm')

@section('title') Visualizar Pagamento @endsection('title')

@section('icon') <img src='{{url("/img/icons/seeSupplier-light.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- Supplier section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-lg-7'>
					<div class='cart-table'>
                        <div class='sup'>
                            <h3>{{$nmClient}}</h3> 
                            {{$telefone}} <br><br>
                        </div>
                        <div class='cart-table-warp mb-3'>
                            <div class='row'>
                                <div class='col-lg-12 order-2 order-lg-1'>
                                <b>{{$dtAttendance}}</b> <br>
                                @foreach($employees as $emp)
                                    @if($emp->cdFuncionario == $att->cdFuncionario)
                                        <b> Funcionário(a) responsável: </b> {{$emp->nmFuncionario}}, {{$emp->telefone}} <br> 
                                    @endif
                                @endforeach
                                @if($products != null)
                                    <hr>
                                    <b class='pink'> | </b> <b>Produtos</b>
                                    @foreach($products as $prod)
                                        {{$prod}} <br>
                                    @endforeach
                                @endif

                                @if($services != null)
                                    <hr>
                                    <b class='pink'> | </b> <b>Produtos</b>
                                    @foreach($services as $serv)
                                        {{$serv}} <br>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        <div class='total-cost'>
                            <a href='{{url("adm/supplier")}}' class='site-btn sb-dark'>Voltar</a>	
                        </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Suppliers section end -->

@endsection('content')