  function deleteEvent(){
    const id = document.getElementById('cdEvento').innerHTML;
    window.location = `adm/scheduling/${id}`;
  }  

  function createEvent(){
    const date = document.getElementById('oldDateFormat').innerHTML;
    window.location = `adm/scheduling/create/${date}`;
  }

  function seeMore(){
    const id = document.getElementById('cdEvento').innerHTML;
    window.location=`adm/scheduling/${id}/edit`;
  }
  
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
    const id = event.extendedProps.cdAgendamento;
    document.getElementById('cdEvento').innerHTML = id;
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
