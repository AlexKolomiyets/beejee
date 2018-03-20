<?php
// Запрет прямого доступа к файлу
defined('portal')or die("Access denied");

// Подключение главного контроллера
require_once 'controllers/main_controller.php';

// Подключение модели
require_once "models/{$view}_model.php";

if(isset($_SESSION['admin'])) redirect(PATH);

// Авторизация администратора
if($_POST){
    auth();
    redirect();
}

include TEMPLATE . "index.php";