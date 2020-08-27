@extends('templates.adm')

@section('title') Funcionários @endsection('title')

@section('icon') <img class='responsive' src='{{url("/img/icons/employee-light.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- Employees section -->
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
							<a href='{{url("adm/employee/create")}}' title='Novo funcionário'><img class='responsive' src='{{url("/img/icons/newEmployee.png")}}' width='70px'></a>
						</div>
					</div>
				</div>
				<div class='col-lg-9'>  
					<div class='exhibit-title'>
						<hr> Exibindo {{$employees->count()}} de {{$employees->total()}}  <hr>
					</div>
					<div class='cart-table'>
						<div class='cart-table-warp'>
							@csrf
							<table id='table' class='tablesorter'>
							<thead>
								<tr>
									<th class='product-th'><br>Nome</th>
									<th class='quy-th'><a href='{{url("adm/employeeType")}}' class='pink'>Ver tipos</a> <br>Tipo</th>
									<th class='quy-th'><br>Telefone</th>
									<th class='quy-th'><br></th>
                                    <th class='quy-th' id='none'><br>Ver mais</th>
                                    <th class='quy-th' id='none'><br>Editar</th>
									<th class='quy-th' id='none'><br>Excluir</th>
								</tr>
							</thead>
							<tbody id='tbody'>
								@foreach($employees as $emp)
                                    @php    
										foreach($etypes as $type){
											if ($type->cdTipoFuncionario == $emp->cdTipoFuncionario){
												$tipo = $type;
											}
										}
                                    @endphp
								<tr>
									<td class='quy-col'>
                                        <a href='{{url("adm/employee/$emp->cdFuncionario")}}' title='Visualizar funcionário'>
                                            <div class='pc-title'>
                                                <h4>{{$emp->nmFuncionario}}</h4>
												<p>{{$emp->email}}</p>
                                            </div>
                                        </a>
									</td>
									<td><center>{{$tipo->nmFuncao}}</center></td>
									<td class='quy-col'><center>{{$emp->telefone}}</center></td>
									<td class='quy-col'><img class='responsive' scr='{{url("/img/blog-thumbs/line.png")}}' width='35px'></td>
                                    <td class='quy-col'><center><a href='{{url("adm/employee/$emp->cdFuncionario")}}' title='Visualizar funcionário'><img class='responsive' src='{{url("/img/icons/seeEmployee.png")}}' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href='{{url("adm/employee/$emp->cdFuncionario/edit")}}' title='Editar funcionário'><img class='responsive' src='{{url("/img/icons/editEmployee.png")}}' height='35px'></a></center></td>
									<td class='quy-col'><center><a href='{{url("adm/employee/$emp->cdFuncionario")}}' title='Excluir funcionário' class='js-del'><img class='responsive' src='{{url("/img/icons/deleteEmployee.png")}}' height='35px'></a></center></td>
								</tr>
								@endforeach
							</tbody>
							</table>
                        </div>
                        <div class='total-cost-free'>
							<div class='row justify-content-end' id='pagination'>
						   		{{$employees->links()}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Employees section end -->

    <!-- Confirm modal section -->
	<div id='confirmModal' class='modal' tabindex='-1' role='dialog'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title'>Excluir funcionário</h5>
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

@section('del') employee @endsection('del')