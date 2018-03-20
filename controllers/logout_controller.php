<?php 

// Запрет прямого доступа к файлу 
defined('portal')or die("Access denied");

// Подключение главного контроллера
require_once 'main_controller.php';

unset($_SESSION['admin']);
redirect();
