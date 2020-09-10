@extends('templates.adm')

@section('title') Produtos @endsection('title')

@section('icon') <img class='responsive' src='{{url("/img/icons/product.png")}}' width='35px'> @endsection('icon')

@section('content')

<script src='{{url("/assets/js/jquery.quicksearch.js")}}'></script>
<script src='{{url("/assets/js/jquery.tablesorter.min.js")}}'></script>

    <!-- Products section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-md-9'>
					<div class='text-center mb-5 alert-success' id='success' hidden>
						Produto excluído do sistema.
					</div>
					<div class='row'>
						<div class='col-xl-1 col-lg-5'>
							<a href='' title='Filtrar resultados'><img class='responsive' src='{{url("/img/icons/filter.png")}}' width='70px'></a>
						</div>
						<div class='col-xl-10 col-lg-5'>
							<div class='search'>
								<input type='text' name='search' id='search' placeholder='Encontre na página'>
								<button><i class='flaticon-search'></i></button>
							</div>
						</div>
						<div class='col-xl-1 col-lg-5'>
							<a href='{{url("adm/product/create")}}' title='Novo Produto'><img class='responsive' src='{{url("/img/icons/newProduct.png")}}' width='70px'></a>
						</div>
					</div>
				</div>
				<div class='col-lg-9'>  
					<div class='exhibit-title'>
						<hr> Exibindo {{$products->count()}} de {{$products->total()}}  <hr>
					</div>
					<div class='cart-table'>
						<div class='cart-table-warp'>
							@csrf
							<table id='table' class='tablesorter'>
							<thead>
								<tr>
									<th class='product-th'>Nome</th>
									<th class='quy-th'>Preço</th>
                                    <th class='quy-th'>Estoque</th>
                                    <th class='quy-th' id='none'>Visualizar</th>
                                    <th class='quy-th' id='none'>Editar</th>
									<th class='quy-th' id='none'>Excluir</th>
								</tr>
							</thead>
							<tbody id='tbody'>
								@foreach($products as $prod)
								<tr>
									<td class='quy-col'>
                                        <a href='' title='Visualizar produto'>
                                            <div class='pc-title'>
                                                <h4>{{$prod->nmProduto}}</h4>
												<p>{{$prod->marca}}</p>
                                            </div>
                                        </a>
									</td>
									<td class='quy-col'><center>{{$prod->precoProduto}}</center></td>
                                    <td class='quy-col'><center>{{$prod->qtd}}</center></td>
                                    <td class='quy-col'><center><a href='{{url("adm/product/$prod->cdProduto")}}' title='Visualizar produto'><img class='responsive' src='{{url("/img/icons/seeProduct.png")}}' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href='{{url("adm/product/$prod->cdProduto/edit")}}' title='Editar produto'><img class='responsive' src='{{url("/img/icons/editProduct.png")}}' height='35px'></a></center></td>
									<td class='quy-col'><center><a href='{{url("adm/product/$prod->cdProduto")}}' title='Excluir produto' class='js-del'><img class='responsive' src='{{url("/img/icons/deleteProduct.png")}}' height='35px'></a></center></td>
								</tr>
								@endforeach
							</tbody>
							</table>
                        </div>
                        <div class='total-cost-free'>
							<div class='row justify-content-end' id='pagination'>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Products section end -->

    <!-- Modal section -->
	<div id='confirmModal' class='modal' tabindex='-1' role='dialog'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title'>Confirmar exclusão</h5>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
				<p>Tem certeza que quer excluir esse registro?</p>
			</div>
			<div class='modal-footer'>
				<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Não</button>
				<button type='button' class='site-btn' id='del'>Sim</button>
			</div>
			</div>
		</div>
	</div>
    <!-- Modal section end -->

@endsection('content')

@section('del') product @endsection('del')