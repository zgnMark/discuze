<?php
include './common/common.php';
if (empty($_POST)) {
	header('location:admin_index.php?skip=web&&set=web1');
	die();
}
foreach ($_POST as $key => $value) {
	if (empty($value)) {
		unset($_POST[$key]);
	}
}
switch ($_GET['skip']) {
	case 'web1':
		$arr = ["wid" => 1];
		$res = db_update($link, 'web_info',$_POST,$arr);
		if (!$res) {
			header('location:admin_index.php?skip=web1');exit();
		}	
			header('location:admin_index.php?skip=web1');
		break;
	case 'web2':
		if (!empty($_POST['delete'])) {
			$lid= join(',',$_POST['lid']);
			$where = "lid in ($lid)";
			$res = db_delete($link, 'bbs_link', $where);
		}
			//修改
		if (!empty($_POST['update'])) {
			foreach ($_POST as $key => $value) {
				$str1 = substr($key, 0 ,1);				
				$str2 = ltrim($key,$str1); 
				$arr1 = ["lid" => $str1];
				$arr2 = [$str2 => $value];
				$res = db_update($link,'bbs_link',$arr2, $arr1);
			}
		}
			//增加
		if (!empty($_POST['add'])) {
				array_pop($_POST);
				$res = db_insert($link,'bbs_link',$_POST);
		}
		if (!$res) {header('location:admin_index.php?skip=web2');}	
		header('location:admin_index.php?skip=web2');
		break;
	case 'user1':
		var_dump($_POST);
		foreach ($_POST['uid'] as $key => $value) {
			$where = 'uid = $value';
			$res = db_delete($link,'ip_close' , $where);
		if (!$res) {
				setcookie("flag",'3',time()+1);
				header('location:admin_index.php?skip=user1');
				exit();
			}
			header('location:admin_index.php?skip=user1');
		}
		break;
	case 'user2':
		if (!checkip($_POST['cip'])) {
			setcookie("flag",'1',time()+1);
			header('location:admin_index.php?skip=user2');
			exit();	
		}
		if (empty($_POST['cip']) || empty($_POST['day'])) {
			setcookie("flag",'2',time()+1);
			header('location:admin_index.php?skip=user2');
			exit();	
		}
			$addtime = time();
			$overtime = time() + $_POST['day']*86400;
			$arr = [
				'cip' => ip2long($_POST['cip']),
				'addtime' => $addtime,
				'overtime' => $overtime
			];
			$res = db_insert($link,'ip_close',$arr);
			if (!$res) {
				setcookie("flag",'3',time()+1);
				header('location:admin_index.php?skip=user2');
				exit();
			}
			header('location:admin_index.php?skip=user2');
		break;
	case 'user11':
		$uid = ['uid' => intval($_GET['uid']) ];
		$res = db_update($link, 'user', $_POST, $uid);
		$uid = intval($_GET['uid']);
		header("location:admin_index.php?skip=user11&&uid=$uid");
		break;
	case 'plate1':
		foreach ($_POST as $key => $value) {
			preg_match_all('/\d+/',$key,$arr);
			$str1 = $arr[0][0];			
			$str2 = ltrim($key,$str1); 
			is_numeric($value)?$value = intval($value):$value;
			is_numeric($str1)?$str1 = intval($str1):$str1;
			$arr1 = ["cid" => $str1];
			$arr2 = [$str2 => $value];
			$res = db_update($link,'cate_gory',$arr2, $arr1);
		}
		if (!empty($_POST['del']) ) {
			$cid = intval($_POST['del']);
			$res = db_delete($link,'cate_gory',"cid= $cid");
		}
		if (!$res) {
			header('location:admin_index.php?skip=plate1');
		}
		header('location:admin_index.php?skip=plate1');
		break;
	case 'plate2':
		if (empty($_POST)) {
			header('location:admin_index.php?skip=plate2');
		}
		if ($_POST['plate'] && empty($_POST['bigplate'])) {
			$arr =[ 
					'classname' =>		$_POST['plate'],
					'parentid'	=>		'0'
					];
			$res = db_insert($link , 'cate_gory' , $arr);
		}
		if ($_POST['plate'] && $_POST['bigplate']) {
			$str = $_POST['bigplate'];
			$res = db_select($link,'cate_gory','cid',"parentid = 0 and classname = '$str'");
			foreach ($res as $key => $value) {
				$num = intval($value['cid']);
				$arr =[
						'classname' =>		$_POST['bigplate'],
						'parentid'	=>		$num	
					];
				$res = db_insert($link , 'cate_gory' , $arr);
			}	
		}
		if (!$res) {
			setcookie("flag",'3',time()+1);
			header('location:admin_index.php?skip=plate2');die();
		}
			header('location:admin_index.php?skip=plate2');
		break;
	case 'detail1':
		foreach ($_POST['id'] as $key => $value) {
			$id = intval($_POST['id'][$key]);
			$res = db_update($link,'details',"isdel = 1","id = $id");
		}
		if (!$res) {
			setcookie("flag",'',time()+1);
			header('location:admin_index.php?skip=detail1');
		}
		header('location:admin_index.php?skip=detail1');
		break;
	case 'detail2':
		if (!empty($_POST['del'])) {
				foreach ($_POST['id'] as $key => $value) {
				$id = intval($_POST['id'][$key]);
				$res = db_delete($link,'details',"id = $id");
				}
			}else{
				foreach ($_POST['id'] as $key => $value) {
				$id = intval($_POST['id'][$key]);
				$res = db_update($link,'details',"isdel = 0","id = $id");
				}
			}
			if (!$res) {
				setcookie("flag",'fail',time()+1);
				header('location:admin_index.php?skip=detail2');
			}
			header('location:admin_index.php?skip=detail2');
			break;
	case 'detail3':
		foreach ($_POST['id'] as $key => $value) {
			$id = intval($_POST['id'][$key]);
			$res = db_update($link,'details',"isdel = 1","id = $id");
		}
		if (!$res) {
			setcookie("flag",'',time()+1);
			header('location:admin_index.php?skip=detail3');
		}
		header('location:admin_index.php?skip=detail3');
		break;
	case 'detail4':
		if (!empty($_POST['del'])) {
				foreach ($_POST['id'] as $key => $value) {
				$id = intval($_POST['id'][$key]);
				$res = db_delete($link,'details',"id = $id");
				}
			}else{
				foreach ($_POST['id'] as $key => $value) {
				$id = intval($_POST['id'][$key]);
				$res = db_update($link,'details',"isdel = 0","id = $id");
				}
			}
			if (!$res) {
				setcookie("flag",'fail',time()+1);
				header('location:admin_index.php?skip=detail4');
			}
			header('location:admin_index.php?skip=detail4');
			break;
	default:
		# code...
		break;
}


			