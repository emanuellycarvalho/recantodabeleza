@extends('templates.adm')

@section('title') Visualizar Fornecedor @endsection('title')

@section('icon') <img src='{{url("/img/icons/seeSupplier-light.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- Supplier section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-lg-7'>
					<div class='cart-table'>
						<div class='sup'>
                            <h3>{{$sup->nmFornecedor}}</h3> 
                            {{$sup->cnpj}} <br><br>
                            <div class='cart-table-warp mb-3'>
                                <div class='row'>
                                    <div class='col-lg-12 order-2 order-lg-1'>
                                    <b> Telefone </b> {{$sup->telefone}} 
                                    <b class='pink'> | </b>
                                    <b>E-mail </b> {{$sup->email}}
                                    </div>
                                </div><hr>
                                <br><b> Produtos à venda</b>
                                @foreach ($rel as $r)
                                    <li>{{$r->nmProduto}}</li>
                                @endforeach    
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