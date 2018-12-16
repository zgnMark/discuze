<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="<?= WEB_SITE ?>public/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?= WEB_SITE ?>public/css/front_end.css"  />
		<link rel="stylesheet" type="text/css" href="<?= WEB_SITE ?>public/css/update.css" />
		<script type="text/javascript" src='<?= WEB_SITE ?>public/ckeditor/ckeditor.js'></script>
		<link rel="icon" href="lbb.jpg" >
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
						<table cellspacing="10" align="right">
				<tr>
					<td></td>
					<td></td>
					<td>
						<select>
							<option>我的</option>
						</select>
					</td>
					<td><a href="action.php?action=update">设置</a></td>
					<td><a href="">消息</a></td>
					<td>
						<select>
							<option>提醒</option>
						</select>
					</td>
					<td><a href="action.php?action=exit" >退出</a></td>
					<td rowspan="2"><img src="<?= WEB_SITE ?>public/upload/<?=$photo;?>" /></td>
				</tr>						
				<tr align="right">
					<td colspan="4">积分:
						<select>
							<option>0</option>
						</select>
					</td>	
					<td colspan="3">用户组：
						<select>
							<option><?=$username;?></option>
						</select>
					</td>	
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
			<select class="fl search_select">
				<option>帖子</option>
			</select>
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
				<a href="index.php">首页</a>
		</div>

		<div class="main">	
			<div class="plate fl">
				<ul>
					<li><h1>设置</h1></li>
					<li><a href="update.php?set=personal">个人资料</a></li>
					<li><a href="update.php?set=photo">修改头像</a></li>
					<li><a href="update.php?set=autograph">个性签名</a></li>
					<li><a href="update.php?set=grand">积分</a></li>
					<li><a href="update.php?set=pass_safe">密码安全</a></li>
				</ul>
			</div>
			<div class="content fl">
			<?php if (($set == 'personal')):?>
					<form action="set.php?set=personal" method="post">
						<table  width="800" cellspacing="20">
							<tr>
								<td width="135">用户名</td>
								<td>907952235</td>
								<td></td>
							</tr>
							<tr>
								<td>真实姓名<span>*</span></td>
								<td>
									<input type="text" name="realname" class="shen" placeholder="<?=$realname;?>" required><br>
									<b>此项资料提交后需要审核</b>
								</td>
							</tr>
							<tr>
								<td>性别<span>*</span></td>
								<td>
									  <label for="secret">secret</label>
									  <input type="radio" name="sex" id="secret" value='o'    <?php if (($sex=0)):?> checked <?php endif;?> />
									  <label for="male">Male</label>
									  <input type="radio" name="sex" id="male" value='1'  	  <?php if (($sex=1)):?> checked <?php endif;?> />
									  <label for="female">Female</label>
									  <input type="radio" name="sex" id="female" value='2' 	  <?php if (($sex=2)):?> checked <?php endif;?> />
								</td>
							</tr>
							<tr>
								<td>qq号码<span>*</span></td>
								<td><input type="text" name="qq" placeholder="<?=$qq;?>" required></td>
							</tr>
							<tr>
								<td>是否隐藏</td>
								<td>
									<select name="safe">
										<option>公开</option>
										<option>保密</option>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value =" 提交"></td>
								<td></td>
							</tr>
							<?php if (($flag==1)):?>							
								<tr>
									<td></td>
									<td></td>
									<td><p>没成</p></td>
								</tr>
							<?php endif;?>
							<?php if (($flag==2)):?>	
							<tr>
								<td></td>
								<td></td>
								<td><p>成了</p></td>
							</tr>
							<?php endif;?>
						</table>
					</form>
			<?php endif;?>

			<?php if (($set == 'photo')):?>
				<form action='set.php?set=photo' method="post" enctype="multipart/form-data">
				<ul>
					<li><b>当前我的头像</b><p>没有的话选择一张</p></li>
					<li><img src="<?= WEB_SITE ?>public/upload/<?=$photo;?>"></li>
					<li><b>设置头像</b><p>没有的话选择一张</p><p><a href="update.php">刷新</a></p></li>
					<li>
						<div class="new_photo fl">
							<input type="file" name="photo">
							<input type="submit" name="" value="提交">
						</div>
					</li>
				</ul>
				</form>
			<?php endif;?>

			<?php if (($set == 'grand')):?>
					<form action='set.php?set=grand' method="post">
						<table  width="800" cellspacing="20">
							<tr>
								<td width="135">用户名</td>
								<td><?=$username;?></td>
								<td></td>
							</tr>
							<tr>
								<td>我的积分</td>
								<td>
									<b><?=$grade;?></b>
								</td>
							</tr>
							<tr>
								<td>积分记录</td>
								<td></td>
							</tr>
						</table>
						<?php if (($flag==1)):?>							
							<tr>
								<td></td>
								<td></td>
								<td><p>成功了</p></td>
							</tr>
						<?php endif;?>
						<?php if (($flag==0)):?>	
							<tr>
								<td></td>
								<td></td>
								<td><p>失败了</p></td>
							</tr>
						<?php endif;?>
					</form>
			<?php endif;?>

			<?php if (($set == 'autograph')):?>
				<form action='set.php?set=autograph' method="post">
					<textarea name="autograph" class="ckeditor" id="textarea"></textarea>
					<input type="submit" style="width: 80px;height: 30px; background: #2B7ACD;color: #fff"  value="保存">
				</form>
						<?php if (($flag==1)):?>	
							<tr>
								<td></td>
								<td></td>
								<td><p>失败了</p></td>
							</tr>
						<?php endif;?>
			<?php endif;?>

			<?php if (($set == 'pass_safe')):?>
				<form action="set.php?set=pass_safe" method="post">
					<p style="margin: 10px">你必须填写原密码才能修改下面资料</p>
					<hr>
					<table  width="800" cellspacing="20">
							<tr>
								<td>旧密码<span>*</span></td>
								<td>
									<input type="password" name="password"  required><br>
									<b>必须填写</b>
								</td>
							</tr>
							<tr>
								<td>新密码</td>
								<td>
									<input type="password" name="newpass" required><br>
								</td>
							</tr>							
							<tr>
								<td>确认新密码</td>
								<td>
									<input type="password" name="re_newpass" required><br>
								</td>
							</tr>
							<tr>
								<td>Email</td>
								<td><input type="email" name="email" ></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="保存"></td>
							</tr>
						<?php if (($flag==2)):?>							
							<tr>
								<td></td>
								<td></td>
								<td><p>成功了</p></td>
							</tr>
						<?php endif;?>
						<?php if (($flag==1)):?>	
							<tr>
								<td></td>
								<td></td>
								<td><p>失败了</p></td>
							</tr>
						<?php endif;?>
						</table>
				</form>
			<?php endif;?>
			</div>
		</div>

		 <div class="end">
			<p class="fl">Powered by <b>Yhz!1.0</b></p>
		</div> 
	</body>
</html>

