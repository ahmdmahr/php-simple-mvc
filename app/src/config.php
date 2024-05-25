<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {

    define('ROOT', 'http://localhost/mvc/public');
} else {

    define('ROOT', 'https://www.mywebsite.com');
}

// database config
define('DBNAME', 'mvc');
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBDRIVER', '');

define('APP_NAME', 'My MVC');
define('APP_DESC', 'Practice makes perfect');

// true means show error but false don't.
define('DEBUG', true);


