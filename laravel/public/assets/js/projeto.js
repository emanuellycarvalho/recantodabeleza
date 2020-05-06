//MÁSCARAS
$(document).ready(function(){
  $('#dtNasc').mask('00/00/0000');
  $('#cep').mask('00000-000', {reverse: true});
  $('#telefone').mask('(00) 00000-0000');
  $('#cpf').mask('000.000.000-00', {reverse: true});
  $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
});

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