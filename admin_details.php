<?php
include './common/common.php';
if (empty($_SESSION)) {
	setcookie('flag','dl',time()+1);
	header('location: index.php');
	die();
}
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$photo = $_SESSION['photo'];
	$uid = ['uid' => $_SESSION['uid'] ];
if (empty($_GET)) {
	header('location: index.php');
	die();
}
$skip = $_GET['skip'];
switch ($_GET['skip']) {
	case 'nice':
		$id = intval($_GET['id']);
		$cid = intval($_GET['cid']);
		if ($_GET['i'] == 1) {		
			$res = db_update($link,'details',"elite = 0","id = $id");
			setcookie('flag','ok',time()+1);
			header("location: index.php?skip=forum&&cid=$cid");
			break;
		}
		$res = db_update($link,'details',"elite = 1","id = $id");
		setcookie('flag','ok',time()+1);
		header("location: index.php?skip=forum&&cid=$cid");
		break;

	case 'top':
		$id = intval($_GET['id']);
		$cid = intval($_GET['cid']);
		if ($_GET['i'] == 1) {		
			$res = db_update($link,'details',"istop = 0","id = $id");
			setcookie('flag','ok',time()+1);
			header("location: index.php?skip=forum&&cid=$cid");
			break;
		}
		$res = db_update($link,'details',"istop = 1","id = $id");
		setcookie('flag','ok',time()+1);
		header("location: index.php?skip=forum&&cid=$cid");
		break;
	case 'del':
		$id = intval($_GET['id']);
		$cid = intval($_GET['cid']);
		$res = db_update($link,'details',"isdel = 1","id = $id");
		setcookie('flag','ok',time()+1);
		header("location: index.php?skip=forum&&cid=$cid");
		break;
	case 'pb':
		$id = intval($_GET['id']);
		$uid = intval($_GET['uid']);
		$cid = intval($_GET['cid']);
		$res = db_update($link,'details',"isdel = 1","id = $id");
		setcookie('flag','ok',time()+1);
		header("location: index.php?skip=read&&cid=$cid&&id=$id&&uid=$uid&&rate=0");
		break;
	default:
		# code...
		break;
}