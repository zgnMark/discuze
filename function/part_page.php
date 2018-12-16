<?php
function part_page($count,$size)
{
	if (empty($count)) {
		return;
	}
	$pageCount = ceil($count/$size);
	$page = empty($_GET['page']) ? 1  : $_GET['page'];
	//偏移量
	if ($page < 1) {
		$page = 1;
	}
	//如果当前页大于最大页数 就让他等于最大页数
	if ($page > $pageCount) {
		$page = $pageCount;
	}
	//上一页	如果当前页等于一 就让上一页也等于一
	$prev = $page == 1 ? 1 :  $page - 1;
	//下一页	如果当前页等于最大页数 就让上一页也等于最大页数
	$next = $page == $pageCount  ? $pageCount  : $page + 1; 
	$offset = ($page-1) * $size;
	$lim = "$offset,$size";
	for ($i=1; $i <= $pageCount ; $i++) {
	 		$arr[$i-1] = $i;
	}
	$str = [$lim,$prev,$next];
	$array = [$arr,$str];
	return $array;
	
}