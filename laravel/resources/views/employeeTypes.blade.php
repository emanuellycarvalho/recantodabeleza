@extends('templates.adm')

@section('title') Tipos de Funcionário @endsection('title')

@section('icon') <img src='{{url("/img/icons/employeeType.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- EmployeeTypes section -->
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
								<input type='text' name='search' id='search' placeholder='Encontre na página'>
								<button><i class='flaticon-search'></i></button>
							</div>
						</div>
						<div class='col-xl-1 col-lg-5'>
							<a href='{{url("adm/employeeType/create")}}' title='Novo funcionário'><img src='{{url("/img/icons/newEmployeeType.png")}}' width='70px'></a>
						</div>
					</div>
				</div>
				<div class='col-lg-9'>  
					<div class='exhibit-title'>
						<hr> Exibindo {{$etypes->count()}} de {{$etypes->total()}}  <hr>
					</div>
					<div class='cart-table'>
						<div class='cart-table-warp'>
							@csrf
							<table id='table' class='tablesorter'>
							<thead>
								<tr>
									<th class='product-th'>Funcao</th>
									<th class='quy-th'>Base</th>
									<th class='quy-th'></th>
                                    <th class='quy-th'>Editar</th>
									<th class='quy-th'>Excluir</th>
								</tr>
							</thead>
							<tbody id='tbody'>
								@foreach($etypes as $emp)
								<tr>
									<td class='quy-col'>
                                        <a href='{{url("adm/employeeType/$emp->cdTipoFuncionario")}}' title='Visualizar funcionário'>
                                            <div class='pc-title'>
                                                <h4>{{$emp->nmFuncao}}</h4>
                                            </div>
                                        </a>
									</td>
									<td class='quy-col'><center>R${{$emp->salarioBase()}}</center></td>
									<td class='quy-col'><img scr='{{url("/img/blog-thumbs/line.png")}}' width='35px'></td>
                                    <td class='quy-col'><center><a href='{{url("/adm/employeeType/$emp->cdTipoFuncionario/edit")}}' title='Editar funcionário'><img src='{{url("/img/icons/editEmployeeType.png")}}' height='35px'></a></center></td>
									<td class='quy-col'><center><a href='{{url("adm/employeeType/$emp->cdTipoFuncionario")}}' title='Excluir funcionário' class='js-del'><img src='{{url("/img/icons/deleteEmployeeType.png")}}' height='35px'></a></center></td>
								</tr>
								@endforeach
							</tbody>
							</table>
                        </div>
                        <div class='total-cost-free'>
                            <a href='{{url("adm/employee")}}' class='site-btn sb-dark ml-4'>Voltar</a>
							<div class='row justify-content-end' id='pagination'>
						   		{{$etypes->links()}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- EmployeeTypes section end -->

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

@section('del') employeeType @endsection('del')