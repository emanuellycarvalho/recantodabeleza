@extends('templates.adm')

@section('title') Fornecedores @endsection('title')

@section('icon') <img src='{{url("/img/icons/supplier-light.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- Suppliers section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-md-9'>
					<div class='row'>
						<div class='col-xl-1 col-lg-5'>
							<a href='' title='Filtrar resultados'><img src='{{url("/img/icons/filter.png")}}' width='70px'></a>
						</div>
						<div class='col-xl-10 col-lg-5'>
							<div class='search'>
								<input type='text' name='search' id='seacrh' placeholder='Encontre na página'>
								<button><i class='flaticon-search'></i></button>
							</div>
						</div>
						<div class='col-xl-1 col-lg-5'>
							<a href='{{url("supplier/create")}}' title='Novo fornecedor'><img src='{{url("/img/icons/newSupplier.png")}}' width='70px'></a>
						</div>
					</div>
				</div>
				<div class='col-lg-9'>
					<hr>
					<div class='cart-table'>
						<div class='cart-table-warp'>
							<table id='table' class='tablesorter'>
							<thead>
								<tr>
									<th class='product-th'>Nome</th>
									<th class='quy-th'>Telefone</th>
									<th class='quy-th'></th>
									<th class='quy-th'>Excluir</th>
                                    <th class='quy-th'>Editar</th>
                                    <th class='quy-th'>Ver mais</th>
                                    <th class='quy-th'>Relatórios</th>
								</tr>
							</thead>
							<tbody id='tbody'>
								<tr>
									<td class='quy-col'>
                                        <a href='fornecedor.php' title='Visualizar fornecedor'>
                                            <div class='pc-title'>
                                                <h4>Fulano</h4>
												<p>fulano@yahoo.com.br</p>
                                            </div>
                                        </a>
									</td>
									<td class='quy-col'><center>(31) 98873-3308</center></td>
									<td class='quy-col'><img scr='{{url("/img/blog-thumbs/line.png")}}' width='35px'></td>
									<td class='quy-col'><center><a href='' title='Excluir fornecedor'><img src='{{url("/img/icons/deleteSupplier.png")}}' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href='' title='Editar fornecedor'><img src='{{url("/img/icons/editSupplier.png")}}' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href='fornecedor.php' title='Visualizar fornecedor'><img src='{{url("/img/icons/seeSupplier.png")}}' height='35px'></a></center></td>
									<td class='quy-col'><center><a href='relatoriosfornecedor.php' title='Relatórios do fornecedor'><img src='{{url("/img/icons/actionsSupplier.png")}}' height='35px'></a></center></td>
								</tr>
								<tr>
									<td class='quy-col'>
                                        <a href='fornecedor.php' title='Visualizar fornecedor'>
                                            <div class='pc-title'>
                                                <h4>Ciclano	</h4>
												<p>ciclano@yahoo.com.br</p>
                                            </div>
                                        </a>
									</td>
									<td class='quy-col'><center>(31) 98773-3308</center></td>
									<td class='quy-col'><img scr='{{url("/img/blog-thumbs/line.png")}}' width='35px'></td>
									<td class='quy-col'><center><a href='' title='Excluir fornecedor'><img src='{{url("/img/icons/deleteSupplier.png")}}' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href='' title='Editar fornecedor'><img src='{{url("/img/icons/editSupplier.png")}}' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href='fornecedor.php' title='Visualizar fornecedor'><img src='{{url("/img/icons/seeSupplier.png")}}' height='35px'></a></center></td>
									<td class='quy-col'><center><a href='relatoriosfornecedor.php' title='Relatórios do fornecedor'><img src='{{url("/img/icons/actionsSupplier.png")}}' height='35px'></a></center></td>
								</tr>
							</tbody>
							</table>
                        </div>
                        <div class='total-cost-free'>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Suppliers section end -->

@endsection('content')