<?php
/**
 * [code description]
 * @param  integer $width  [验证码宽度]
 * @param  integer $height [验证码高度]
 * @param  integer $type   [验证码类型 0：纯数字 1：纯字母 2：字母数字混合 3：计算公式]
 * @param  integer $num    [验证码字符串位数]
 * @return [type]          [description]
 */

function captcha($width=200, $height=50, $type=3, $num=4)
{
	//创建画布
	$img = imagecreatetruecolor($width, $height);
	//给画布填充颜色
	imagefill($img, 0, 0, light_color($img));
	//生成随机$num位字符串
	switch($type) {
		case 0:
			$code = rand_number($num);
			break;
		case 1:
			$code = rand_abc($num);
			break;
		case 2:
			$code = rand_abc_number($num);
			break;
		case 3:
			$res = rand_compute($num);
			$code = $res[0];
			break;	
	}
	//随机写入字符串
 	for ($i= 0; $i < $num; $i++) {
	 	$offsetX = mt_rand($i * $width/$num + $width/10, ($i+1) * $width/$num - $width/10);
	 	$offsetY = mt_rand($height/2 , $height);

		imagettftext($img, mt_rand(20,30), mt_rand(-40,40), $offsetX, $offsetY, dark_color($img), BASE_NAME . '/public/font/simkai.ttf',$code[$i] );
 	}
 	//画干扰元素  点
	 for ($i= 0; $i < 1000; $i++) {
	 	$offsetX = mt_rand(0, $width);
	 	$offsetY = mt_rand(0, $height);
	 	imagesetpixel($img, $offsetX, $offsetY, dark_color($img));
	 }
	  //画干扰元素  线
	 for ($i= 0; $i < 10; $i++) {
	 	$offsetX1 = mt_rand(0, $width);
	 	$offsetY1 = mt_rand(0, $height);
	 	$offsetX2 = mt_rand(0, $width);
	 	$offsetY2 = mt_rand(0, $height);
	 	imageline($img, $offsetX1, $offsetY1, $offsetX2, $offsetY2, light_color($img));
	 }
	 //画干扰元素  弧
	 for ($i= 0; $i < 10; $i++) {
	 	$cx = mt_rand(0, $width);
	 	$cy = mt_rand(0, $height);
	 	$w = mt_rand(0, $width-$cx);
	 	$h = mt_rand(0, $height-$cy);
	 	$s = mt_rand(0, 360);
	 	$e = mt_rand(0, 360);
	 	imagearc($img, $cx, $cy, $w, $h, $s, $e, light_color($img));
	 }
 	//输出到浏览器
 	header('content-type:image/png');
 	imagepng($img);
 	imagedestroy($img);
 	if ($type == 3) {
 		return $res[1];
 	}
 	return $code;
}

function light_color($img)
{
	return imagecolorallocate($img, mt_rand(128, 255), mt_rand(128, 255), mt_rand(128, 255));
}
function dark_color($img)
{
	return imagecolorallocate($img, mt_rand(0, 127), mt_rand(0, 127), mt_rand(0, 127));
}
function rand_number($num)
{
	$str = '0123456789';
	return substr(str_shuffle($str), 0, $num);
}
function rand_abc($num)
{
	$arr1 = range('a', 'z');
	$arr2 = range('A', 'Z');
	$arr = array_merge($arr1, $arr2);
	shuffle($arr);
	$res = array_slice($arr, 0, $num);
	return join('', $res);
}
function rand_abc_number($num)
{
	$arr1 = range('a', 'z');
	$arr2 = range(0, 9);
	$arr = array_merge($arr1, $arr2);
	shuffle($arr);
	$res = array_slice($arr, 0, $num);
	return join('', $res);

}
function rand_compute()
{
	$a = mt_rand(1, 9);
	$b = mt_rand(1, 9);
	$arr = ['+', '-', '*'];
	$arr = array_flip($arr);
	$suan = array_rand($arr);
	switch($suan) {
			case '+':
				$result = $a + $b;
				break;
			case '-':
				$result = $a - $b;
				break;
			case '*':
				$result = $a * $b;
				break;
	}
	return [$a . $suan . $b . '=', $result];
}









