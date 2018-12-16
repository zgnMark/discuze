<?php
include './common/common.php';
if (empty($_SESSION)) {
	header('location: index.php');
	die();
}
foreach_session($link,'user',$_SESSION['username']);
$arr1 = $_SESSION;
$username=$_SESSION['username'];
$res = db_select($link,'user','*',"username='$username'");
$set = 'personal';
$flag ='none';
if (!empty($_COOKIE['flag'])) {
	$flag = $_COOKIE['flag'];
}
switch ($_GET['set']) {
	case 'photo':
		$set = 'photo';
		break;
	case 'grand':
		$set = 'grand';
		break;
	case 'autograph':
		$set = 'autograph';
		break;
	case 'pass_safe':
		$set = 'pass_safe';
		break;
	default:
		$set = 'personal';
		break;
}
$arr2 = compact('set','flag');
$arr = array_merge($arr1,$arr2,$res);
display('update.html',$arr);