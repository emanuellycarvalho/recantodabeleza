@extends('templates.adm')

@section('title') Registrar pagamento @endsection('title')

@section('icon') <img class='responsive' src='{{url("/img/icons/payment-light.png")}}' width='35px'> @endsection('icon')

@section('content')

<script src='{{url("/assets/js/jquery.quicksearch.js")}}'></script>
<script src='{{url("/assets/js/jquery.tablesorter.min.js")}}'></script>

    <!-- attendances section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-lg-9 offset-md-2'>  
					<form class='contact-form' name='attendance' id='attendance' method='post' action=''>

                        <div class='row'>

                            <div class='form-group col-lg-6 offset-md-1'>
                                
                                <label for='cliente'>Cliente*</label>
                                <select name='cliente' id='cliente'>
                                    <option value='0' disabled selected> Selecione um cliente </option>
                                        @foreach($clients as $cli)
                                            @if(isset($atd->cdCliente) && $cli->cdCliente == $atd->cdCliente)
                                                <option value='{{$cli->cdCliente}}' selected> {{$cli->telefone}} | {{$cli->nmCliente}} </option>
                                            @else
                                                <option value='{{$cli->cdCliente}}'> {{$cli->telefone}} | {{$cli->nmCliente}} </option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>

                            <div class='form-group col-md-1' style='margin-top:19px;'>
                                <button type='button' class='site-btn' id='search'>Exibir</button> 
                            </div>

                        </div>

                        <div class='cart-table'>
                            <div class='cart-table-warp'>
                                @csrf
                                
                                <table id='table' class='tablesorter'>
                                <thead>
                                    <tr>
                                        <th class='quy-th'>Data</th>
                                        <th class='quy-th'>Valor Total</th>
                                        <th class='quy-th' id='none'>Visualizar</th>
                                        <th class='quy-th' id='none'>Pago</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody'>
                                    <!--
                                    <tr>
                                        <td class='quy-col'><center></center></td>
                                        <td class='quy-col'><center></center></td>
                                        <td class='quy-col'><center><a href='{{url("adm/attendance/cdAtendimento")}}' title='Visualizar Atendimento'><img class='responsive' src='{{url("/img/icons/seePayment.png")}}' height='35px'></a></center></td>
                                        <td class='quy-col'><center><a href='{{url("adm/attendance/cdAtendimento/edit")}}' title='Editar Atendimento'><img class='responsive' src='{{url("/img/icons/editattendance.png")}}' height='35px'></a></center></td>
                                    </tr> -->
                                </tbody>
                                </table>
                            
                        </div>
                        <div class='total-cost-free'>
							<div class='row justify-content-end' id='pagination'>
							</div>
						</div>
                    </div> 
                    <div class='row'> . </div>
                    <div class='row justify-content-end'>
                        <button onclick='history.back(-1)' class='site-btn sb-dark'>Cancelar</button>
                        <button type='submit' class='site-btn'>Confirmar</button>
                    </form>
                    </div>
				</div>
			</div>
		</div>
	</section>
    <!-- attendances section end -->

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
				<button type='submit' class='site-btn' id='del'>Confirmar</button>
			</div>
			</div>
		</div>
	</div>
    <!-- Modal section end -->

    <script>

        $('#search').on('click', function(event){
            event.preventDefault;
            const cli = $('#cliente').val();

            $.ajax
                ({ 
                    type: 'GET',
                    dataType: 'json',
                    url: '{{route("getUnpaidAttendances")}}',
                    success: function (data)
                    {
                        $('tbody').html('');
                        data.map(function(item){
                            if(item.cdCliente == cli){
                                var action = `{{url("/adm/customer/updateAttendances/`+ cli + `")}}`;
                                var date = item.dtAtendimento;
                                date = date.split('-');
                                date = date[2] + '/' + date[1] + '/' + date[0];
                                $newRow = `<tr>
                                        <td><center>${date}</center></td>
                                        <td><center>R$${item.valorTotal}</center></td>
                                        <td><center><a href='{{url("adm/attendance/` + item.cdAtendimento +  `")}}' title='Visualizar Atendimento'><img class='responsive' src='{{url("/img/icons/seePayment.png")}}' height='35px'></a></center></td>
                                        <td><center><input type='checkbox' id='pago' value='N' onchange='changeValue()'></center></td>
                                    </tr>`
                                $('tbody').append($newRow);
                                $('#attendance').attr('action', action);
                            }
                        })
                    }
                });
        });

        function changeValue(){
            if($('#pago').val() == 'N'){
                $('#pago').val('P');
            } else {
                $('#pago').val('N');
            }
        }

    </script>

@endsection('content')

@section('del') attendance @endsection('del')