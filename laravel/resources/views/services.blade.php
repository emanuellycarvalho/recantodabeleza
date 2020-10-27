@extends('templates.adm')

@section('title') Serviços @endsection('title')

@section('icon') <img class='responsive' src='{{url("/img/icons/service-light.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- services section -->
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
							<a href='{{url("adm/service/create")}}' title='Adicionar serviço'><img class='responsive' src='{{url("/img/icons/newService.png")}}' width='70px'></a>
						</div>
					</div>
				</div>
				<div class='col-lg-9'>  
					<div class='exhibit-title'>
						<hr> Exibindo {{$services->count()}} de {{$services->total()}} <hr>
					</div>
					<div class='cart-table'>
						<div class='cart-table-warp'>
							@csrf
							<table id='table' class='tablesorter'>
							<thead>
								<tr>
									<th class='product-th'><br>Nome</th>
									<th class='quy-th'><br>Valor</th>
									<th class='quy-th'><br>Comissão</th>
                                    <th class='quy-th' id='none'><br>Visualizar</th>
                                    <th class='quy-th' id='none'><br>Editar</th>
									<th class='quy-th' id='none'><br>Excluir</th>
								</tr>
							</thead>
							<tbody id='tbody'>
								@foreach($services as $svc)
								<tr>
									<td class='quy-col'>
                                        <a href='{{url("adm/service/$svc->cdServico")}}' title='Visualizar serviço'>
                                            <div class='pc-title mt-1.5'>
                                                <h4>{{$svc->nmServico}}</h4>
                                            </div>
                                        </a>
									</td>
									@php $valorServico = str_replace('.', ',', $svc->valorServico); @endphp
									<td class='quy-col mt-3'><center>R${{$valorServico}}</center></td>
									<td class='quy-col mt-3'><center>{{$svc->comissao*100}}%</center></td>
                                    <td class='quy-col mt-3'><center><a href='{{url("adm/service/$svc->cdServico")}}' title='Visualizar serviço'><img class='responsive' src='{{url("/img/icons/seeService.png")}}' height='35px'></a></center></td>
                                    <td class='quy-col mt-3'><center><a href='{{url("/adm/service/$svc->cdServico/edit")}}' title='Editar serviço'><img class='responsive' src='{{url("/img/icons/editService.png")}}' height='35px'></a></center></td>
									<td class='quy-col mt-3'><center><a href='{{url("adm/service/$svc->cdServico")}}' title='Excluir serviço' class='js-del'><img class='responsive' src='{{url("/img/icons/deleteService.png")}}' height='35px'></a></center></td>
								</tr>
								@endforeach
							</tbody>
							</table>
                        </div>
                        <div class='total-cost-free'>
							<div class='row justify-content-end' id='pagination'>
						   		{{$services->links()}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- services section end -->

    <!-- Confirm modal section -->
	<div id='confirmModal' class='modal' tabindex='-1' role='dialog'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title'>Excluir serviço</h5>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
				<p>Tem certeza que deseja excluir esse registro?<br>
				<b>Nome:</b> {{$svc->nmServico}}<br></p>
			</div>
			<div class='modal-footer'>
				<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Não</button>
				<button type='button' class='site-btn' id='del'>Sim</button>
			</div>
			</div>
		</div>
	</div>
    <!-- Confirm modal section end -->

@endsection('content')

@section('del') service @endsection('del')