<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="<?= WEB_SITE ?>public/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?= WEB_SITE ?>public/css/front_end.css"  />
		<link rel="stylesheet" type="text/css" href="<?= WEB_SITE ?>public/css/index.css" />
		<script type="text/javascript" src='<?= WEB_SITE ?>public/ckeditor/ckeditor.js'></script>
		<script type="text/javascript" src="C:/wamp64/www/yhz/public/js/1.css" ></script>
		<script type="text/javascript">
		onload=function(){
			 var box=document.getElementById('box');
			 var span=box.getElementsByTagName('span')

			 span[0].onclick=function(){
		 	box.style.display="none"
							 }
			var box1=document.getElementById('box1');
			var box2=document.getElementById('box2')
			var scrollTop = document.documentElement.scrollTop || document.body.scrollTop
			window.onscroll=function(){
               var scrollTop = document.documentElement.scrollTop || document.body.scrollTop
				
                if(scrollTop>=130){
                	 box1.style.position="fixed";
                	 box1.style.top=0;

                	 box2.style.display="block"
                	//console.log(111)
                }else{
                	 box1.style.position="absolute";
                	 box1.style.top=130+'px';
                	 box2.style.display="none"
                }
			}
			box2.onclick=function(){

				 document.documentElement.scrollTop = document.body.scrollTop =0;
				
			}
		}
	</script>
	</head>
	<body style="height: 1000px; ">
		<div class="top">
				<div class="top_box">
					<a>设为首页</a>
					<a>收藏本站</a>
					 <?php if (($udertype==1)):?><a class="fr"  href="admin_login.php" >管理中心</a><?php endif;?>	
				</div>
				<div class="top_img">
					<a><img src="" /></a>
				</div>
		</div>
		<div class="head">
			<img style="width: 200;height: 100" class="discuz fl" src="<?= WEB_SITE ?>public/img/logo.jpg" />
			<?php if (empty($_SESSION['username'])):?>
			<form action="action.php?action=login" method="post">	
			<table cellspacing="20" align="right">
				<tr>
					<td><select>
						<option>用户名</option>
						<option>邮箱</option>
						</select></td>
					<td><input type="text" name="username" <?php if (($flag=='flase')):?> disabled="disabled" placeholder="输入超过五次被锁定" <?php endif;?> /></td>
					<td><input type="radio" name="autologin" value='1' />自动登录</td>
					<td><a href="">找回密码</a></td>
				</tr>						
				<tr>
					<td>密码</td>
					<td><input type="password" name="password" <?php if (($flag=='flase')):?> disabled="disabled" placeholder="输入超过五次被锁定" <?php endif;?> /></td>
					<td><input class="login" type="submit"  value="登陆" /></td>
					<td><a href="<?= WEB_SITE ?>register.php">立即注册</a></td>	
				</tr>		
			</table>
				<div style="width: 300px;height: 20;">  
						<?php if (($flag=='dl')):?>
							<div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
								<a href=""><img src="<?= WEB_SITE ?>public/img/yhz.png"></a>
							</div>
						<?php endif;?>
						<?php if (($flag=='user')):?> 
							<div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
							<a href=""><img src="<?= WEB_SITE ?>public/img/nouser.png"></a>
							</div>
						<?php endif;?>
						<?php if (($flag=='pass')):?>
							 <div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
								<a href=""><img src="<?= WEB_SITE ?>public/img/pass.png"></a>
							</div>
						<?php endif;?>
						<?php if (($flag=='flase')):?>
							<div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
								<a href=""><img src="<?= WEB_SITE ?>public/img/num.png"></a>
							</div>
						<?php endif;?>
						<?php if (($flag=='ip')):?>
							<div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
								<a href=""><img src="<?= WEB_SITE ?>public/img/ip.png"></a>
							</div>
						<?php endif;?>
						<?php if (($flag=='fail')):?>
							<div id="fwin_login" class="fwinmask" 
								style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
								<a href=""><img src="<?= WEB_SITE ?>public/img/nocontent.png"></a>
							</div>
						<?php endif;?>
				</div>
			</form>
			<?php endif;?>
			<?php if (!empty($_SESSION['username'])):?>
			<table cellspacing="10" align="right">
				<tr>
					<td></td>
					<td></td>
					<td>
						<select>
							<option>我的</option>
						</select>
					</td>
					<td><a href="set.php?set=personal">设置</a></td>
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
					<td ><?=$arr4[0]['name'];?></td>
					<td >等级<?=$arr4[0]['level'];?></td>
					<td >升级还差<?=$distance;?>分</td>
					<td ><img style="width: 30px;height: 30px;" src="<?= WEB_SITE ?><?=$arr4[0]['picture'];?>"></td>
					<td >积分:
						<a href=""><?=$user[0]['grade'];?></a>
					</td>	
					<td colspan="2">用户组：
						<a href=""><?=$user[0]['username'];?></a>
					</td>	
				</tr>
				<tr ><td></td><td align="right" colspan="5"><b><?=$user[0]['autograph'];?></b></td></tr>	
			</table>
			<?php endif;?>
			<div style="width: 300px;height: 20;">  
				<?php if (($flag=='ok')):?> 
					<div id="fwin_login" class="fwinmask" 
						style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
						<a href=""><img src="<?= WEB_SITE ?>public/img/ok.png"></a>
					</div>
				<?php endif;?>					
				<?php if (($flag=='f_ok')):?> 
					<div id="fwin_login" class="fwinmask" 
						style="position: fixed; z-index: 201; left: 443.5px; top: 276px;" initialized="true">
						<a href=""><img src="<?= WEB_SITE ?>public/img/f_login.png"></a>
					</div>
				<?php endif;?>				
			</div>
		</div>
		<div>
			
		</div>
		<div id="box1"  style="position:absolute;left:233px;top:130px;" class="nav">
			<ul class="fl">
				<?php foreach ($nav as $key => $val ):?>
					<?php if (($nav[$key]['parentid']==0)):?>
					<li>
							<a style="color: #f90" href="index.php"><?=$val['classname'];?></a>
					</li>
					<?php foreach ($nav as $key => $value):?>
					<?php if (($val['cid']==$value['parentid'])):?>
					<li>
						<a href="index.php?skip=forum&&cid=<?=$nav[$key]['cid'];?>"><?=$value['classname'];?></a>
					</li>
					<?php endif;?>
					<?php endforeach;?>
					<?php endif;?>		
				<?php endforeach;?>
			</ul>
		</div>
<!-- 模糊查询 -->
		<form action="search.php" method="post">
		<div class="search" style="margin-top: 33;">
			<input class="fl search_input" type="text" placeholder="请输入" name="search" required>
			<input class="fl search_input2" type="submit"  value="搜索">
			<div class="fl">
				<img src="" />
				<b>热搜:</b>
			</div>
			<ul class="fl ">
				<li><a href="search.php?search=PHP">PHP</a></li>
				<li><a href="search.php?search=原理">原理</a></li>
				<li><a href="search.php?search=驱动化">驱动化</a></li>
				<li><a href="search.php?search=搬家">搬家</a></li>
				<li><a href="search.php?search=同城交友">同城交友</a></li>
			</ul>
		</div>
		</form>
		<div class="main">
<!-- 首页 -->
			<?php if (($skip == 'none')):?>
				<div class="path">
					<a href=""></a>
					<em>-</em>
					<a href="">论坛首页</a>
					<em>></em>
				</div>	
				<div class="main_nav">
					<ul class="fl">
						<li style="padding-right: 5px" class="fl">主题：<?=$sum;?></li>
						<li style="padding-right: 5px" class="fl">帖子: <?=$sum1;?></li>
						<li style="padding-right: 5px" class="fl">会员：<?=$sum2;?></li>
						<li  class="fl" style="margin-left: 600"><a href="">最新回复</a></li>
					</ul>
				</div>
				<div class="plate_border">
				<?php foreach ($res as $key => $val ):?>
				<?php if (($res[$key]['parentid']==0)):?>
					<div class="plate">
						<img style="width: 20px;" src="<?= WEB_SITE ?><?=$val['classpic'];?>">&nbsp&nbsp&nbsp<a  href="index.php"><?=$res[$key]['classname'];?></a>
					</div>
				<?php foreach ($res as $key => $value):?>
					<?php if (($val['cid']==$value['parentid'])):?>
					<div class="content">
						<img src="<?= WEB_SITE ?><?=$value['classpic'];?>">&nbsp&nbsp&nbsp
						<a href="index.php?skip=forum&&cid=<?=$res[$key]['cid'];?>"><?=$value['classname'];?></a>
						<b style="margin-left: 500px;"><?=$value['lastpost'];?></b>
						<b class="fr" ><?=$value['replycount'];?>/<?=$value['motifcount'];?></b>
					</div>
					<?php endif;?>
				<?php endforeach;?>
				<?php endif;?>		
				<?php endforeach;?>
				</div>
				<div class="bm">
					<div class="m">	
					<ul class="fl">
						<li class="lk_logo fl">
							<img class="fl" src="<?= WEB_SITE ?>public/img/logo_88_31.gif" border="0" alt="官方论坛">
							<div class="lk_content fl">
								<h5><a href="http://www.discuz.net" target="_blank">官方论坛</a></h5>
								<p>提供最新 Discuz! 产品新闻、软件下载与技术交流</p>
							</div>
						</li>
					</ul>
					</div>
					
					<ul class="fl">
					<?php foreach ($linkx as $key => $val):?>
						<li class="fl" style="padding-left: 20px"><a href="<?=$val['url'];?>" target="_blank" title="<?=$val['webname'];?>"><?=$val['webname'];?></a></li>
					<?php endforeach;?>
					</ul>
				</div>
			<?php endif;?>

<!-- 帖子 -->
			<?php if (($skip == 'forum')):?>
				<div class="path">
					<a href=""></a>
					<a href="index.php">论坛首页</a>
					<em>></em>
					<a href=""><?=$res[0]['classname'];?></a>
				</div>	
				<div class="forum_nav">
					<ul class="fl">
						<li class="fl"><b><?=$res[0]['classname'];?>&nbsp&nbsp&nbsp</b></li>
						<li class="fl">今日：</li>
						<li class="fl">主题：<?=$sum;?></li>
						<li class="fl">排名:</li>
						<li class="fl" style="margin-left: 600"><p>版主：<a href=""><?=$res[0]['username'];?></a></p></li>			
					</ul>
				</div>
				<div class="forum_nav1">
					<button class="fl"><a class="fatie">发帖</a></button>
					<ul class="fr">
						<li class="fl part_page" ><a href="index.php?skip=forum&&cid=<?=$_GET['cid'];?>&&page=1">首页</a></li>
						<li class="fl part_page" ><a href="index.php?skip=forum&&cid=<?=$_GET['cid'];?>&&page=<?=$prev;?>">上一页</a></li>
						<li class="fl part_page">
							<?php if (($arr3 == 0)):?> <a href="">0</a><?php endif;?>
							<?php if (($arr3 != 0)):?> 
							<?php foreach ($arr3[0] as $val):?>
								<a href="index.php?skip=forum&&cid=<?=$_GET['cid'];?>&&page=<?=$val;?>"><?=$val;?></a>
							<?php endforeach;?>
							<?php endif;?>
						</li>
						<li class="fl part_page" ><a href="index.php?skip=forum&&cid=<?=$_GET['cid'];?>&&page=<?=$next;?>">下一页</a></li>
						<li class="fl part_page" ><a href="index.php?skip=forum&&cid=<?=$_GET['cid'];?>&&page=<?=$pagecount;?>">尾页</a></li>
					</ul>
				</div> 
				<div><a href="index.php?skip=forum&&cid=<?=$_GET['cid'];?>&&forum=hot">最热</a>
					 <a href="index.php?skip=forum&&cid=<?=$_GET['cid'];?>&&forum=new">最新</a>
				</div>
				<hr style="margin-bottom: ">
				<div class="plate_border" style="margin-top: 10px">
						<div class="plate">
						<table cellspacing="0" align="left"><tr>
							<td></td>
							<td width="400px"><b>全部主题</b></td>
							<td width="70px">作者</td>
							<td width="50px">回复</td>
							<td width="120px">添加时间</td>
							<?php if (($udertype==1)):?>
							<td width="60px">.</td>
							<td width="60px">。</td>
							<td width="60px">。</td>
							<?php endif;?>
							<td width="60px">所需积分</td>
						</tr></table>
						</div>
					<?php if (($res != 0) ):?>
					<?php foreach ($res as $key => $value):?>
					<?php if (($value['istop']==1)):?>
					<?php if (($value['classid'] == $cid)):?>
						<table cellspacing="20">				
							<tr>
								<td><img src="<?= WEB_SITE ?>public/img/pin_1.gif"></td>
								<td style="width: 100px"><p>【发布】</p></td>
							<?php if (($value['elite']) == 0):?><td width=400px> <?php endif;?>
							<?php if (($value['elite']) == 1):?><td width=400px; style="background: url(<?= WEB_SITE ?>public/img/zait.png);"> <?php endif;?>
									<b>
										<?php if (($value['elite']) == 1):?><b style="font-size: 16px;">精品！</b><?php endif;?>
										<a style="font-size: 16px; color: #EE5023;" 
										href="index.php?skip=read&&cid=<?=$cid;?>&&id=<?=$res[$key]['id'];?>&&uid=<?=$res[$key]['uid'];?>&&rate=<?=$value['rate'];?>
										"><?=$res[$key]['title'];?></a>
									</b>
								</td>
								<td style="width: 70px"><a  href=""><?=$value['username'];?></a></td>
								<td style="width: 50px"><a  href=""><?=$value['replycount'];?></a></td>
								<td style="width: 120px"><a  href=""><?= date('m-d H:i', $value['addtime']) ?></a></td>
							<?php if (($udertype==1)):?>
								<td style="width: 60px"><a href="admin_details.php?skip=nice&&id=<?=$value['id'];?>&&cid=<?=$_GET['cid'];?>&&i=<?=$value['elite'];?>">精</a></td>
								<td style="width: 60px"><a href="admin_details.php?skip=top&&id=<?=$value['id'];?>&&cid=<?=$_GET['cid'];?>&&i=1">取消置顶</a></td>
								<td style="width: 60px"><a href="admin_details.php?skip=del&&id=<?=$value['id'];?>&&cid=<?=$_GET['cid'];?>">删除</a></td>
							<?php endif;?>
								<td style="width: 60px"><a><?=$value['rate'];?></a></td>
							</tr>						
						</table>	
					<?php endif;?>
					<?php endif;?>
					<?php endforeach;?>
						<div class="part_top"></div>
					<?php foreach ($res as $key => $value):?>
						<?php if (($value['istop']==0)):?>
						<?php if (($value['classid'] == $cid)):?>
						<table cellspacing="20" >				
							<tr>
								<td><img src="<?= WEB_SITE ?>public/img/folder_common.gif"></td>
								<td style="width: 100px"><p>【发布】</p></td>
								<?php if (($value['elite']) == 0):?><td width=400px> <?php endif;?>
								<?php if (($value['elite']) == 1):?><td width=400px bgcolor="pink" "> <?php endif;?>	
									<a style="font-size: 14px;color: #000" 
										href="index.php?skip=read&&cid=<?=$cid;?>&&id=<?=$value['id'];?>&&uid=<?=$value['uid'];?>&&rate=<?=$value['rate'];?>
										"><?=$res[$key]['title'];?>
									</a>
								</td>
								<td style="width: 70px"><a  href=""><?=$value['username'];?></a></td>
								<td style="width: 50px"><a  href=""><?=$value['replycount'];?></a></td>
								<td style="width: 120px"><a  href=""><?= date('m-d H:i', $value['addtime']) ?></a></td>
								<?php if (($udertype==1)):?>
								<td style="width: 60px"><a href="admin_details.php?skip=nice&&id=<?=$value['id'];?>&&cid=<?=$_GET['cid'];?>&&i=<?=$value['elite'];?>">精</a></td>
								<td style="width: 60px"><a href="admin_details.php?skip=top&&id=<?=$value['id'];?>&&cid=<?=$_GET['cid'];?>&&i=0">置顶</a></td>
								<td style="width: 60px"><a href="admin_details.php?skip=del&&id=<?=$value['id'];?>&&cid=<?=$_GET['cid'];?>">删除</a></td>
								<?php endif;?>
								<td style="width: 60px"><a><?=$value['rate'];?></a></td>
							</tr>						
						</table>	
						<?php endif;?>
						<?php endif;?>
					<?php endforeach;?>
					<?php endif;?>
					<!-- 发帖框 -->

						<form action='details.php?skip=forum' method="post">
							<div class="forum_nav1" style="width: 960px;height:100px;  margin: 300px 0 auto">
								<div class="yy">
									<h1 style="font-size: 14">贴子标题</h1><input type="text" name="title" required="标题不能为空">
									<input type="submit" style="width: 40px" value="发帖">
								</div>
								<input   type="hidden" name="first" value="1">
								<input  type="hidden" name="cid" value="<?=$_GET['cid'];?>">
							</div> 
							<div class="ident fl">
								<h1 style="margin: 20 0 10 50">验证码:</h1>
								<input  
								style="margin:20 0 10 50;width: 100px;height: 28px;" 
								placeholder="请输入下图文字" type="text" name="code" required="没填" />
								<div><img style="margin:20 0 10 50" src="<?= WEB_SITE ?>captcha.php" onclick="this.src=this.src+'?abc='+Math.random();" /></div>
							</div>
							<div style="width: 600;margin:10 10 10 300">
								<textarea name="content" class="ckeditor" id="textarea" ></textarea>
							</div>

						</form>
		
					<?php if (($flag == 'ok')):?><p>操作成功</p><?php endif;?>
					<?php if (($flag == 'sb')):?><p>操作失败</p><?php endif;?>
				</div>
			<?php endif;?>

<!-- 帖子详情 -->
			<?php if (($skip == 'read')):?>
				<div class="path">
				</div>	
				<div class="forum_nav1">
					<p class="fr"><a href="index.php?skip=forum&&cid=<?=$cid;?>">返回列表</a></p>
					<p class="fr"><a  style="padding-right: 10px;" href="#F">去回复</a></p>
				</div> 
				<div class="plate_border1" style="margin-top: 10px;">
					<table cellspacing="0">
						<tr>
							<td bgcolor="#C2D5E3" width="160px" height="30px" align="center" valign="middle">
								<div style="height: 30px;width: 160px;padding-top:8px; border-right: 1px solid #C2D5E3">
									<p>查看：<?=$res[0]['hits'];?> 回复 : <?=$res[0]['replycount'];?></p>
								</div>
							</td>
							<td width="800px">

								<b style="font-size: 16">&nbsp[发布]<?=$res[0]['title'];?></b>
								<b style="font-size: 16;color: red;float: right;">&nbsp楼主</b>
								<input style="width: 10px;height: 20px; padding:0 20"  class="fr" type="text" name="md">
								<b class="fr">楼层直达</b>
							</td>
						</tr>
						<tr>
							<td bgcolor="#C2D5E3" colspan="2" width=980px height=5px></td>
						</tr>
						<tr>
							<td bgcolor="#C2D5E3" width="160px" height="30px" align="center" valign="middle">
								<div style="min-height: 32px;width: 160px;padding-top:8px; border-right: 1px solid #C2D5E3;">
									<b style="color: red;"><?=$row[0]['username'];?></b>
								</div>
							</td>
							<td width="800px">
								<div style="min-height: 32px;width: 750px;padding-top:8px;border-bottom: 1px dotted #C2D5E3">
									<img src="<?= WEB_SITE ?>public/img/online_admin.gif">&nbsp&nbsp&nbsp&nbsp<b>发表于<?=$addtime;?></b>
								</div>
							</td>
						</tr>

						<tr>
							<td  bgcolor="#C2D5E3" width="160px" align="center" valign="top">
									<img src="<?= WEB_SITE ?>public/upload/<?=$row[0]['photo'];?>">
							</td>
							<td width="600px" height="400px" style="padding-left: 10px;">
									<?=$res[0]['content'];?>
							</td>
						</tr>
					</table>
				</div>
				<?php if ((!empty($rsk))):?>
				<?php foreach ($rsk as $key => $val):?>
				<?php if (($rsk[$key]['tid'] == $_GET['id'])):?>
					<?php if (empty($i)):?><?php  $i=0;?><?php endif;?>
					<?php  $i++;?>
					<form action='details.php?skip=replay1' method="post">
					<div class="plate_border"">
					<table cellspacing="0">
						<tr>
							<td bgcolor="#C2D5E3" width="160px" height="30px" align="center" valign="middle">
								<div style="min-height: 32px;width: 160px;padding-top:8px; border-right: 1px solid #C2D5E3;">
									<b style="color: red;"><?=$rsk[$key]['username'];?></b>
									<?php if (($i==1)):?><b>沙发</b><?php endif;?>
									<?php if (($i==2)):?><b>板凳</b><?php endif;?>
									<?php if (($i>=3)):?><b>地板<?=$i-2;?></b><?php endif;?>
								</div>
							</td>
							<td width="800px">
								<div style="min-height: 32px;width: 750px;padding-top:8px;border-bottom: 1px dotted #C2D5E3">
									<input type="hidden" name=<?=$time = date("Y-m-d H:i:",$val['addtime']);?>>
									<img src="<?= WEB_SITE ?>public/img/online_admin.gif">&nbsp&nbsp&nbsp&nbsp<b>回复于<?=$time;?></b>
								<?php if (($val['username']==$row[0]['username'])):?>	<b style="font-size: 12;color: red;float: right;">&nbsp楼主</b><?php endif;?>
								<?php if (($val['username']!=$row[0]['username'])):?>	<b style="font-size: 12;color: black;float: right;">&nbsp用户</b><?php endif;?>
								<?php if ((!empty($_SESSION['udertype'])&&$_SESSION['udertype']==1)):?>	
										<a class="fr" href="admin_details.php?skip=pb&&id=<?=$val['id'];?>&&cid=<?=$cid;?>&&uid=<?=$val['uid'];?>">屏蔽</a>
								<?php endif;?>
								</div>
							</td>
						</tr>

						<tr>
							<td  bgcolor="#C2D5E3" width="160px" align="center" valign="top">
									<img src="<?= WEB_SITE ?>public/upload/<?=$rsk[$key]['photo'];?>">
							</td>
							<td width="600px" style="padding-left: 10px;">
									<?=$rsk[$key]['content'];?>
							</td>
						</tr>
					</table>
					</div>
					</form>
				<?php endif;?>
				<?php endforeach;?>
				<?php endif;?>
				<?php if ((empty($rsk)) ):?>
					<div class="plate_border"">
					</div>
				<?php endif;?>

					<?php if (($flag == 'shibai')):?> <p>发帖失败</p><?php endif;?>
					<?php if (($flag == 'success')):?> <p>发帖成功</p><?php endif;?>

					<a name="F"></a>
				<form action='details.php?skip=read' method="post">
					<div class="forum_nav1" style="margin-top: 30px">
						<input  class="fatie" type="submit"  value="发表回复">
						<input   type="hidden" name="first" value="0">
						<input  type="hidden" name="uid" value="<?=$_GET['uid'];?>">
						<input  type="hidden" name="cid" value="<?=$_GET['cid'];?>">
						<input  type="hidden" name="id" value="<?=$_GET['id'];?>">
						<p class="fr"><a href="index.php?skip=forum&&cid=<?=$cid;?>">返回列表</a></p>
					</div> 
					<div style="margin-top: 10px;" >
						<textarea style="width:300px;height: 200px" name="content" class="ckeditor" id="textarea"></textarea>
					</div>
				</form>
			<?php endif;?>
		</div>

		 <div class="end">
			<p class="fl">Powered by <b>Yhz!1.0</b></p>
		</div>






		<div id="box" class="p_pop xg1" 
		style="text-align: center; float: left; position: fixed; top: 220px; z-index: 100; margin-left: 2px; width: 110px; left: 1191px; right: auto;">
			<span style="display: inline-block;margin-left:110px;cursor: pointer;">X</span>
			<img src="<?= WEB_SITE ?>public/img/qr_code.jpg" width="98">
			<p>用微信扫一扫<br>互动赢积分</p>
		</div>
		<p id="box2" style="text-align: center; position: fixed;right: 50%;bottom: 0;display:none;line-height:100px" >点我回到顶部</p>
	</body>
</html>

