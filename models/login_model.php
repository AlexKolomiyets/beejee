<?php
// Запрет прямого доступа к файлу
defined('portal')or die("Access denied");

/**
* Авторизация администратора
* @return session
**/
function auth(){
    global $db;
    $login = trim(mysqli_real_escape_string($db, $_POST['login']));
    $pass = trim($_POST['password']);
    if(empty($login) OR empty($pass)){
        $_SESSION['result'] = array('class' => 'danger', 'msg' => 'Вы не ввели логин или пароль.');
    }else{
        $query = "SELECT user_id, login, password FROM users WHERE login = '$login' LIMIT 1";
        $res = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($res);
        if($row['password'] == md5($pass)){
            $_SESSION['admin']['name'] = htmlspecialchars($row['login']);
            $_SESSION['admin']['user_id'] = $row['user_id'];
        }else{
            $_SESSION['result'] = array('class' => 'danger', 'msg' => 'Неверный логин или пароль.');
        }
    }
}