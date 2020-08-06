@extends('templates.adm')

@section('title') Administração @endsection('title')

@section('content')
<script src='{{asset("assets/fullcalendar/lib/main.js")}}'></script>
<script src='{{url("assets/fullcalendar/lib/locales-all.min.js")}}'></script>
<script src='{{asset("assets/fullcalendar/fullcalendar.js")}}'></script>
<script>
  localStorage.clear;
  sessionStorage.clear;
</script>

  <div id='wrap'>  

    <div id='external-events'>
      <h4>Draggable Events</h4>

      <div id='external-events-list'>
        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
          <div class='fc-event-main'>My Event 1</div>
        </div>
        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
          <div class='fc-event-main'>My Event 2</div>
        </div>
        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
          <div class='fc-event-main'>My Event 3</div>
        </div>
        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
          <div class='fc-event-main'>My Event 4</div>
        </div>
        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
          <div class='fc-event-main'>My Event 5</div>
        </div> 
      </div>

      <p>
        <input type='checkbox' id='drop-remove' />
        <label for='drop-remove'>remove after drop</label>
      </p>
    </div>
    
    <div id='calendar-wrap'>
      <div id='calendar' data-route-load-events='{{route("routeLoadEvents")}}'></div>
    </div>
  </div>

  <section class='contact-section'>
    <div class='container'>
    
      <!-- Event section -->
      <div class='modal fade' id='eventModal' tabindex='-1' role='dialog' aria-labelledby='eventModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='eventModalLabel'>Agendamento</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button> 
          </div>
          <div class='modal-body' id='eventModalBody'>
            <div hidden id='cdEvento'></div>
            <center>
            <div class='row'>
              <div class='col-md-6'>
                <b> Cliente </b> 
              </div>
              <div class='col-md-6'> 
                <b> Telefone </b>
              </div>
            </div>
            <div class='row' id='first'>
              <div class='col-md-6'>
                 
              </div>
              <div class='col-md-6'> 
                
              </div>
            </div>
            <div class='row'>
              <div class='col-md-6'>
                <b> Data </b> 
              </div>
              <div class='col-md-6'> 
                <b> Horário previsto </b>
              </div>
            </div>
            <div class='row' id='second'>
              <div class='col-md-6'>
                 
              </div>
              <div class='col-md-6'> 
                
              </div>
            </div>
            </center>
          </div>
          <div class="modal-footer">
              <button onclick='deleteEvent()' class='site-btn sb-dark'>Excluir</button>
              <button onclick='seeMore()' class='site-btn'>Ver & Editar</button>
          </div>
          </div>
        </div>
      </div>
      <!-- Event section end -->

      <!-- New event section -->
      <div class='modal fade' id='newEventModal' tabindex='-1' role='dialog' aria-labelledby='newEventModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='newEventModalLabel'>Novo agendamento</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' id='newEventModalBody'>
              <center> Deseja registrar um novo agendamento para o dia </center>
              <div class='row justify-content-center' id='newEventDate'> </div>
              <div hidden id='oldDateFormat'> </div>
            </div>
            <div class='modal-footer'>
            <button data-dismiss='modal' class='site-btn sb-dark'>Cancelar</button>
            <button onclick='createEvent()' class='site-btn'>Continuar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- New event section end -->

    </div>  
  </section>

</body>
</html>

@endsection('content')