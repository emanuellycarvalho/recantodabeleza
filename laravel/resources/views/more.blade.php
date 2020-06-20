@extends('templates.adm')

@section('title') Mais @endsection('title')

@section('icon') <img src='{{url("/img/icons/more-light.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- Supplier section -->
    <section class='cart-section spad'>
		<div class='container'>
            <div class='row justify-content-center'>
                <a href='{{url("adm/attendance/create")}}' class='site-btn'> Registrar atendimento </a>
                <a href='{{url("adm/scheduling/create")}}' class='site-btn sb-dark'> Agendar atendimento </a>
            </div>
		</div>
	</section>
    <!-- Suppliers section end -->

@endsection('content')