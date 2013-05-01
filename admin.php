<? 

/*****************************************************************************
 *           Назначение файла: Главный файл сайта                            *
 *            Разработчик: AlexVerb (HZRADIO.INFO)                           *
 *               Все права защищены (c) 2013                                 *
 *****************************************************************************/ 

require_once("classes/templates.class.php"); //подключаем класс шаблонизатора
require_once("inc/functions.php"); //подключаем файл функций

//Подгружаем шаблон
$tpl = new Template; 
$tpl->dir = 'html/'; 
$tpl->load_template('main.tpl');
$tpl->set('{THEME}', "html"); 

$tpl->compile('main'); 
eval (' ?' . '>' . $tpl->result['main'] . '<' . '?php '); 
$tpl->global_clear(); 

?>