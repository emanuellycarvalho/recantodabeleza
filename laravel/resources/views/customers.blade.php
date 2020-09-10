@extends('templates.adm')

@section('title') Clientes @endsection('title')

@section('icon') <img class='responsive' src='{{url("/img/icons/client.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- customers section -->
    <section class='cart-section spad'>
		<div class='container'>	
			<div class='row justify-content-center'>
				<div class='col-md-9'>
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
							<a href='{{url("adm/customer/create")}}' title='Novo servico'><img class='responsive' src='{{url("/img/icons/newClient.png")}}' width='70px'></a>
						</div>
					</div>
				</div>
				<div class='col-lg-9'>  
					<div class='exhibit-title'>
						<hr> Exibindo {{$customers->count()}} de {{$customers->total()}} <hr>
					</div>
					<div class='cart-table'>
						<div class='cart-table-warp'>
							@csrf
							<table id='table' class='tablesorter'>
							<thead>
								<tr>
									<th class='product-th'><br>Nome e contato</th>
									<th class='quy-th'><br>E-mail</th>
                                    <th class='quy-th' id='none'><br>Visualizar</th>
                                    <th class='quy-th' id='none'><br>Editar</th>
									<th class='quy-th' id='none'><br>Excluir</th>
								</tr>
							</thead>
							<tbody id='tbody'>
                            @foreach($customers as $cust)
								<tr>
									<td class='quy-col'>
                                        <a href='{{url("adm/customer/$cust->cdCliente")}}' title='Visualizar Cliente'>
                                            <div class='pc-title mt-1.5'>
                                                <h4>{{$cust->nmCliente}}</h4>
												<p>{{$cust->telefone}}</p>
                                            </div>
                                        </a>
									</td>
									<td class='quy-col mt-3'><center>{{$cust->email}}</center></td>
                                    <td class='quy-col mt-3'><center><a href='{{url("adm/customer/$cust->cdCliente")}}' title='Visualizar cliente'><img class='responsive' src='{{url("/img/icons/seeClient.png")}}' height='35px'></a></center></td>
                                    <td class='quy-col mt-3'><center><a href='{{url("/adm/customer/$cust->cdCliente/edit")}}' title='Editar cliente'><img class='responsive' src='{{url("/img/icons/editClient.png")}}' height='35px'></a></center></td>
									<td class='quy-col mt-3'><center><a href='{{url("adm/customer/$cust->cdCliente")}}' title='Excluir cliente' class='js-del'><img class='responsive' src='{{url("/img/icons/deleteClient.png")}}' height='35px'></a></center></td>
								</tr>
                            @endforeach
							</tbody>
							</table>
                        </div>
                        <div class='total-cost-free'>
							<div class='row justify-content-end' id='pagination'>
							{{$customers->links()}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- customers section end -->

    <!-- Confirm modal section -->
	<div id='confirmModal' class='modal' tabindex='-1' role='dialog'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title'>Excluir cliente</h5>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
				<p>Tem certeza que quer excluir esse registro?</p>
			</div>
			<div class='modal-footer'>
				<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Cancelar</button>
				<button type='button' class='site-btn' id='del'>Confirmar</button>
			</div>
			</div>
		</div>
	</div>
    <!-- Confirm modal section end -->

@endsection('content')

@section('del') customer @endsection('del')