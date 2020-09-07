@extends('templates.adm')

@section('title') Visualizar Produto @endsection('title')

@section('icon') <img src='{{url("/img/icons/seeProduct.png")}}' width='35px'> @endsection('icon')

@section('content')
   	<!-- Client section -->
       <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-lg-9'>	
					<div class='cart-table'>
						<h3 class='text-left'>{{$products->nmProduto}}</h3>
						<div class='cart-table-warp'>
                            <div class='row'>
                            @if ($products->foto)
                                <div class='col-lg-3 order-2 order-lg-0 text-center mb-4'>
                                    <img src="{{url("storage/{$products->foto}")}}" width='130px'>
                                </div>
                            @endif 
                                <div class='col-lg-8 order-2 order-lg-1'>
                                	<b> Marca: </b> {{$products->marca}}<b class='pink'> | </b>
									<b> Comissão: </b> {{$products->comissao}}%<b class='pink'> | </b>
                                    @php $precoProduto = str_replace('.', ',', $products->precoProduto); @endphp
                                    <b> Preço: </b> R${{$precoProduto}}
                                    <br>
                                    <b> Estoque: </b> {{$products->qtd}} unidades
                                    <hr>
                                    @if ($products->descricao != null)
                                        <b>{{$products->descricao}} </b><br>
                                    @else
                                        <b>Descrição do produto não informada</b><br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class='total-cost mt-3'>
                        	<a href='{{url("adm/product")}}' class='site-btn sb-dark'>Voltar</a>	
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Clients section end -->

@endsection('content')