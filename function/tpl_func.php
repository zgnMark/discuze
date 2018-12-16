<?php
function display($tplFile, $tplVars=null, $flag=true)
{
	//1、判断模板文件是否存在
	$tplPath = trim(TPL_VIEW, '/') . '/' . $tplFile;
	if (!file_exists($tplPath)) {
		exit('模板文件不存在，你在跟我玩呢');
	}
	//2、进行指定规则的替换
	$content = compile($tplPath);
	//3、生成缓存文件路径	test.html  => test_html.php
	$cacheFile = trim(TPL_CACHE, '/') . '/' . str_replace('.', '_', $tplFile) . '.php';
	//4、将编译后的内容写入缓存文件
	file_put_contents($cacheFile, $content);
	//5、将数组中的变量导入到当前符号表
	if (is_array($tplVars)) {
		extract($tplVars);
	}
	//6、包含缓存文件
	if ($flag) {
		include $cacheFile;
	}
} 
function compile($file)
{
	//读取文件内容

	$content = file_get_contents($file);
	// 自定义规则数组
	$keys= [
		'{$%%}' 		=>		'<?=$\1;?>',
		'{=%%}'	 		=>		'<?php \1;?>',
		'{if %%}'		=>		'<?php if (\1):?>',
		'{/if}'			=>		'<?php endif;?>',
		'{elseif %%}'	=>		'<?php elseif (\1):?>',
		'{else if %%}'	=>		'<?php elseif (\1):?>',
		'{foreach %%}'	=>		'<?php foreach (\1):?>',
		'{/foreach}'	=>		'<?php endforeach;?>',
		'{for %%}'		=>		'<?php for (\1):;?>',
		'{/for}'		=>		'<?php endfor>',
		'{include %%}'	=>		'这是假的',
		'{while %%}'	=>		'<?php while (\1):?>',
		'{/while}'		=>		'<?php endwhile;?>',
		'{continue}'	=>		'<?php continue;?>',
		'{break}'		=>		'<?php break;?>',
		'{{%%(%%)}}'	=>		'<?php \1(\2)?>',
		'{(%%)}'		=>		'<?= \1 ?>' ,  
	];
	// 遍历自定义规则数组 将键转换成正则表达式
	foreach ($keys as $key => $val) {
		// 将键值添加转义字符
		$key = preg_quote($key,'#');
		// 将键转换成正则表达式
		$reg = '#' . str_replace('%%', '(.+)', $key) . '#imsU';
		// 判断键中是否包含include
		if (stripos($key, 'include')) {
			// 当遍历到键为include时  执行回调函数替换 会用回调函数的返回值替换匹配到的字符串
			$content = preg_replace_callback($reg, 'parseInclude',$content);
		} else {
			// 键不包含include时执行正则替换
			$content = preg_replace($reg, $val, $content);
		}

		
	}
	// 返回替换后的数据
	return $content;
}
function parseInclude($match)
{
	// 拿到include的文件名字
	$file = $match[1];
	// 再次调用display 替换包含文件的数据
	display($file,null,false);
	//生成缓存文件路径	test.html  => test_html.php
	$cacheFile = str_replace('.', '_', $file) . '.php';
	// 返回字符串 用于替换正则回调函数匹配到的值
	return "<?php include '$cacheFile';?>";
}