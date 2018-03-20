<?php
// Запрет прямого доступа к файлу
defined('portal')or die("Access denied");

// Подключение главного контроллера
require_once 'controllers/main_controller.php';

// Подключение модели
require_once "models/{$view}_model.php";

//добавление записи в БД
if($_POST){
	add_task();
	redirect();
}

include TEMPLATE . "index.php";