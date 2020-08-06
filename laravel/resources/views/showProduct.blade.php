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
						<h3 class='text-center'>{{$products->nmProduto}}</h3>
						<div class='cart-table-warp'>
                            <div class='row'>
                            @if ($products->foto)
                                <div class='col-lg-3 order-2 order-lg-0 text-center mb-4'>
                                    <img src="{{url("storage/{$products->foto}")}}">
                                </div>
                            @endif 
                                <div class='col-lg-8 order-2 order-lg-1'>
                                	<b> Marca: </b> {{$products->marca}}<b class='pink'> | </b>
									<b> Comissão: </b> {{$products->comissao}}%<b class='pink'> | </b>
                                    <b> Preço: </b> R${{$products->precoProduto}}
                                    <br>
                                    <b> Estoque: </b> {{$products->qtd}} unidades
                                    <hr>
                                    @if ($products->descricao != null)
                                    	<b>Nasceu em </b> {{$products->descricao}} <b class='pink'> |</b>
                                    @else
                                        <b>Descrição do produto não informada</b>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class='total-cost'>
                        	<a href='{{url("adm/product")}}' class='site-btn sb-dark'>Voltar</a>	
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Clients section end -->

@endsection('content')