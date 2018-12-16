<?php
include 'common/common.php';
$flag = 'none';
$udertype = 0;
$skip = 'none';
$arr4 =0 ;
$distance = 0;
//检测是否自动登陆
if (!empty($_COOKIE['username'])){
	$arr1 = $_COOKIE;
	$arr2 = compact('flag','udertype');
	$arr = array_merge($arr1,$arr2);
}
//判断页面输出语句
if (!empty($_COOKIE['flag'])) {
	$flag = $_COOKIE['flag'];
}
//超过2次锁定输入框
if (!empty($_COOKIE['num'])) {
	if ($_COOKIE['num'] > 2) {
		$flag = 'flase';
		$arr = compact('flag','udertype');
		display('index.html',$arr);
		die();
	}
}
//处理首页
if (!empty($_GET['skip'])) {
	$skip = $_GET['skip'];
}
//判断是否登陆状态
if (!empty($_SESSION['username'])) {
	$username = $_SESSION['username'];
	$user = db_select($link,'user','*',"username = '$username'");
	$autograph = $user[0]['autograph'];
	$grade = $user[0]['grade'];
	$distance = distance($grade); 
	$level =level($grade);
	$arr4 = db_select($link,'level','*',"level = $level");
}
// 处理跳转页
switch ($skip) {
	//帖子页
	case 'forum':
		$arr1 = $_SESSION;
		if (!empty($_SESSION['username'])) {
			$udertype = $_SESSION['udertype'];
		}
		$cid = intval($_GET['cid']);
		//计算帖子总量
		$res = db_select($link,'details,user,cate_gory',
					'details.id,title,username,details.replycount,istop,classid,classname,elite,uid,details.replycount,hits',
					"details.authorid=user.uid and details.classid=$cid and details.first=1 and isdel=0 and cate_gory.cid = $cid",
					'','details.id desc'
					);
		if (!$res) {
			goto x;
		}
		//查看回复数如果超过设定值则为热贴
		foreach ($res as $key => $value) {
			if ($value['replycount'] > 2) {	
				$id = $value['id'];	
				$ss = db_update($link,'details','ishot = 1',"id = $id");
			}
		}
		$sum = count(array_keys($res));
		$size = 7; //每页展示的数据
		$pagecount = ceil($sum/$size);
		$page = empty($_GET['page']) ? 1  : $_GET['page'];
		$arr3 = part_page($sum,$size);
		$lim = $arr3[1][0];
		$prev = $arr3[1][1];
		$next = $arr3[1][2];
		//最热最新
		if (!empty($_GET['forum'])) {
			if ($_GET['forum'] == 'hot') {
					$res = db_select($link,'details,user,cate_gory',
					'details.id,title,username,details.replycount,istop,classid,classname,elite,uid,addtime,rate',
					"details.authorid=user.uid and details.classid=$cid and details.first=1 and isdel=0 and cate_gory.cid = $cid",
					'','details.replycount desc',
					$lim);
			}
			if ($_GET['forum'] == 'new') {
				$res = db_select($link,'details,user,cate_gory',
				'details.id,title,username,details.replycount,istop,classid,classname,elite,uid,addtime,rate',
				"details.authorid=user.uid and details.classid=$cid and details.first=1 and isdel=0 and cate_gory.cid = $cid",
				'','details.addtime desc',
				$lim);
				}
		}else{
		//正常显示
		$res = db_select($link,'details,user,cate_gory',
					'details.id,title,username,details.replycount,istop,classid,classname,elite,uid,addtime,rate',
					"details.authorid=user.uid and details.classid=$cid and details.first=1 and isdel=0 and cate_gory.cid = $cid",
					'','details.id desc',
					$lim);
		}
		x:
		if (!$res) {
			$res = 0;
			$sum = 0;
			$prev = 0;
			$next = 0;
			$arr3 = 0;
			$pagecount =0;
		}
		$nav = db_select($link,'cate_gory','*');
		$arr2 = compact('flag','udertype','res','skip','cid','sum','next','prev','arr3','pagecount','user','nav','arr4','distance');
		$arr = array_merge($arr1,$arr2);
		break;
	//帖子详情页
	case 'read':
		//接收传值
		if (empty($_SESSION['username'])) {
			setcookie('flag','dl',time()+1);
			header("location: index.php");
			die();
		}
		$arr1 = $_SESSION;
		$id = intval($_GET['id']);
		$cid = intval($_GET['cid']);
		$uid = intval($_GET['uid']);
		$rate = intval( $_GET['rate']);	  
		//查询数据库中浏览与积分的值
		$res = db_select($link,'details','*',"id = $id");
		$row = db_select($link,'user','*',"uid = $uid");
		//格式化时间戳，增加点击数，处理购买
		$addtime = date('Y-m-d H:i:s', $res[0]['addtime']);
		$hits = $res[0]['hits'] + 1;
		$grade = $row[0]['grade'] - $rate;
		db_update($link,'details',"hits = $hits","id=$id");
		db_update($link,'user',"grade = $grade","uid=$uid");
		//查询遍历帖子需要的数据
		$rsk = db_select($link,'details,user,cate_gory',
			'title,classname,username,details.replycount,hits,addtime,content,istop,id,uid,photo,tid,uid,rate',
			'details.authorid=user.uid and details.classid=cate_gory.cid and details.first=0 and isdel=0',
			'','details.id'
			);
		$nav = db_select($link,'cate_gory','*');
		$arr2 = compact('flag','udertype','res','skip','cid','id','row','addtime','rsk','cid','udertype','user','nav','arr4','distance');
		$arr = array_merge($arr1,$arr2);
		break;


	default:
		//处理初次进入时的页面
		if (empty($_SESSION['username'])) {
			$linkx = db_select($link,'bbs_link','*','','','web_order');	
			$res = db_select($link,'cate_gory','*');
			$res1 = db_select($link,'details','*');
			$res2 = db_select($link,'user','*');
			//计算数据总量
			$sum = count(array_keys($res));
			$sum1 = count(array_keys($res1));
			$sum2 = count(array_keys($res2));
			$nav = $res;
			$user = 0;
			$arr =compact('flag','udertype','res','skip','udertype','sum','sum1','sum2','linkx','nav','arr4','distance','user');
		break;
		}
		$username = $_SESSION['username'];
		$user = db_select($link,'user','*',"username = '$username'");
		$arr1 = $_SESSION;
		$udertype = $_SESSION['udertype'];
		$res = db_select($link,'cate_gory','*');
		$res1 = db_select($link,'details','*');
		$res2 = db_select($link,'user','*');
		$user = db_select($link,'user','*',"username = '$username'");
		$sum = count(array_keys($res));
		$sum1 = count(array_keys($res1));
		$sum2 = count(array_keys($res2));
		$linkx = db_select($link,'bbs_link','*','','','web_order');	
		$nav = $res;
		$arr2 = compact('flag','udertype','res','skip','udertype','res1','user','sum','sum1','sum2','linkx','nav','arr4','distance');
		$arr = array_merge($arr1,$arr2);
		break;
}
display('index.html',$arr);




