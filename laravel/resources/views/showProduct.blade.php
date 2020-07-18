@extends('templates.adm')

@section('title') Visualizar Produto @endsection('title')

@section('icon') <img src='{{url("/img/icons/seeProduct-light.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- Product section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-lg-7'>
					<div class='cart-table'>
						<div class='sup'>
                            <h3>{{$products->nmProduto}}</h3>
                            <h5>Marca: {{$products->marca}}</h5>
                            <br> 
                            <b>Preço: </b> R${{$products->precoProduto}}
                            <b class='pink'> | </b>
                            <b>Comissão: </b> R${{$products->comissao}}%
                            <b class='pink'> | </b> 
                            <b>Quantidade em estoque: </b> {{$products->qtd}} unidades
                            <br>
                                <div class='row'> <!-- Descrição -->
                                @if($products->descricao)
                                    <div class='col-lg-6 order-2 order-lg-0'><br>
                                        <b> Descrição </b><br>{{$products->descricao}}<br> 
                                    </div>
                                @else
                                    <div class='col-lg-6 order-2 order-lg-0'><br>
                                        <b> Descrição </b><br>O produto em questão ainda não tem uma descrição<br> 
                                    </div>
                                @endif
                                </div>
                            <div class='total-cost'>
                                <a href='{{url("adm/product")}}' class='site-btn sb-dark'>Voltar</a>	
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Products section end -->

@endsection('content')