$(document).ready(function() {

    /*$('#tabelaFuncionario').DataTable(
    {
        "order": [[ 2, "asc" ]],
        "columnDefs": [
            { width: '40%', "orderable": true,  "targets": 0 },
            { width: '25%', "orderable": true,  "targets": 1 },
            { width: '25%', "orderable": true,  "targets": 2 },
            { width: '10%', "orderable": true, "targets": 3 }
          ],
          "oAria": {
              "sSortAscending": ": Ordenar colunas de forma ascendente",
              "sSortDescending": ": Ordenar colunas de forma descendente"
          }
         

        });*/


        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
              dropdownContent.style.display = "none";
            } else {
              dropdownContent.style.display = "block";
            }
          });
        }
      });

var $doc = $('html, body');
$('.scrollSuave').click(function() {
  $doc.animate({
    scrollTop: $( $.attr(this, 'href') ).offset().top
  }, 500);
  return false;
  var links = document.getElementsByIdName('orientacoes');
  for (var i = 0; i < links.length; i++) {
    links[i].style.color = '#090854';
  }
});