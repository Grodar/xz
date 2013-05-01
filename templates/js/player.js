function show() {
  $.ajax({
    dataType: 'json',
    url: '/inc/player.php',
    success: function(jsondata){
      $('.now_name').html(jsondata.curr_song); //название текущей песни
      $('.bitrate').html('Качество:      ' + jsondata.bitrate + ' kb/s');    //битрейт
    }
  });
}

function show_listen() {
  $.ajax({
    dataType: 'json',
    url: '/inc/player.php',
    success: function(jsondata){
      $('.listen').html('Слушают: ' + jsondata.listen + ' чел.');      //число слушателей
    }
  });
}

$(document).ready(function(){  
    show();  
    setInterval('show()',5000); 
    
    show_listen();  
    setInterval('show_listen()',15000); 
});  