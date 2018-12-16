<?php
/**
 * [upload description]
 * @param  [type]  $key          [description]
 * @param  [type]  $path         [description]
 * @param  [type]  $maxsize      [description]
 * @param  [type]  $allow_mime   [description]
 * @param  [type]  $allow_suffix [description]
 * @param  boolean $isrand       [description]
 * @return [type]                [description]
 */
function upload($key, $path, $maxsize, $allow_mime, $allow_suffix, $isrand=true)
{
	//判断错误号
	$error = $_FILES[$key]['error'];
	if ($error) {
		switch ($error) {
		 		case 1:
		 			$msg = '文件大小超出了php.ini中的限制';
		 			break;
		 		case 2:
		 			$msg = '文件大小超出了html表单中的限制';
		 			break;
		 		case 3:
		 			$msg = '文件只有部分被上传';
		 			break;
		 		case 4:
		 			$msg = '没有文件被上传';
		 			break;
		 		case 6:
		 			$msg = '找不到临时文件夹';
		 			break;
		 		case 7:
		 			$msg = '文件写入失败';
		 			break;
		 }
		 return [0, $msg];
 	}
 	//判断问件是否超出大小
 	$size = $_FILES[$key]['size'];
 	if ($size > $maxsize) {
 		return [0, '信息量太大'];
 	}
 	//判断问件的mime和后缀名是否符合
 	$suffix = pathinfo($_FILES[$key]['name'])['extension'];
 	if (!in_array($suffix, $allow_suffix)) {
 		return [0, '不是允许的后缀名'];
 	}
 	$mime = $_FILES[$key]['type'];
 	if (!in_array($mime, $allow_mime)) {
 		return [0, '不是允许的mime'];
 	}
 	//拼接文件路径 这里要判断是不是启用随机的名字
 	$path =  rtrim($path, '/') . '/';
 	if ($isrand) {
 		$filepath = $path . uniqid() . '.' . $suffix;
 	} else {
 		$filepath = $path . $_FILES[$key]['name'];
 	}
 	$savepath = pathinfo($filepath)['basename'];
 	
 	//判断是否是上传文件并移动
 	if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
 		if (move_uploaded_file($_FILES[$key]['tmp_name'], $filepath)) {
 			return [1, $savepath];
 		} else {
 			return [0, '上传失败'];
 		}
 	} else {
 		return [0, '不是上传文件'];
 	}
}