@extends('templates.adm')

@section('title') Pagamento de cliente @endsection('title')

@section('icon') <img class='responsive' src='{{url("/img/icons/payment-light.png")}}' width='35px'> @endsection('icon')

@section('content')

<script src='{{url("/assets/js/jquery.quicksearch.js")}}'></script>
<script src='{{url("/assets/js/jquery.tablesorter.min.js")}}'></script>

<!-- attendances section -->
<section class='cart-section spad'>
    <div class='container'>
        <div class='row justify-content-center'>
            <div class='col-lg-8'>
                <div class='row'>
                    <div class='contact-form form-group col-lg-6 offset-md-1'>
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
                    <div id='mensagem'></div>
                    <div class='cart-table-warp'>

                        <table id='table' class='tablesorter'>
                            <thead>
                                <tr>
                                    <th class='quy-th'>Parcela</th>
                                    <th class='quy-th' id='none'>Valor</th>
                                    <th class='quy-th'>Vencimento</th>
                                    <th class='quy-th' id='none'>Situação</th>
                                </tr>
                            </thead>
                            <tbody id='tbody'></tbody>
                        </table>

                    </div>
                    <div class='total-cost-free'>
                        <div class='row justify-content-end' id='pagination'></div>
                    </div>
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
    $('#search').on('click', function(event) {
        searchUnpaidAttendances();
    });

    function pay(cdParcela) {
        event.preventDefault();
        $('body').css('cursor', 'progress');

        const data = {
            "cdParcela": cdParcela
        };
        const url = "{{route('pay')}}";
        const token = $('meta[id="' + cdParcela + 'token"]').attr('content');

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data,
            url
        });
        searchUnpaidAttendances();
        $('body').css('cursor', 'default');

    }

    function searchUnpaidAttendances() {
        event.preventDefault();
        $('body').css('cursor', 'progress');
        $('tbody').html('');
        document.getElementById('mensagem').innerText = '';
        const cli = $('#cliente').val();

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            data: {
                client: cli
            },
            dataType: 'json',
            url: '{{route("getUnpaidAttendances")}}',
            success: function(data) {
                if (data.length < 1) {
                    document.getElementById('mensagem').innerText = 'Nada para ver por aqui.'
                }

                data.map(function(item) {
                    var date = item.dtVencimento;
                    date = date.split('-');
                    date = date[2] + '/' + date[1] + '/' + date[0];
                    $newRow = `<tr>
                                <td><center>${item.parcela}</center></td>
                                <td><center>R$${item.valor}</center></td>
                                <td><center>${date}</center></td>
                                <td><center>    
                                    <meta name="csrf-token" id="${item.cdParcela}token" content="{{ csrf_token() }}">
                                    <button class="confirm-payment" onclick="pay(${item.cdParcela})">P</button>
                                </center></td>
                            </tr>`
                    $('tbody').append($newRow);
                });
                $('body').css('cursor', 'default');
            }
        });
    }
</script>

@endsection('content')

@section('del') attendance @endsection('del')