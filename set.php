<?php
include './common/common.php';
if (empty($_SESSION)) {
	header('location: index.php');
	die();
}
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$photo = $_SESSION['photo'];
	$uid = ['uid' => $_SESSION['uid'] ];
if (empty($_GET['set'])) {
	header('location: update.php');
	die();
}
$set = $_GET['set'];
switch ($set) {
	case 'photo':
		$path = PUBLIC_DIR. '/upload';
		$allow_mime = explode(',',IMG_MIME);
		$allow_suffix = explode(',',SUFFIX);
		$row = upload('photo', $path, '5000000', $allow_mime, $allow_suffix);
		$photo = $row[1];
		$photo = zoom($photo);
		$res = db_update($link, 'user', "photo = '$photo'", "uid = " . $_SESSION['uid']);
		$_SESSION['photo'] = $photo;
		break;

	case 'autograph':
		$autograph = $_POST['autograph'];
		$res = db_update($link, 'user', "autograph= '$autograph'",  "uid = " . $_SESSION['uid']);
		if (!$res) {
			setcookie("flag",'1',time()+1);
			header("location: update.php?$set");
		}
		break;
	case 'pass_safe':
		if (empty($_POST)) {
			setcookie("flag",'0',time()+1);
			header('location:update.php');
			die();
		}
		var_dump($_POST);
		if ($_POST['newpass'] != $_POST['re_newpass']) {
			setcookie("flag",'0',time()+1);
			header("location: update.php?$set");
			die();
		}
		$arr = [
			'password' => $_POST['newpass'],
			'email'	   => $_POST['email']
		];
		$res = db_update($link, 'user', $_POST, $uid);
		setcookie("flag",'2',time()+1);
		break;
	default:
		if (empty($_POST)) {
			header("location:update.php?set=$set&&flag=1");
			die();
		}
		$sex = intval($_POST['sex']);
		$uid = ['uid' => $_SESSION['uid'] ];
		$arr = [
			'realname' => $_POST['realname'],
			'sex' => $sex,
			'qq' => $_POST['qq'],
			'safe' => $_POST['safe'],
		];
		$res = db_update($link, 'user', $arr, $uid);
		if (!$res) {
			setcookie("flag",'2',time()+1);
			header("location: update.php?set=$set");
		}
		break;
}
header("location: update.php?set=$set&&flag=0");
