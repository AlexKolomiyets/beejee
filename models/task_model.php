<?php

// Запрет прямого доступа к файлу
defined('portal')or die("Access denied");

/**
 * получение записи
 * @param  integer $id
 * @return array
 */
function get_task($id){
	global $db;
	$query = "SELECT * FROM tasks WHERE id = $id LIMIT 1";
	$res = mysqli_query($db,$query);
	$arr = array();
	$arr = mysqli_fetch_assoc($res);

	return $arr;
}

/**
 * редактирование записи
 * @param  integer $id
 * @return bool
 */
function edit_task($id){
	global $db;
	$content = trim($_POST['content']);
	$status = (int)$_POST['status'];

	if(empty($content)){
		$_SESSION['result'] = array('class' => 'danger', 'msg' => 'Поле описания обязательно для заполнения');
		return false;
	}else{
		$content = clear($content);
		$query = "UPDATE tasks SET content = '$content', status = $status WHERE id = $id";
		$res = mysqli_query($db,$query);
		if(mysqli_affected_rows($db) > 0){
			$_SESSION['result'] = array('class' => 'success', 'msg' => 'Запись успешно отредактирована');
			return true;
		}else{
			$_SESSION['result'] = array('class' => 'danger', 'msg' => 'Вы ничего не изменили');
			return false;
		}
	}
}