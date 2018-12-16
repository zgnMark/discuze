<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="<?= WEB_SITE ?>public/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?= WEB_SITE ?>public/css/front_end.css"  />
		<link rel="stylesheet" type="text/css" href="<?= WEB_SITE ?>public/css/reg.css">
	</head>
	<body>
		<div class="top">
				<div class="top_box">
					<a>设为首页</a>
					<a>收藏本站</a>
				</div>
				<div class="top_img">
					<a><img src="" /></a>
				</div>
		</div>
		<div class="head">
			<img style="width: 200;height: 100" class="discuz fl" src="<?= WEB_SITE ?>public/img/logo.jpg" />
			<table cellspacing="20" align="right">
				<tr>
					<td><h2><a href="action.php?action=exit">去登陆</a><h2></td>
				</tr>		
			</table>
		</div>
		<div class="nav">
			<ul class="fl">
				<li><a href="">论坛首页</a></li>
				<li><a href="">文档资料</a></li>
				<li><a href="">腾讯云主机</a></li>
				<li><a href="">YHZ</a></li>
				<li><a href="">应用中心</a></li>
				<li><a href="">微社区</a></li>
				<li><a href="">在线体验</a></li>
			</ul>
			<select class="fl nav_select">
				<option>快捷导航</option>
			</select>
		</div>
		<div class="search">
			<input class="fl search_input" type="text" placeholder="请输入" name="">
			<div class="fl">
				<img src="" />
				<b>热搜:</b>
			</div>
			<ul class="fl ">
				<li><a href="">网页游戏</a></li>
				<li><a href="">婚纱</a></li>
				<li><a href="">积分商城</a></li>
				<li><a href="">搬家</a></li>
				<li><a href="">同城交友</a></li>
			</ul>
		</div>
		<div class="path">
			<a href=""></a>
			<a href="">论坛首页</a>
		</div>
		<div class="main">	
			<div class="plate "><h1 align="center">注册</h1></div>
		<form action="<?= WEB_SITE ?>action.php?action=register"  method="post">
			<div class="content ">
					<div class="inf_option">
						<span>用户名:</span>
						<input type="text"  name="username" required="不能为空" />
					</div>
					<div class="inf_option">
						<span>密码:</span>
						<input type="password" name="password" required="不能为空" />
					</div>
					<div class="inf_option">
						<span>确认密码:</span>
						<input type="password"  name="repassword" required="不能为空" />
					</div>
					<div class="inf_option">
						<span>Email:</span>
						<input type="email" name="email" />
					</div>
					<div class="ident" align="center">
						<span class ="fl" style="margin:30 0 0 280;">验证码:</span>
						<input class="fl" style="margin:22 50 0;width: 100px;height: 28px;" placeholder="请输入右图文字" type="text" name="code" required="没填" />
						<img class="fl" src="<?= WEB_SITE ?>captcha.php" onclick="this.src=this.src+'?abc='+Math.random();" />
					</div>

					<div style="width: 400px;height: 150px;">
						<input class="submit"  type="submit" />
						<?php if (($flag=='code')):?>
							<div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
								<a href=""><img src="<?= WEB_SITE ?>public/img/yhz.png"></a>
							</div>
						<?php endif;?>
						<?php if (($flag=='user')):?>
							<div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
								<a href=""><img src="<?= WEB_SITE ?>public/img/user.png"></a>
							</div>
						<?php endif;?>						
						{<?php if (($flag=='repeat')):?>
							<div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
								<a href=""><img src="<?= WEB_SITE ?>public/img/repeat.png"></a>
							</div>
						<?php endif;?>						
						<?php if (($flag=='numeric')):?>
							<div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
								<a href=""><img src="<?= WEB_SITE ?>public/img/numeric.png"></a>
							</div>
						<?php endif;?>
						<?php if (($flag=='pass')):?>
							<div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
								<a href=""><img src="<?= WEB_SITE ?>public/img/passa.png"></a>
							</div>
						<?php endif;?>
						<?php if (($flag=='repass')):?>
							<div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
								<a href=""><img src="<?= WEB_SITE ?>public/img/repass.png"></a>
							</div>
						<?php endif;?>
						<?php if (($flag=='email')):?>
							<div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
								<a href=""><img src="<?= WEB_SITE ?>public/img/email.png"></a>
							</div>
						<?php endif;?>
						<?php if (($flag=='unknow')):?>
							<div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
								<a href=""><img src="<?= WEB_SITE ?>public/img/unknow.png"></a>
							</div>
						<?php endif;?>

					</div>
			</div>
		</from>	
		</div>		
		 <div class="end">
			<p class="fl">Powered by <b>Yhz!1.0</b></p>
		</div> 
	</body>
</html>

