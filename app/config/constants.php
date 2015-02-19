<?php

define('APP_BASE_URL', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('APP_BASE_PATH', realpath(__DIR__ . DIRECTORY_SEPARATOR . '../../'));
define('APP_DB_USER', 'root');
define('APP_DB_PASS', 'admin');
define('APP_DB_HOST', 'localhost');
define('APP_DB_DATABASE', 'rts');
define('APP_DB_PREFIX', '');
define('APP_GB_MESSAGES_PER_PAGE', 5);
define('APP_DEFAULT_CONTROLLER', 'Auth');