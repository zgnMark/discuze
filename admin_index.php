<?php
include './common/common.php';
if (empty($_SERVER['HTTP_REFERER'])) {
	var_dump($_SERVER['HTTP_REFERER']);
	//header("location: ");
	die();
}
$flag = 'none';
if (!empty($_COOKIE['flag'])){
	$flag = $_COOKIE['flag'];
}
$skip = $_GET['skip'];
switch ($_GET['skip']) {
	//站点管理
	case 'web1':
		$res = db_select($link,'web_info','*');
		$res = compact('res','skip');
		display('admin_index.html',$res);die();
		break;
	case 'web2':
		$res = db_select($link,'bbs_link','*');
		$res = compact('res','skip');
		display('admin_index.html',$res);die();
		break;
	//用户管理
	case 'user1':
		$res = db_select($link,'user','*');
		$sum = array_count_values(array_keys($res));
		$res = compact('res','skip','sum');
		display('admin_index.html',$res);die();
		break;
		//用户详情
		case 'user11':
			$uid = $_GET['uid'];
			$res = db_select($link,'user','*',"uid = $uid");
			$res = compact('res','skip','uid');
			display('admin_index.html',$res);die();
			break;
	case 'user2':
		$res = db_select($link,'ip_close','*');
		$cip = long2ip($res[0]['cip']);
		$addtime = date('Y-m-d H:i:s', $res[0]['addtime']);
		$overtime = date('Y-m-d H:i:s', $res[0]['overtime']);
		$res = compact('res','skip','cip','addtime','overtime','flag');
		display('admin_index.html',$res);
		break;
	//板块管理
	case 'plate1':
		$res = db_select($link,'cate_gory','*');
		$res = compact('res','skip','flag');
		display('admin_index.html',$res);
		die();
		break;
	case 'plate2':
		$res = db_select($link,'cate_gory','classname','parentid = 0');
		$res = compact('res','skip','flag');
		display('admin_index.html',$res);

		break;
	//帖子管理
	case 'detail1':
		$res = db_select($link,'details,user,cate_gory',
			'title,classname,username,details.replycount,hits,addtime',
			'details.authorid=user.uid and details.classid=cate_gory.cid and details.first=1 and isdel=0',
			'','details.id desc'
			);
		$sum = count(array_keys($res));
		$size = 4; //每页展示的数据
		$page = empty($_GET['page']) ? 1  : $_GET['page'];
		$arr = part_page($sum,$size);
		$lim = $arr[1][0];
		$prev = $arr[1][1];
		$next = $arr[1][2];
		$row = db_select($link, 'details,user,cate_gory',
								'details.id,title,classname,username,details.replycount,hits,addtime',
								'details.authorid=user.uid and details.classid=cate_gory.cid and details.first=1 and isdel=0',
								'',
								'details.id desc',
			$lim);
		$res = compact('row','skip','flag','sum','lim','arr','prev','next');
		display('admin_index.html',$res);
		break;
	case 'detail2':
		$res = db_select($link, 'details,user,cate_gory',
								'title,classname,username,details.replycount,hits,addtime',
				'details.authorid=user.uid and details.classid=cate_gory.cid and details.first=1 and isdel=1',
								'',
								'details.id desc'
			);
		if (!$res) {
			$res = compact('skip');
			setcookie("flag",'yhz',time()+1);
			display('admin_index.html',$res);
			die();
		}
		$sum = count(array_keys($res));
		$size = 4; //每页展示的数据
		$page = empty($_GET['page']) ? 1  : $_GET['page'];
		$arr = part_page($sum,$size);
		$lim = $arr[1][0];
		$prev = $arr[1][1];
		$next = $arr[1][2];
		$row = db_select($link, 'details,user,cate_gory',
								'details.id,title,classname,username,details.replycount,hits,addtime',
				'details.authorid=user.uid and details.classid=cate_gory.cid and details.first=1 and isdel=1',
								'',
								'details.id desc',
			$lim);
		$res = compact('row','skip','flag','sum','lim','arr','prev','next');
		if (!$row) {
			$res = compact('skip');
			setcookie("flag",'yhz',time()+1);
		}
		display('admin_index.html',$res);
		break;

		break;
	case 'detail3':
		$res = db_select($link,'details,user,cate_gory',
			'content,classname,username,addtime',
			'details.authorid=user.uid and details.classid=cate_gory.cid and details.first=0 and isdel=0',
			'','details.id desc'
			);
		if (!$res) {
			$res = compact('skip');
			setcookie("flag",'yhz',time()+1);
			display('admin_index.html',$res);
			die();
		}
		$sum = count(array_keys($res));
		$size = 4; //每页展示的数据
		$page = empty($_GET['page']) ? 1  : $_GET['page'];
		$arr = part_page($sum,$size);
		$lim = $arr[1][0];
		$prev = $arr[1][1];
		$next = $arr[1][2];
		$row = db_select($link, 'details,user,cate_gory',
								'details.id,content,classname,username,addtime',
								'details.authorid=user.uid and details.classid=cate_gory.cid and details.first=0 and isdel=0',
								'',
								'details.id desc',
						$lim);
		$res = compact('row','skip','flag','sum','lim','arr','prev','next');
		if (!$row) {
			$res = compact('skip');
			setcookie("flag",'yhz',time()+1);
		}
		display('admin_index.html',$res);
		break;
	case 'detail4':
		$res = db_select($link, 'details,user,cate_gory',
								'content,classname,username,addtime',
				'details.authorid=user.uid and details.classid=cate_gory.cid and details.first=1 and isdel=1',
								'',
								'details.id desc'
			);
		if (!$res) {
			$res = compact('skip');
			setcookie("flag",'yhz',time()+1);
			display('admin_index.html',$res);
			die();
		}
		$sum = count(array_keys($res));
		$size = 4; //每页展示的数据
		$page = empty($_GET['page']) ? 1  : $_GET['page'];
		$arr = part_page($sum,$size);
		$lim = $arr[1][0];
		$prev = $arr[1][1];
		$next = $arr[1][2];
		$row = db_select($link, 'details,user,cate_gory',
								'details.id,title,classname,username,details.replycount,hits,addtime,content',
								'details.authorid=user.uid and details.classid=cate_gory.cid and details.first=0 and isdel=1',
								'',
								'details.id desc',
			$lim);
		$res = compact('row','skip','flag','sum','lim','arr','prev','next');
		if (!$row) {
			$res = compact('skip');
			setcookie("flag",'yhz',time()+1);
		}
		display('admin_index.html',$res);
		break;
	













	//登陆
	default:
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$code = $_POST['code'];
		$res = db_select($link,'user','*',"username= '$user'");
		$password = $res[0]['password'];
		//检查验证码是否正确
		if (strcasecmp($code, $_SESSION['code'])) {
			setcookie("flag",'code1',time()+1);
			header("location: admin_login.php");
			exit();
		}
		//检测用户名是否正确
		if (!$res) {
			setcookie('flag','user',time()+1);
			header("location:admin_login.php");
			exit();
		}
		//检查密码是否正确
		if (strcmp(md5($pass), $password)) {
			setcookie('flag','pass',time()+1);
			header("location:admin_login.php");
			exit();
		}
		//检查是否为管理员
		if ($res['0']['udertype'] != 1) {
			setcookie('flag','udertype',time()+1);
			header('location: action.php?action=exit');
		}
		foreach_session($link,'user',$user);
		$res = db_select($link,'web_info','*');
		$skip = 'web1';
		$res = compact('res','skip');
		display('admin_index.html',$res);
		break;
}
die();
