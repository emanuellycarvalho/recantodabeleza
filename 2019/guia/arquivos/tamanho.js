    var larguraImg = document.getElementById('imagem').offsetWidth;

    var recalcZoom = function ()
    {
      var larguraPai = $("#imageContainer").width();

      var zoom = larguraPai / larguraImg;

      console.log('larguraImg: ' + larguraImg);
      console.log('larguraPai: ' + larguraPai);
      console.log('zoom: ' + zoom);

      $("#imagem").css('zoom', zoom);

    };

    $("#imageContainer").resize(function() {
      recalcZoom();
    });

    $(window).resize(function() {
      recalcZoom();
    });

    recalcZoom();

/*    $('.container img').replaceWith(function(i, v){
    return $('<div/>', {
        style: 'background-image: url(' + this.src + ');' + 
        'width:' + this.width + 'px;' + 
        'height:' + this.height + 'px;' ,
        class: 'fakeImg'
    })
})*/