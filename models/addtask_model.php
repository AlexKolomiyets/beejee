<?php
// Запрет прямого доступа к файлу
defined('portal')or die("Access denied");

/**
 * добавление записи в БД
 * @return bool
 */
function add_task(){
	global $db;
	$error = null;
	$title = trim($_POST['title']);
	$content = trim($_POST['content']);
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);

	if(empty($title)) $error .= 'Введите заголовок';
	if(empty($content)) $error .= 'Введите описание задачи';
	if(empty($name)) $error .= 'Введите имя';
	if(empty($email)) $error .= 'Введите E-mail';

	if(empty($error)){
		$title = clear($title);
		$content = clear($content);
		$name = clear($name);
		$email = clear($email);

		$query = "INSERT INTO tasks(title,content,name,email) VALUES('$title','$content','$name','$email')";
		$res = mysqli_query($db,$query);
		if(mysqli_affected_rows($db) > 0){
			// Загрузка картинки
			$id = mysqli_insert_id($db);
			$path = $_SERVER['DOCUMENT_ROOT'] . '/userfiles/';
            $time = time();
            $name = "{$id}_{$time}";
            $image_error = '';
            if ($_FILES['image']['name']) {
                if ($image = upload_image($name, $path, 'image')) {
                    mysqli_query($db, "UPDATE tasks SET image = '$image' WHERE id = $id");
                }else{
                    $_SESSION['result']['class'] = 'warning';
                    $image_error = "<br>Ошибка, загрузки основного изображения:<br>" . $_SESSION['result']['msg'] . "<br>";
                    $_SESSION['result']['msg'] = "Запись успешно добавлена. {$image_error}";
                    // unset($_SESSION['result']['msg']);
                }
            }
            if(!isset($_SESSION['result'])){
            	$_SESSION['result'] = array('class' => 'success', 'msg' => 'Запись успешно добавлена');
            }
			return true;
		}else{
			$_SESSION['result'] = array('class' => 'danger', 'msg' => 'Ошибка, сервер временно не доступен');
			return false;
		}
	}else{
		$_SESSION['result'] = array('class' => 'danger', 'msg' => 'Заполните все поля со звездочкой');
		return false;
	}
}

/**
 * Форматирование байтов
 * @param  integer $bytes     Число в байтах
 * @param  integer $precision Число для степени округления
 * @return string
 */
function formatBytes($bytes, $precision = 2) {
  $units = array('B', 'KB', 'MB', 'GB', 'TB');

  $bytes = max($bytes, 0);
  $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
  $pow = min($pow, count($units) - 1);

  // Uncomment one of the following alternatives
  // $bytes /= pow(1024, $pow);
  $bytes /= (1 << (10 * $pow));

  return round($bytes, $precision) . ' ' . $units[$pow];
}