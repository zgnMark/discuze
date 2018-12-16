<?php

/**
 * @param  [string]  	$file_name 	[传入文件名]
 * @param  boolean 		$is_rand   	[生成文件名]
 * @param  string  		$path     	[生成地址]
 * @return [boolean]            	[成功返回true]
 * @function 						[实现文件的复制功能]
 */
function level($grade)
{
	//判断等级对应的称号和图所示的图标数
	if ($grade>= 0 && $grade < 4) {
		$distance = 4 -$grade; 
		return 1;
	} elseif ($grade >= 4 && $grade < 20) {
		$distance = 20 -$grade; 
		return 2;
	} elseif ($grade >= 20 && $grade < 60) {
		$distance = 60 -$grade; 
		return 3;
	} elseif ($grade >=60 && $grade <100) {
		$distance =100 -$grade; 
		return 4;
	}elseif($grade >=100 ){
		$distance = 0;
		return 5;
	}
	else {
		return 1;
	}
}
function distance($grade)
{
	//判断等级对应的称号和图所示的图标数
	if ($grade>= 0 && $grade < 4) {
		$distance = 4 -$grade; 
	} elseif ($grade >= 4 && $grade < 20) {
		$distance = 20 -$grade; 
	} elseif ($grade >= 20 && $grade < 60) {
		$distance = 60 -$grade; 
	} elseif ($grade >=60 && $grade <100) {
		$distance =100 -$grade; 
	}elseif($grade >=100 ){
		$distance = 0;
	}
	else {
		return 0;
	}
	return $distance;
}