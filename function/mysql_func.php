<?php
/**
 * db_connect 俺就是连接数据库的
 * @param  string $host    主机名
 * @param  string $user    用户名
 * @param  string $pwd     密码
 * @param  string $db_name 数据库名
 * @param  string $charset 字符集
 * @return mixed         成功返回连接对象，失败返回false
 */
function db_connect($host, $user, $pwd, $db_name, $charset='utf8')
{
	//连接数据库
	$link =  mysqli_connect($host, $user, $pwd);
	//判断是否连接成功
	if (!$link) {
		return false;
	} 
	//选择数据库
	$db = mysqli_select_db($link, $db_name);
	if (!$db) {
		mysqli_close($link);
		return false;
	}
	//设置字符集
	mysqli_set_charset($link, $charset);
	return $link;
}
/**
 * db_insert description
 * @param  object  	$link   description
 * @param  string  	$table  description
 * @param  array  	$data   description
 * @param  boolean 	$get_id description
 * @return bool          description
 */
function db_insert($link, $table, $data, $get_id=false)
{	
	//给字符串添加引号
	$data = add_quote($data);
	$fields = implode(',', array_keys($data));
	$values = implode(',', array_values($data));
	$sql = "insert into $table($fields) values($values)";
	echo "$sql";
	$res = mysqli_query($link, $sql);
	if ($res && mysqli_affected_rows($link)) {
		if ($get_id) {
			return mysqli_insert_id($link);
		}
		return true;
	} else {
		return false;
	}
}
/**
 * db_delete description
 * @param  type $link  description
 * @param  type $table description
 * @param  mixed $wheredescription
 * @return type       description
 */
function db_delete($link, $table, $where)
{
	if (is_string($where)) {
		$sql = "delete from $table where $where";
	} else if (is_array($where)) {
		$where = add_quote($where, 'delete');
		$where = implode(' and ', $where);
		$sql = "delete from $table where $where";
	}
	$res = mysqli_query($link, $sql);
	if ($res && mysqli_affected_rows($link)) {
		return true;
	} else {
		return false;
	}
}
/**
 * db_update description
 * @param  type $link  description
 * @param  type $table description
 * @param  type $set   description
 * @param  type $where description
 * @return type        description
 */
function db_update($link, $table, $set, $where)
{
	if (is_string($set) && is_string($where)) {
		$sql = "update $table set $set where $where";
	} else if (is_array($set) && is_array($where)) {
		$set = add_quote($set, 'update');
		$set = implode(',', $set);
		$where = add_quote($where, 'update');
		$where = implode(' and ', $where);
		$sql = "update $table set $set where $where";
	}
		$res = mysqli_query($link, $sql);
		//echo "$sql";
		if ($res && mysqli_affected_rows($link)) {
			return true;
		} else {
			return false;
		}
} 
/**
 * db_select description
 * @param  type $link    description
 * @param  type $table   description
 * @param  type $fields  description
 * @param  type $where   description
 * @param  type $groupby description
 * @param  type $orderby description
 * @param  type $limit   description
 * @param  type $type    description
 * @return type          description
 */
function db_select($link, $table, $fields, $where=null, $groupby=null, $orderby=null, $limit=null, $type = MYSQLI_ASSOC )
{
	if (is_array($fields)) {
		$fields = join(',', $fields);
	}
	$sql = "select $fields from $table";
	if ($where) {
		$sql .= " where $where";
	}
	if ($groupby) {
		$sql .= " group by $groupby";
	}
	if ($orderby) {
		$sql .= " order by $orderby";
	}
	if ($limit) {
		$sql .= " limit $limit";
	}
	//echo "$sql";
	$res = mysqli_query($link, $sql);
	if ($res && mysqli_affected_rows($link)) {
		$row = mysqli_fetch_all($res, $type);
		return $row;
	} else {
		return false;
	}
}
/**
 * add_quote description
 * @param type 		$data   description
 * @param string 	$option description
 */
function add_quote($data, $option='insert')
{
	if ($option == 'delete' || $option == 'update') {
		$arr = [];
		foreach ($data as $key => $val) {
			if (is_string($val)) {
				$arr[] = $key . " = '" . $val . "'";  
			} else {
				$arr[] = $key . " = " . $val . "";  
			}
		}
		return $arr;
	} else if ($option == 'insert') {
		foreach ($data as $key => $val) {
			if (is_string($val)) {
			$data[$key] = "'" . $val . "'";
			}
		}
		return $data;
	}
	
}


//查询数据库 遍历数据到session;
function foreach_session($link,$table,$username)
{
	$res = db_select($link,$table,'*',"username= '$username'");
	foreach ($res[0] as $key => $value) {
			$_SESSION[$key] =$value;
			if (!empty($_POST['autologin'])) {
				setcookie($key, $value, time()+86400*7);
			}
		}
}




