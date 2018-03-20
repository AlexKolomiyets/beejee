<?php
// Запрет прямого доступа к файлу
defined('portal')or die("Access denied");

/**
 * загрузка изображений
 * @param  string $name имя изображения
 * @param  string $path путь к директории к картинкам
 * @param  array $input массив описания изображения
 * @param  string $input_key
 * @return string новое имя картинки
 */
function upload_image($name, $path, $input='baseimg', $input_key=NULL){

    // Допустимые типы файлов
    $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png");

    // Проверка папки
    if (!is_writable($path)) {
        $_SESSION['result'] = array('class' => 'danger', 'msg' => "Проверьте права на директорию: \"$path\"");
        return false;
    }

    // Изображение
    $file = $_FILES[$input];
    $file_name = !is_null($input_key) ? $file['name'][$input_key] : $file['name'];

    if ($file_name) {
        $baseimgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $file_name)); // расширение картинки
        $baseimgName = "{$name}.{$baseimgExt}"; // новое имя картинки
        $baseimgTmpName = !is_null($input_key) ? $file['tmp_name'][$input_key] : $file['tmp_name']; // временное имя файла
        $baseimgSize = !is_null($input_key) ? $file['size'][$input_key] : $file['size']; // вес файла
        $baseimgType = !is_null($input_key) ? $file['type'][$input_key] : $file['type']; // тип файла
        $baseimgError = !is_null($input_key) ? $file['error'][$input_key] : $file['error']; // 0 - OK, иначе - ошибка
        $error = "";

        // Проверка изображения
        if (!in_array($baseimgType, $types)) $error .= "Допустимые расширения - .gif, .jpg, .png<br>";
        if ($baseimgSize > SIZE) $error .= "Максимальный вес файла - ". formatBytes(SIZE) ."<br>";
        if ($baseimgError) $error .= "Ошибка при загрузке файла. Возможно, файл слишком большой";

        // Записываем ошибки в сессию
        if(!empty($error)) {
            if (!$_SESSION['result']) {
                $_SESSION['result'] = array('class' => 'danger', 'msg' => $error);
            } else {
                $_SESSION['result']['msg'] .= '<br><br>' . $error;
            }
        }

        // Если нет ошибок
        if (empty($error)) {

            // Если удалось переместить картинку возвращаем имя загруженного файла
            if (@move_uploaded_file($baseimgTmpName, $path . $baseimgName)) {
                return $baseimgName;
            }

            // В инном случае, записываем сообщение об ошибке
            $_SESSION['result'] = array('class' => 'danger', 'msg' => "Не удалось переместить загруженную картинку!");
            return false;
        }

        return false;
    }
}