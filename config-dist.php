<?php
define('PATH','http://site.loc/');

// БД
define( 'HOST', 'localhost' );
define( 'USER', '<username>' );
define( 'PASS', '<password>' );
define( 'DB',   '<db>' );

// Виды
define('VIEW', 'views/');
define('TEMPLATE', VIEW . 'theme/');

//максимальный размер картинки
define('SIZE', 1048576);

// Подключение к БД
$db = @mysqli_connect(HOST, USER, PASS, DB)or die("Error connecting to server");
mysqli_set_charset($db, "utf8")or die("Error when selecting the encoding");