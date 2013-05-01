<?php

  $first_mount = 'autodj'; //первоначальная радио точка
  $second_mount = 'autodj'; //второстепенная радио точка

  $data = file_get_contents('http://46.38.62.186:8118/status.xsl?mount=/'.$mount); //откуда парсить
  
  //Функция для парсинга со status.xsl 
  function antara($string, $start, $end){
    $string = " ".$string;
    $ini = strpos($string,$start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
  }

  //если стрим пустой => $mount = autodj
  if(antara($data, "Content Type:</td>\n<td class=\"streamdata\">","</td>")  ==''){
    $data = file_get_contents('http://46.38.62.186:8118/status.xsl?mount=/'.$second_mount);
  }
  
  $now_name = antara($data, "Current Song:</td>\n<td class=\"streamdata\">","</td>");      //текущая песня
  $bitrate  = antara($data, "Bitrate:</td>\n<td class=\"streamdata\">","</td>");           //битрейт
  $listen   = antara($data, "Current Listeners:</td>\n<td class=\"streamdata\">","</td>"); //число слушателей
  
  $aRes = array('listen' => rand(($listen * 30), ($listen * 50)), 'bitrate' => $bitrate, 'curr_song' => $now_name); //вывод в переменные json
    
  require_once('json.php');     //подключаем файл для json
  $oJson = new Services_JSON(); //создаем копию объекта
  echo $oJson->encode($aRes);   //выводим данные
       
?>