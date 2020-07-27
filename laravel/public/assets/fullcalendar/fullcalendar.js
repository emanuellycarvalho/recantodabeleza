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
      height: 700,
      events: document.getElementById('calendar').dataset['routeLoadEvents'] //retorna os eventos do dado
      /*,
      eventDrop: function(event){ 
        //mudar o draggable de uma data pra outra
      }, */
      ,
      nowIndicator: true,
      businessHours: {
        // days of week. an array of zero-based day of week integers (0=Sunday)
        daysOfWeek: [ 2, 3, 4, 5, 6 ], // Tuesday - Saturday
      
        startTime: '7:00', // a start time
        endTime: '17:00', // an end time
      },
      eventClick: function(element) {
        var event = element.event;
        var time = formatTime(event);

        generateModal(event, time);

        $('#eventModal').modal('show');
      },
      dateClick: function(info) {
        var date = info.dateStr;
        /*document.getElementById('oldDateFormat').innerHTML= date;
        date = moment(date).format('L');
        document.getElementById('newEventDate').innerHTML= `<b> ${date}</b>`;
        $('#newEventModal').modal('show'); */
        window.location = `adm/scheduling/create/${date}`
      }  
        
    });
    calendar.render();

  });

  