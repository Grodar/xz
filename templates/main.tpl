<!DOCTYPE html>
<html xml:lang="ru" lang="ru">
<head>
	{meta}
  <link rel="stylesheet" href="{THEME}/css/style.css" type="text/css" media="screen, projection" />
  <link rel="stylesheet" href="{THEME}/css/jquery-ui.css" type="text/css" media="screen, projection" /> 
  <script type="text/javascript" src="{THEME}/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="{THEME}/js/jquery-ui.js"></script>
  <script type="text/javascript" src="{THEME}/js/player.js"></script>
  <script type="text/javascript" src="{THEME}/js/jquery.jplayer.js"></script> 
  <script type="text/javascript">
    $(document).ready(function(){    
      var myplayer = $("#xz_player");
      var voldiv = $("#xz_player_volume");
      var channel = "http://46.38.62.186:8118/autodj";
    
    	var stream = {
    		mp3: channel
    	},
      
    	ready = false;
    
    	myplayer.jPlayer({
      
    		ready: function (event) {
    			ready = true;
    			$(this).jPlayer("setMedia", stream);
    		},
        
    		pause: function() {
    			$(this).jPlayer("clearMedia");
    		},
        
    		error: function(event) {
    			if(ready && event.jPlayer.error.type === $.jPlayer.error.URL_NOT_SET) {
    				$(this).jPlayer("setMedia", stream).jPlayer("play");
    			}
    		},
        
        volumechange: function(event) {
				  if(event.jPlayer.options.muted) {
					  voldiv.slider("value", 0);
			   	} else {
					  voldiv.slider("value", event.jPlayer.options.volume);
				  }
		  	},
    		swfPath: "/templates/js",
    		supplied: "mp3",
    		preload: "none",
    		wmode: "window"
    	});
      
      voldiv.slider({
		    animate: "fast",
		    max: 1,
		    range: "min",
		    step: 0.01,
		    value : $.jPlayer.prototype.options.volume,
		    slide: function(event, ui) {
			    myplayer.jPlayer("option", "muted", false);
			    myplayer.jPlayer("option", "volume", ui.value);
		    }
    	});      
      myplayer.jPlayer("volume", 1.0);      
    });
  </script>
</head>
<body>

<section id="wrap">
  <header>
    <section id="logo" class="left">
      <a href="/"></a>
    </section>
    <section id="player" class="left">
      <div id="xz_player"></div>
      <div class="now">
        <b>ПЛЕЕР</b>
        <marquee class="now_name" scrollamount="3"></marquee>
      </div>
      <div class="topline">
        <span class="listen"></span>
        <div id="xz_player_volume"></div>
        <span class="bitrate"></span>
      </div>      
      <div class="player_button left">
        <a href="/" class="play" title="Слушать"><span></span></a>
        <a href="/" class="pause" title="Пауза"><span></span><span></span></a>
      </div>
      <div class="slider left">
        <div class="slider_ava left">
          <img src="{THEME}/img/photo1.png" alt="" />
        </div>
        <p>Давид Борисович Нуриев, более известный как Птаха, также известный как Зануда - киноактёр, участник клуба "Centr" и "Три кита". Один из основателей и единственный владелец звукозаписывающего музыкального лейбла "ЦАО Records"</p>
      </div>  
    </section>
    <section id="efir_time" class="left">
    </section>
  </header>
</section>

</body>
</html>