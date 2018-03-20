# Установка

Пошаговая инструкция для запуска среды разработки:

Клонируйте или скачайте данный репозиторий

```bash
git clone <repository_url>
```

Перейдите в папку проекта

```bash
cd <repository_name>
```

Скопируйте конфигурационные файлы

```bash
cp config-dist.php config.php;
```

Создайте новую Базу данных и загрузите в нее дамп из файла `/sql/schema.sql`

Дамп содержит таблицу users, с пользователем, по умолчанию:
```bash
Login : admin
Pass  : 123
```

В файле `/config.php` отредактируйте учетные данные для соединения с БД

```php
<?php
    define('HOST', '<host>'   );
    define('USER', '<user>'   );
    define('PASS', '<pass>'   );
    define('DB',   '<db_name>');
```


2018 © Readyways
