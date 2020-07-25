 document.addEventListener('DOMContentLoaded', function() {

    /* initialize the external events
    -----------------------------------------------------------------*/

    var containerEl = document.getElementById('external-events-list');
    new FullCalendar.Draggable(containerEl, {
      itemSelector: '.fc-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText.trim()
        }
      }
    });

    //// the individual way to do it
    // var containerEl = document.getElementById('external-events-list');
    // var eventEls = Array.prototype.slice.call(
    //   containerEl.querySelectorAll('.fc-event')
    // );
    // eventEls.forEach(function(eventEl) {
    //   new FullCalendar.Draggable(eventEl, {
    //     eventData: {
    //       title: eventEl.innerText.trim(),
    //     }
    //   });
    // });

    /* initialize the calendar
    -----------------------------------------------------------------*/

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      locale: 'pt-br',
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar
      drop: function(arg) {
        // is the "remove after drop" checkbox checked?
        if (document.getElementById('drop-remove').checked) {
          // if so, remove the element from the "Draggable Events" list
          arg.draggedEl.parentNode.removeChild(arg.draggedEl);
        }
      },
      events: document.getElementById('calendar').dataset['routeLoadEvents'] //retorna os eventos do dado
      /*,
      eventDrop: function(event){ 
        //mudar o draggable de uma data pra outra
      }, */
      ,
      eventClick: function(element) {
        var event = element.event;
        var time = formatTime(event);

        generateModal(event, time);

        $('#eventModal').modal('show');
      },
      dateClick: function(info) {
        var date = info.dateStr;
        window.location = `adm/scheduling/create/${date}`
      }    
    });
    calendar.render();

  });

  function formatTime(event){
    $validate = true;
    $start = moment(event.start).format('LT');
    $end = moment(event.end).format('LT');
  
    $start = $start.substring(11, 0);
    $end = $end.substring(11, 0);
      
    if($start == null || $start.indexOf('Invalid') !== -1){
      $start = '??';
      $validate = false;
    }

    if($end == null || $end.indexOf('Invalid') !== -1){
      $end = '??';
      $validate = false;
    }

    $date = moment(event.start).format('L');
    $week = moment(event.start).format('LLLL');
    $week = $week.substring (0, $week.indexOf('-') + 6);

    if($validate && moment(event.start).format('L') != moment(event.end).format('L')){
      $date = $date + ' à ' + $end.substring(0, 10);
      $week = $week + 'à ';
    } 
    
    return [$date, $week, $start, $end];
  }

  function generateModal(event, time){
    document.getElementById('first').innerHTML='';
    document.getElementById('second').innerHTML='';

    var col6 = $('<div>').addClass('col-md-6');
    var content = `${event.title}`;

    col6 = $('<div>').addClass('col-md-6');
    content = `${event.title}`;

    col6.append(content);
    col6.appendTo('#first');

    col6 = $('<div>').addClass('col-md-6');
    content = `${event.extendedProps.telefone}`;

    col6.append(content);
    col6.appendTo('#first');

    col6 = $('<div>').addClass('col-md-6');
    content = `${time[0]} <br> (${time[1]})`;

    col6.append(content);
    col6.appendTo('#second');

    col6 = $('<div>').addClass('col-md-6');
    content = `${time[2]} - ${time[3]}`;

    col6.append(content);
    col6.appendTo('#second');

    document.getElementById('cdEvento').value = event.id;
  }