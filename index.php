<?php
ini_set('display_errors', 1);
require_once 'app/inc.php';

// Соединяемся с БД
$dbObject = new PDO('mysql:host='.APP_DB_HOST.';dbname='.APP_DB_DATABASE, APP_DB_USER, APP_BASE_PATH);