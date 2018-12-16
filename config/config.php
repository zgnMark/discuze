<?php
//数据库
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', 'root');
define('DB_NAME', 'discuz');

//模版缓存路径
define('TPL_VIEW', str_replace('\\', '/', dirname(__DIR__)).'/view');
define('TPL_CACHE', str_replace('\\', '/', dirname(__DIR__)).'/cache');
//静态资源目录
define('PUBLIC_DIR', str_replace('\\', '/', dirname(__DIR__)) . '/public');

//图片类型
define('IMG_MIME', 'image/png,image/jpeg,image/gif');
define('SUFFIX', 'png,jpeg,jpg,gif');


//站点目录
define('WEB_SITE','http://lt.nice123.xin/');


