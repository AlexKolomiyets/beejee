<?php
// Запрет прямого доступа к файлу
defined('portal')or die("Access denied");

// Подключение главного контроллера
require_once 'controllers/main_controller.php';

// Подключение модели
require_once "models/{$view}_model.php";

//сортировка записей
$order = array(
	'namea' => array('Имени пользователя А-Я','name ASC'),
	'named' => array('Имени пользователя Я-А','name DESC'),
	'emaila' => array('E-mail A-Z','email ASC'),
	'emaild' => array('E-mail Z-A','email DESC'),
	'statusd' => array('Статус: выполненные','status DESC'),
	'statusa' => array('Статус: не выполненные','status ASC'),
);

$order_get = clear($_GET['order']);
if(array_key_exists($order_get, $order)){
    $order_db = $order[$order_get][1];
}else{
    $order_db = 'id DESC';
}

//постраничная навигация
$perpage = 3; //количество объектов на страницу
if(isset($_GET['page'])){
    $page = (int)$_GET['page'];
    if($page < 1) $page = 1;
}else{
    $page = 1;
}

//количество записей
$task_count = task_count();

//количество страниц
$pages_count = ceil($task_count / $perpage);
if(!$pages_count) $pages_count = 1;
if($page > $pages_count) $page = $pages_count;
$start_pos = ($page - 1) * $perpage; // начальная позиция для запроса

//получение массива задач
$get_tasks = get_tasks($start_pos,$perpage,$order_db);

include TEMPLATE . "index.php";