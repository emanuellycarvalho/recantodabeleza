
//DELETE
(function(win, doc){
  'use strict';

  function confirmDel(event){
    event.preventDefault();
    $('#confirmModal').modal({
      show: true,
    });
    //console.log(event.target.parentNode.href);
    let token = doc.getElementsByName('_token')[0].value;
    $('#del').on('click', function () {
        let href = $(this).href;
        console.log(href);
        let ajax = new XMLHttpRequest();
        ajax.open('DELETE', event.target.parentNode.href);
        ajax.setRequestHeader('X-CSRF-TOKEN', token);
        ajax.onreadystatechange = function(){
          if (ajax.readyState === 4 && ajax.status === 200){
            setTimeout(function(){ 
              $('#success').hide();  
            }, 5000);
            win.location.href='supplier';
          }
        }
        ajax.send();
      
    });
  }

  if (doc.querySelector('.js-del')){
    let btn = doc.querySelectorAll('.js-del');
    for (let i = 0; i < btn.length; i++){
      btn[i].addEventListener('click', confirmDel, false);
    }
  }

  
  function showModal(){
    $('#confirmModal').modal({
      show: true,
    });
    let btnC = doc.querySelector('#del');
    console.log(btnC);
    btnC.addEventListener('click', confirm, false);
  }

  function confirm(){
    return true;
  }
  
})(window, document);


//TABLE SORTER
$(function() {
  $('#table').tablesorter();
});
  
  /*
  var tbody = document.getElementById('tbody');
  var tr = tbody.childNodes;

  document.getElementById('seacrh').addEventListener('keyup', function(){
    var src = document.getElementById('seacrh').value.toLowerCase();
    for (var i = 0; i < tbody.childNodes.length; i++) {
      var found = false;
      var tr = tbody.childNodes[i];
      console.log(i, tbody.childNodes[i]);
      var td = tr.childNodes;
      
      for (var j = 0; j < td.length; j++) {
        var value = td[j].childNodes[0].nodeValue.toLowerCase();
        
        if (value.indexOf(src) >= 0) {
          found = true;
        }
      }

    if (found) {
      tr.style.display = 'table-row';
    } else {
      tr.style.display = 'none';
    } 
  }
}) */