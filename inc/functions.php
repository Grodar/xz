<? 

/*****************************************************************************
 *            Назначение файла: ФАЙЛ С ФУНКЦИЯМИ                             *
 *            Разработчик: AlexVerb (PENZAPC.RU)                             *
 *               Все права защищены (c) 2013                                 *
 *****************************************************************************/

//Мета-Теги            
function meta() {
  $meta = array (
    'title' => "Радио ХЗ", 
    'keywords' => "ХЗ, Радио хз, Radio XZ, Молодежное радио, Молодежные песни, Радио  для молодежи", 
    'description' => "Радио хз - нас объединяет одна цель! Самые зажигательные молодежные хиты только у нас. Только начни слушать и ты не оторвешься!"
  );
  $charset = '<meta charset="utf-8">'."\n";
  $title = "<title>".$meta['title']."</title>"."\n";
  $keywords = '<meta name="keywords" content="'.$meta['keywords'].'" />'."\n";
  $description = '<meta name="description" content="'.$meta['description'].'" />';
  $meta = $charset.$title.$keywords.$description;
  return $meta;
}

?>