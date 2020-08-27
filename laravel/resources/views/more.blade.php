@extends('templates.adm')

@section('title') Mais @endsection('title')

@section('icon') <img src='{{url("/img/icons/more-light.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- Supplier section -->
    <section class='cart-section spad'>
		<div class='container'>
            <div class='row justify-content-center'>
                <a href='{{url("adm/attendance/create")}}' class='site-btn'><img src='{{url("/img/icons/addOnTable-light.png")}}' class='button-icon'> Registrar atendimento</a>
                <a href='{{url("adm/registerPayment")}}' class='site-btn'><img src='{{url("/img/icons/payment-light.png")}}' class='button-icon'> Registrar pagamento</a>
            </div>
		</div>
	</section>
    <!-- Suppliers section end -->

@endsection('content')