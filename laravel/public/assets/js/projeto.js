//MÁSCARAS
$(document).ready(function(){
  $('#dtNasc').mask('00/00/0000');
  $('#cep').mask('00000-000', {reverse: true});
  $('#telefone').mask('(00) 00000-0000');
  $('#cpf').mask('000.000.000-00', {reverse: true});
  $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
});

//DELETE
(function(win, doc){
  'use strict';

  if (doc.querySelector('.js-del')){
    let btn = doc.querySelectorAll('.js-del');
    for (let i = 0; i < btn.length; i++){
      btn[i].addEventListener('click', confirmDel, false);
    }
  }

  function confirmDel(event){
    event.preventDefault();
    $('#confirmModal').modal({
      show: true,
    });
    //console.log(event.target.parentNode.href);
    let token = doc.getElementsByName('_token')[0].value;
    $('#del').on('click', function () {
        let href = $(this).href;
        //console.log(href);
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
  
})(window, document);


//TABLE SORTER
$(function() {
  $('#table').tablesorter();
});
  
  var tbody = document.getElementById('tbody');
  var tr = tbody.childNodes;
  //console.log(tr);
  document.getElementById('search').addEventListener('keyup', function(){
    var src = document.getElementById('search').value.toLowerCase();
    //console.log(src);
    for (var i = 1; i < tbody.childNodes.length; i++) {
      //console.log(tbody.childNodes.length);
      //console.log(i);
      var found = false;
      var tr = tbody.childNodes[i];
      //console.log(tr);
      var td = tr.childNodes;
      //console.log(td[1].childNodes[1].innerText);
      for (var j = 0; j < td.length; j++) {
        //console.log(td[j].childNodes[1].childNodes[1].childNodes[1].childNodes[0].nodeValue);
        //console.log(j);
        var value = td[j].childNodes[1].childNodes[1].childNodes[1].childNodes[0].nodeValue.toLowerCase();
        console.log(value);
        if (value.indexOf(src) >= 0) {
          found = true;
          console.log(found);
        }
      }

    if (found) {
      tr.style.display = 'table-row';
    } else {
      tr.style.display = 'none';
    } 
  }
}) 