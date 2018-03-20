<?php
// Запрет прямого доступа к файлу
defined('portal')or die("Access denied");

session_start();

// Подключение библиотек функций
require_once 'functions/functions.php';

// Подключение файла конфигураций
require_once 'config.php';

// Подключение главной модели
require_once 'models/main_model.php';