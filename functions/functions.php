<?php
// Запрет прямого доступа к файлу
defined('portal')or die("Access denied");

/**
 * Распечатка массивов/обьектов
 * @param array $arr
 * @return array
 */
function print_arr($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}
/**
 * Очистка/екранирование строки
 * @param string $var
 * @return string
 */
function clear($var)
{
    global $db;
    $var = mysqli_real_escape_string($db, strip_tags($var));
    return $var;
}

/**
 * Редирект
 * @param string|bool $http
 * @return type
 */
function redirect($http = false)
{
    if($http) $redirect = $http;
    else    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    header("Location: $redirect");
    exit;
}

/**
 * @param  integer $page nubmer page
 * @param  integer $pages_count tasks count
 * @return string
 */
function pagination($page, $pages_count){
    
        // если функция вызывается на странице без ЧПУ
    if($_SERVER['REQUEST_URI']){ // если есть параметры в запросе
        $uri = "?";
        foreach($_GET as $key => $value){
            // формируем строку параметров без номера страницы... номер передается параметром функции
           if($key != 'page'){
                $uri .= "{$key}={$value}&amp;"; 
           } 
        }  
    }
    
    // формирование ссылок
    $back = ''; // ссылка НАЗАД
    $forward = ''; // ссылка ВПЕРЕД
    $startpage = ''; // ссылка В НАЧАЛО 
    $endpage = ''; // ссылка В КОНЕЦ  
    $page2left = ''; // вторая страница слева
    $page1left = ''; // первая страница слева
    $page2right = ''; // вторая страница справа
    $page1right = ''; // первая страница справа
    
    if($page > 1){
        $back = "<li><a href='{$uri}page=".($page-1)."' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
    }
    if($page < $pages_count){
        $forward = "<li><a href='{$uri}page=".($page+1)."' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
    }
    /*if($page > 3){
        $startpage = "<li><a href='{$uri}page=1'><img src='".PATH.TEMPLATE."assets/img/l1.png' alt='pagination icon'></a></li>";
    }
    if($page < ($pages_count - 2)){
        $endpage = "<li><a href='{$uri}page={$pages_count}'><img src='".PATH.TEMPLATE."assets/img/l2.png' alt='pagination icon'></a></li>";
    }*/
    if($page - 2 > 0){
        $page2left = "<li><a href='{$uri}page=" .($page-2). "'>" . ($page-2) ."</a></li>";
    }
    if($page - 1 > 0){
        $page1left = "<li> <a href='{$uri}page=" . ($page-1) . "'>" . ($page-1) ."</a></li>";
    }
    if($page + 2 <= $pages_count){
        $page2right = "<li> <a href='{$uri}page=" .($page+2). "'>" .($page+2). "</a></li>";
    }
    if($page + 1 <= $pages_count){
        $page1right = "<li> <a href='{$uri}page=" .($page+1). "'>" .($page+1). "</a></li>";
    }
    
    // формируем вывод навигации
    echo "<ul class='pagination'>" .$back.$page2left.$page1left."<li class='active'><a>".$page."</a></li>".$page1right.$page2right.$forward. "</ul>";
}
