<?php

include 'common/common.php';
//接收搜索帖子相关内容
if (!empty($_POST)) {
	$search = $_POST['search'];
}
if (!empty($_GET)){
	$search = $_GET['search'];
}
$flag = 1;
//查询所有相关内容的帖子的所有数
$sql = "select count(id) as count from details where title like '%$search%' or content like '%$search%' and first = 1 and isdel != 0";
$res = mysqli_query($link, $sql);
	if ($res && mysqli_affected_rows($link)) {
		$row = mysqli_fetch_all($res, MYSQLI_ASSOC);
	} else {
		 $flag = 0; 
		 display('search.html',$flag);	
		 die();
	}
if ($row[0]['count'] == '0') {
	setcookie('flag','fail',time()+1);
	header("location:index.php");
	die();
}
$sum = $row[0]['count'];
$size = 4; //每页展示的数据
$pagecount = ceil($sum/$size);
$page = empty($_GET['page']) ? 1  : $_GET['page'];
$arr3 = part_page($sum,$size);
$lim = $arr3[1][0];
$prev = $arr3[1][1];
$next = $arr3[1][2];	
$sql1 = "select title,content,id,replycount,addtime,hits from details where title like '%$search%' or content like '%$search%' and first = 1 and isdel != 0 limit $lim";
$res1 = mysqli_query($link, $sql1);
	if ($res && mysqli_affected_rows($link)) {
		$row1 = mysqli_fetch_all($res1, MYSQLI_ASSOC);
		setcookie('flag','1',time()+1);
	} else {
		setcookie('flag','0',time()+1);
	};
mysqli_close($link);
//模版文件
$arr = compact('sum','row1','next','prev','arr3','pagecount','search','flag');
 display('search.html',$arr);