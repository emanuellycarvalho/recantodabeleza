@extends('templates.adm')

@section('title') Fornecedores @endsection('title')

@section('icon') <img src='{{url("/img/icons/supplier-light.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- Suppliers section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-md-9'>
					<div class='text-center mb-5 alert-success' id='success' hidden>
						Fornecedor excluído do sistema.
					</div>
					<div class='row'>
						<div class='col-xl-1 col-lg-5'>
							<a href='' title='Filtrar resultados'><img src='{{url("/img/icons/filter.png")}}' width='70px'></a>
						</div>
						<div class='col-xl-10 col-lg-5'>
							<div class='search'>
								<input type='text' name='search' id='search' placeholder='Encontre na página'>
								<button><i class='flaticon-search'></i></button>
							</div>
						</div>
						<div class='col-xl-1 col-lg-5'>
							<a href='{{url("adm/supplier/create")}}' title='Novo fornecedor'><img src='{{url("/img/icons/newSupplier.png")}}' width='70px'></a>
						</div>
					</div>
				</div>
				<div class='col-lg-9'>  
					<div class='exhibit-title'>
						<hr> Exibindo {{$suppliers->count()}} de {{$suppliers->total()}}  <hr>
					</div>
					<div class='cart-table'>
						<div class='cart-table-warp'>
							@csrf
							<table id='table' class='tablesorter'>
							<thead>
								<tr>
									<th class='product-th'>Nome</th>
									<th class='quy-th'>Telefone</th>
									<th class='quy-th'></th>
                                    <th class='quy-th'>Ver mais</th>
                                    <th class='quy-th'>Editar</th>
									<th class='quy-th'>Excluir</th>
								</tr>
							</thead>
							<tbody id='tbody'>
								@foreach($suppliers as $sup)
								<tr>
									<td class='quy-col'>
                                        <a href='{{url("adm/supplier/$sup->cdFornecedor")}}' title='Visualizar fornecedor'>
                                            <div class='pc-title'>
                                                <h4>{{$sup->nmFornecedor}}</h4>
												<p>{{$sup->email}}</p>
                                            </div>
                                        </a>
									</td>
									<td class='quy-col'><center>{{$sup->telefone}}</center></td>
									<td class='quy-col'><img scr='{{url("/img/blog-thumbs/line.png")}}' width='35px'></td>
                                    <td class='quy-col'><center><a href='{{url("adm/supplier/$sup->cdFornecedor")}}' title='Visualizar fornecedor'><img src='{{url("/img/icons/seeSupplier.png")}}' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href='{{url("/adm/supplier/$sup->cdFornecedor/edit")}}' title='Editar fornecedor'><img src='{{url("/img/icons/editSupplier.png")}}' height='35px'></a></center></td>
									<td class='quy-col'><center><a href='{{url("adm/supplier/$sup->cdFornecedor")}}' title='Excluir fornecedor' class='js-del'><img src='{{url("/img/icons/deleteSupplier.png")}}' height='35px'></a></center></td>
								</tr>
								@endforeach
							</tbody>
							</table>
                        </div>
                        <div class='total-cost-free'>
							<div class='row justify-content-end' id='pagination'>
						   		{{$suppliers->links()}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Suppliers section end -->

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
				<p>Tem certeza que quer apagar esse registro?</p>
			</div>
			<div class='modal-footer'>
				<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Cancelar</button>
				<button type='button' class='site-btn' id='del'>Confirmar</button>
			</div>
			</div>
		</div>
	</div>
    <!-- Modal section end -->

@endsection('content')

@section('del') supplier @endsection('del')