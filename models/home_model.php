<?php
// Запрет прямого доступа к файлу
defined('portal')or die("Access denied");

/**
 * получение массива задач
 * @param  integer $start_pos
 * @param  integer $perpage
 * @param  string $order_db
 * @return array
 */
function get_tasks($start_pos,$perpage,$order_db){
	global $db;
	$query = "SELECT * FROM tasks ORDER BY $order_db LIMIT $start_pos,$perpage";
	$res = mysqli_query($db,$query);
	$arr = array();

	while($row = mysqli_fetch_assoc($res)){
		$arr[] = $row;
	}
	return $arr;
}

/**
 * получение количества заданий
 * @return integer
 */
function task_count(){
	global $db;
	$query = "SELECT COUNT(*) FROM tasks";
	$res = mysqli_query($db,$query);
	$count = null;
	$count = mysqli_fetch_array($res);
	$count = $count[0];

	return (int)$count;
}