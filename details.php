<?php
include './common/common.php';
if (empty($_SESSION['username'])) {
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
	case 'forum':
		if (empty($_POST['content'])) {
			setcookie('flag','sb',time()+1);
			header("location: index.php?skip=forum&&cid=$cid");
			die();
		}
		$content = $_POST['content'];
		$first = intval( $_POST['first']);
		$cid = intval( $_POST['cid']);
		$uid = intval($_SESSION['uid']);
		$tid = 0;
		$addip = intval($_SESSION['ip']);
		$title = $_POST['title'];
		$time = time();
		$username = $_SESSION['username'];
		$user = db_select($link,'user','grade',"username = '$username'");
		$grade = intval($user[0]['grade']) +2;
		$arr = [
			'title'	   => $title,
			'first'    => $first,
			'authorid' => $uid,
			'classid'  => $cid,
			'addip'	   => $addip,
			'addtime'  => $time,
			'content'  => $content,
			'tid'	   => $tid	
		];
		$res = db_insert($link, 'details', $arr);
		if (!$res) {
			setcookie('flag','sb',time()+1);
			header("location: index.php?skip=forum&&cid=$cid");
			die();
		}
		$row = db_update($link,'user',"grade = $grade", "uid = $uid");
			setcookie('flag','ok',time()+1);
			header("location: index.php?skip=forum&&cid=$cid");
		break;

	case 'read':
		$content = $_POST['content'];
		$first = intval( $_POST['first']);
		$tid = intval( $_POST['uid']);
		$cid = intval( $_POST['cid']);
		$uid = intval($_SESSION['uid']);
		$addip = intval($_SESSION['ip']);
		$id = intval($_POST['id']);
		$title = db_select($link,'details','title',"id=$id");
		$time = time();
		$arr = [
			'title'	   => $title[0]['title'],
			'first'    => $first,
			'authorid' => $uid,
			'classid'  => $cid,
			'tid'	   => $id,
			'addip'	   => $addip,
			'addtime'  => $time,
			'content'  => $content
		];
		//var_dump($arr);
		$res = db_insert($link, 'details', $arr);
		if (!$res) {
			setcookie('flag','shibai',time()+1);			
			header("location: index.php?skip=$skip&&flag=shibai&&id=$id&&cid=$cid&&uid=$tid&&rate=0");
			die();
		}
			$row =  db_select($link,'details','replycount',"id=$id");
			$ryw =  db_select($link,'cate_gory','motifcount',"cid=$cid");
			$rep = $row[0]['replycount']+1;
			$mot = $ryw[0]['motifcount']+1;
			$kk = db_update($link,'details',"replycount = $rep","id=$id");
			$yy = db_update($link,'cate_gory',"motifcount = $ss","cid=$cid");
			setcookie('flag','success',time()+1);
			header("location: index.php?skip=$skip&&flag=success&&id=$id&&cid=$cid&&uid=$tid&&rate=0");
			die();
		break;
	default:
		# code...
		break;
}