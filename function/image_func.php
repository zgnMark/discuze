<?php
function zoom($image_name, $is_rand=true, $type='png', $path=PUBLIC_DIR.'/upload/')
{
	//打开图片
	$image = $path.$image_name;
	$img = image_open($image);
	//获取图片宽高
	list($width, $height) = getimagesize($image);
	$new_width = 50;
	$new_height = 50;
	//创建画布
	$new_img = imagecreatetruecolor($new_width, $new_height);
	//拷贝图片
	imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	//生成图片的名字  保存在指定路径
	if ($is_rand) {
		$name = uniqid() . '.' . $type;
	} else {
		$name = pathinfo($image_name)['filename'] . '.' . $type;
	}
	$path = $path. $name;
	$func = 'image' . $type;
	$func($new_img, $path);
	return $name;
	//关闭资源
	imagedestroy($img);
	imagedestroy($new_img);

}
function  water($zouyu, $mengzi, $position=1, $alpha=50, $type='png', $path='./zoumeng/', $is_rand=true)
{
	//打开两个图片
	$zouyu_img = image_open($zouyu);
	$mengzi_img = image_open($mengzi);
	//获取两个图片的宽高
	list($z_width, $z_height) = getimagesize($zouyu);
	list($m_width, $m_height) = getimagesize($mengzi);
	//getimagesize($mengzi);
	//计算水印位置
	switch($position) {
		case 1:
			$x = 0;
			$y = 0;
			break;
		case 2:
			$x = ($z_width-$m_width)/2;
			$y = 0;
			break;
		case 3:
			$x = $z_width-$m_width;
			$y = 0;
			break;
		case 4:
			$x = 0;
			$y = ($z_height-$m_height)/2;
			break;
		case 5:
			$x = ($z_width-$m_width)/2;
			$y = ($z_height-$m_height)/2;
			break;
		case 6:
			$x = $z_width-$m_width;
			$y = ($z_height-$m_height)/2;
			break;
		case 7:
			$x = 0;
			$y = $z_height-$m_height;
			break;
		case 8:
			$x = ($z_width-$m_width)/2;
			$y = $z_height-$m_height;
			break;
		case 9:
			$x = $z_width-$m_width;
			$y = $z_height-$m_height;
			break;
		case 0:
			$x = mt_rand(0, $z_width-$m_width);
			$y = mt_rand(0, $z_height-$m_height);
			break;
	}
	//贴水印
	imagecopymerge($zouyu_img, $mengzi_img, $x, $y, 0, 0, $m_width, $m_height, $alpha);
	//生成图片的名字  保存在指定路径
	if ($is_rand) {
		$name = uniqid() . '.' . $type;
	} else {
		$name = pathinfo($zouyu)['filename'] . '.' . $type;
	}
	$path = $path. $name;
	$func = 'image' . $type;
	$func($zouyu_img, $path);
	//关闭资源
	imagedestroy($zouyu_img);
	imagedestroy($mengzi_img);
}
/**
 * [image_open description]
 * @param  [type] $image_name [description]
 * @return [type]             [description]
 */
function image_open($path)
{	
	var_dump($path);
	$info = getimagesize($path);
	$mime = $info['mime'];
	switch($mime){
		case 'image/png':
			$img = imagecreatefrompng($path);
			break;
		case 'image/jpeg':
			$img = imagecreatefromjpeg($path);
			break;
		case 'image/gif':
			$img = imagecreatefromgif($path);
			break;
		case 'image/wbmp':
			$img = imagecreatefromwbmp($path);
			break;
	}
	return $img;
}