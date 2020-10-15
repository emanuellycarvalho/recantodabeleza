@extends('templates.adm')

@section('title') Visualizar Serviço @endsection('title')

@section('icon') <img src='{{url("/img/icons/seeService.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- Service section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-lg-7'>
					<div class='cart-table'>
						<div class='sup'>
                            <h3>{{$services->nmServico}}</h3>
                            <br>
                            <h5>{{$services->descricao}}</h5>
                            <br><hr>
                            @php $valorServico = str_replace('.', ',', $services->valorServico); @endphp
                            <b>Valor: </b>R${{$valorServico}} <b> <b class='pink'> |</b> Comissão: </b> {{$services->comissao*100}}%
                            <br>
                            <br><b> Funcionários aptos</b>
                            @foreach ($rel as $r)
                                <li>{{$r->nmFuncionario}}</li>
                            @endforeach
                            <div class='total-cost mt-3'>
                                <a href='{{url("adm/service")}}' class='site-btn sb-dark'>Voltar</a>	
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Services section end -->

@endsection('content')