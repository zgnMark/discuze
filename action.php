<?php
include 'common/common.php';
/*if (!$_REQUEST['action']) {
	die("非法操作，您的IP已被记录！！");
}*/
$action = $_REQUEST['action'];
var_dump($action);
switch ($action) {
	case 'register':
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$password = md5($pass);
		$repass = $_POST['repassword'];
		$email = $_POST['email'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$code = $_POST['code'];
		$numeric = is_numeric ($pass) ? true : false;
		//检查验证码是否真确
		if (strcasecmp($code, $_SESSION['code'])) {
			setcookie("flag",'code',time()+1);
			header("location: register.php");
			exit();
		}
		//检查用户名是否符合长度
		if (strlen($user) < 3 || strlen($user) > 20) {
			setcookie('flag','user',time()+1);
			header("location:register.php");
			exit();
		}
		//密码是否为纯数字
		if ($numeric) {
			setcookie('flag','numeric',time()+1);
			header("location:register.php");
			exit();
		}
		//验证邮箱格式是否正确		
		$reg = '/^\w+@(\w+\.)+(com|cn|net|org|edu)$/';
		if (!preg_match($reg, $email, $match)) {
			setcookie('flag','email',time()+1);
			header("location:register.php");
			exit();
		} 
		//检查用户名是否已经存在
		$res = db_select($link, 'user', '*', "username = '$user'");
		if ($res) {
			setcookie('flag','repeat',time()+5);
			header("location:register.php");
			exit();
		}
		//检查两次密码是否一样
		if ($pass != $repass) {
			setcookie('flag','repass',time()+1);
			header("location:register.php");
			exit();
		}
		$ip == '::1'? $ip ='127.0.0.1' :$ip ;
		$ip = ip2long($ip);
		$regtime = time();
		//准备插入字段
		$arr = [
			'username' => $user,
			'password' => $password,
			'email' => $email,
			'regtime' => $regtime,
			'ip' => $ip,
		];
		$res = db_insert($link, 'user', $arr);
		if (!$res) {
			setcookie('flag','unknow',time()+1);
			header("location:register.php");
			die();
		}
		$res = db_select($link,'user','*',"username= '$user'");
			foreach ($res[0] as $key => $value) {
				$_SESSION[$key] = $value;
			}
			setcookie('flag','ok',time()+1);
			header("location:index.php");
			exit("注册成功了，直接登录");
			break;
	case 'login':
		var_dump($_POST);
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$res = db_select($link,'user','*',"username= '$user'");
		$password = $res[0]['password'];
		//检查ip是否在黑名单
		$ip = $_SERVER['REMOTE_ADDR'];
		$ip == '::1'? $ip ='127.0.0.1' :$ip ;
		$ip = ip2long($ip);
		$row = db_select($link,'ip_close','*',"cip=$ip");
		$time = time();
		if ($row || $row['overtime'] > $time) {
			setcookie('flag','ip',time()+300);
			header("location:index.php");
			exit();
		}
		//检查用户名是否正确
		if (!$res) {
			setcookie('flag','user',time()+1);
			$num = $_COOKIE['num'];
			empty($num) ? $num = 1 : $num = $_COOKIE['num'] + 1;
			setcookie('num',"$num",time()+300);
			header("location:index.php");
			exit();
		}
		//检查密码是否正确
		if (strcmp(md5($pass), $password)) {
			setcookie('flag','pass',time()+1);
			$num = $_COOKIE['num'];
			empty($num) ? $num = 1 : $num = $_COOKIE['num'] + 1;
			setcookie('num',"$num",time()+300);
			header("location:index.php");
			exit();
		}
		//把用户信息遍历到session
		foreach_session($link,'user',$user);
		//记录最后一次登陆时间 每天第一次进入加分
		$times = time();
		$lastlogin= $res[0]['lasttime'];
		$last_day =  date("ymd",$lastlogin);
		$now_day  =  date("ymd");
		$grade = $res[0]['grade'];
		setcookie('flag','ok',time()+1);
		if($last_day != $now_day ){
     		$grade = $res[0]['grade']+10;
     		setcookie('flag','f_ok',time()+1);
			}
		db_update($link,'user',"lasttime=$times,grade=$grade","username= '$user'");
		header('location: index.php');
		break;
	case 'exit':
		session_destroy();
		setcookie('username', '', time()-1);
		setcookie('password', '', time()-1);
		header('location:index.php');
		break;
	default:
		# code...
		break;
}
