<?php
include 'common/common.php';
$flag = 'none';
if (!empty($_COOKIE['flag'])) {
	$flag = $_COOKIE['flag'];
}
$arr1 = $_SESSION;
$arr2 = compact('flag');
$arr = array_merge($arr1,$arr2);
display('admin_login.html',$arr);