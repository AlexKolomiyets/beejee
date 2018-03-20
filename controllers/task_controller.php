<?php
// Запрет прямого доступа к файлу
defined('portal')or die("Access denied");

// Подключение главного контроллера
require_once 'controllers/main_controller.php';

// Подключение модели
require_once "models/{$view}_model.php";

//получение записи
$get_task = get_task($id);

if(empty($get_task)){
    header("HTTP/1.1 404 Not Found");
    include "views/404.php";
    exit;
}

//редактирование записи
if($_POST){
	edit_task($id);
	redirect();
}

include TEMPLATE . "index.php";