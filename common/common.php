<?php
session_start();
define('BASE_NAME', str_replace('\\', '/', dirname(__DIR__)));
include BASE_NAME . '/config/config.php';
include BASE_NAME . '/function/tpl_func.php';
include BASE_NAME . '/function/mysql_func.php';
include BASE_NAME . '/function/captcha_func.php';
include BASE_NAME . '/function/upload_func.php';
include BASE_NAME . '/function/image_func.php';
include BASE_NAME . '/function/preg_func.php';
include BASE_NAME . '/function/part_page.php';
include BASE_NAME . '/function/level_func.php';
$link = db_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);