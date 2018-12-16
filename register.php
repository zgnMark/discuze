<?php
include './common/common.php';
$flag = 'none';
if (!empty($_COOKIE['flag'])) {
 $flag = $_COOKIE['flag'];
}
$arr = compact('flag');
display('register.html',$arr);