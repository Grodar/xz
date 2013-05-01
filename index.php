<? 

/*****************************************************************************
 *           Назначение файла: Главный файл сайта                            *
 *            Разработчик: AlexVerb (HZRADIO.INFO)                           *
 *               Все права защищены (c) 2013                                 *
 *****************************************************************************/ 

ini_set('display_errors',1);
error_reporting(E_ALL);

require_once("classes/templates.class.php"); //подключаем класс шаблонизатора 
require_once("inc/functions.php"); //подключаем файл функций

//Подгружаем шаблон
$tpl = new Template; 
$tpl->dir = 'templates/';
$tpl->set('{THEME}', "templates");

/* Формируем переменные для функций */
$tpl->set('{meta}', meta());
 
 
$tpl->load_template('main.tpl');
$tpl->compile('main'); 
eval (' ?' . '>' . $tpl->result['main'] . '<' . '?php '); 
$tpl->global_clear(); 

?>