<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="icon" href="<?= WEB_SITE ?>public/img/ooopic_1500694640.ico"/>
		<link rel="stylesheet" type="text/css" href="<?= WEB_SITE ?>public/css/admin_index.css" />
		<title>Discuz!管理中心</title>
	</head>
	<body>
		<div class="header">
			<div class="mainhd">
				<div class="logo">
					<img src="public/admin/image/logo.gif" />
				</div>
				<div class="login">
					<p>
						你好，创始人&nbsp&nbsp<em><?=$_SESSION['username'];?></em> &nbsp&nbsp<a href="action.php?action=exit"> 退出 </a> 
						<a href="index.php" class="shouye">站点首页</a>
					</p>
				</div>
				<ul id="nav">
					<li><a href='admin_index.php?skip=web1'>站点信息</a></li>
					<li><a href='admin_index.php?skip=user1'>用户管理</a></li>
					<li><a href='admin_index.php?skip=plate1'>板块管理</a></li>
					<li><a href='admin_index.php?skip=detail1&&page=1'>帖子管理</a></li>
				</ul>
			</div>
				<div class="main_body">
					<div class="nav_l">
						<?php if (($skip == "web1" || $skip == 'web2')):?>
							<ul>
								<li><img src="<?= WEB_SITE ?>public/img/dian1.png"><a href="admin_index.php?skip=web1">站点信息</a></li>
								<li><img src="<?= WEB_SITE ?>public/img/dian1.png"><a href="admin_index.php?skip=web2">友情链接</a></li>
							</ul>
						<?php endif;?>
						<?php if (($skip == "user1" || $skip == 'user2' || $skip == 'user11')):?>
							<ul>
								<li><img src="<?= WEB_SITE ?>public/img/dian1.png"><a href="admin_index.php?skip=user1">编辑用户</a></li>
								<li><img src="<?= WEB_SITE ?>public/img/dian1.png"><a href="admin_index.php?skip=user2">禁止用户</a></li>
							</ul>
						<?php endif;?>						
						<?php if (($skip == "plate1" || $skip == 'plate2')):?>
							<ul>
								<li><img src="<?= WEB_SITE ?>public/img/dian1.png"><a href="admin_index.php?skip=plate1">管理板块</a></li>
								<li><img src="<?= WEB_SITE ?>public/img/dian1.png"><a href="admin_index.php?skip=plate2">添加板块</a></li>
							</ul>
						<?php endif;?>							
						<?php if (($skip == "detail1" || $skip == 'detail2' || $skip == 'detail3' || $skip == 'detail4')):?>
							<ul>
								<li><img src="<?= WEB_SITE ?>public/img/dian1.png"><a href="admin_index.php?skip=detail1">帖子管理</a></li>
								<li><img src="<?= WEB_SITE ?>public/img/dian1.png"><a href="admin_index.php?skip=detail2">帖子回收站</a></li>
								<li><img src="<?= WEB_SITE ?>public/img/dian1.png"><a href="admin_index.php?skip=detail3">回帖管理</a></li>
								<li><img src="<?= WEB_SITE ?>public/img/dian1.png"><a href="admin_index.php?skip=detail4">回帖回收站</a></li>
							</ul>
						<?php endif;?>	
						<div class="copy">
							<p>Powered by yhz</p>
							<p>&copy; 2017, yhz.</p>
						</div>
					</div>


					<div class='web_content'>
						<?php if (($skip == "web1")):?>
						<form action="admin_set.php?skip=web1" method="post">
							<div class="web">
								<p class="webp">站点名称:</p>
								<input class="web_input" type="text" placeholder="<?=$res[0]['web_site'];?>" name="site_name">
							</div>						
							<div class="web">
								<p class="webp">网站名称:</p>
								<input class="web_input" type="text" placeholder="<?=$res[0]['web_name'];?>" name="web_name">
							</div>						
							<div class="web">
								<p class="webp">网站URL:</p>
								<input class="web_input" type="text" placeholder="<?=$res[0]['web_url'];?>" name="web_url">
							</div>						
							<div class="web">
								<p class="webp">网站备案信息代码</p>
								<input class="web_input" type="text" placeholder="<?=$res[0]['web_code'];?>" name="web_code">
							</div>						
							<div class="web">
								 <label for="yes">是</label>
								 <input type="radio" name="web_close" id="yes" value='o'    <?php if (($res[0]['web_close']==0)):?> checked <?php endif;?> />
								 <label for="male">否</label>
								 <input type="radio" name="web_close" id="no" value='1'  	  <?php if (($res[0]['web_close']==1)):?> checked <?php endif;?> />
							</div>
							<div class="web">
								<input type="submit" value="保存" >
							</div>
						</div>
						</form>
						<?php endif;?>
						<?php if (($skip == "web2")):?>
						<form action="admin_set.php?skip=web2" method="post">
							<table cellpadding="10" cellspacing="10">	
								<tr  class="t_nav w_tr">
									<th class="pp" colspan="6"><b>友情链接</b></th>
								</tr>
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6"><b>技巧提示</b></td>
								</tr>
								<tr  class="t_nav w_tr">
									<td colspan="6" > 未填写文字说明的项目将以紧凑型显示</td>
								</tr >
								<tr class="t_nav w_tr">	
									<td></td>
									<td>显示顺序</td>
									<td>站点名称</td>
									<td>站点URL</td>
									<td>文字说明</td>
									<td>logo地址</td>
								</tr>
								<?php foreach ($res as $key => $values ):?>
									<tr class="w_tr">	
										<td><input calss="w_del"   type="checkbox"  name="lid[]" value="<?=$res[$key]['lid'];?>"></td>
										<td><input class="w_order" type="text" placeholder="<?=$res[$key]['web_order'];?>" name="<?=$res[$key]['lid'];?>web_order"></td>			
										<td><input class="w_name"  type="text" placeholder="<?=$res[$key]['webname'];?>" name="<?=$res[$key]['lid'];?>webname"></td>				
										<td><input class="url"     type="text" placeholder="<?=$res[$key]['url'];?>" name="<?=$res[$key]['lid'];?>url"></td>						
										<td><input class="words"   type="text" placeholder="<?=$res[$key]['words'];?>" name="<?=$res[$key]['lid'];?>words"></td>
										<td><input class="logo"    type="text" placeholder="<?=$res[$key]['logo'];?>" name="<?=$res[$key]['lid'];?>logo"></td>
									</tr>
								<?php endforeach;?>
									<tr><td><input type="submit" name='delete' value="删除"></td><td></td><td><input type="submit" name="update" value="修改"></td></tr>
								<tr class="t_nav w_tr">	
									<td></td>
									<td>显示顺序</td>
									<td>站点名称</td>
									<td>站点URL</td>
									<td>文字说明</td>
									<td>logo地址</td>
								</tr>
									<tr class="w_tr">	
										<td></td>
										<td><input class="w_order" type="text" name="web_order"></td>								
										<td><input class="w_name"  type="text" name="webname"></td>								
										<td><input class="url"     type="text" name="url"></td>							
										<td><input class="words"   type="text" name="words"></td>							
										<td><input class="logo"    type="text" name="logo"></td>
									</tr>
									<tr><td><input type="submit"  name="add" value="增加"></td></tr>

							</table>
						</form>
						<?php endif;?>
						<?php if (($skip == "user1")):?>
						<form action="admin_set.php?skip=user1" method="post">
							<table cellpadding="20" cellspacing="10">	
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6"><b>用户管理</b></td>
								</tr>
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6"><b>共<?=$sum[0];?>条记录</b></td>
								</tr>
								<tr class="t_nav w_tr">	
									<td></td>
									<td>用户名</td>
									<td>积分</td>
									<td>注册时间</td>
									<td>用户类型</td>
									<td></td>
								</tr>
								<?php foreach ($res as $key => $values ):?>
									<tr class="w_tr">	
										<td>
											<input calss="u_del" type="checkbox"  name="uid[]" value="<?=$res[$key]['uid'];?>">
										</td>

										<td>
											<p><?=$res[$key]['username'];?></p>
										</td>	

										<td>
											<p><?=$res[$key]['grade'];?></p>
										</td>

										<td>
											<p><?=$res[$key]['regtime'];?></p>
										</td>

										<td>
											<?php if (($res[$key]['udertype']==1)):?><p>管理员</p>   <?php endif;?>
											<?php if (($res[$key]['udertype']==0)):?><p>普通用户</p> <?php endif;?>
										</td>

										<td>
											<a href="admin_index.php?skip=user11&&uid=<?=$res[$key]['uid'];?>">详情</a>&nbsp<a href="">锁定用户</a>&nbsp
										</td>
									</tr>
								<?php endforeach;?>
									<tr><td><input type="submit"  value="删除"></td></tr>
							</table>
						</form>
						<?php endif;?>
						<?php if ($skip == "user11"):?>
						<form action="admin_set.php?skip=user11&&uid=<?=$uid;?>" method="post">
						<table cellpadding="10" cellspacing="10">	
							<tr  class="t_nav w_tr">
								<th class="pp"><b>编辑用户</b></th>
							</tr>
							<tr  class="t_nav w_tr">
								<td colspan="6"  > <b>用户名</b><p>admin</p></td>
							</tr >
							<tr  class="t_nav w_tr">
								<td colspan="6" ><b>头像</b> 
								</td>
							</tr >
							<tr><td><img src="<?= WEB_SITE ?>public/upload/<?=$res[0]['photo'];?>"></td></tr>
							<tr  class="t_nav w_tr">
								<td  ><b>新密码</b> 
								<input type="text" name="new_pass">
								<td>如果不更改密码此处请留空</td>
							</tr >		
							<tr  class="t_nav w_tr"><td><b>清除用户安全提问</b></td></tr>			
							<tr  class="t_nav w_tr">
								<td >
								 <label for="yes">是</label>
								 <input type="radio" name="problem" id="yes" value='o'  />
								 <label for="male">否</label>
								 <input type="radio" name="problem" id="no" value='1'    checked />
								</td>
							</tr >
							<tr  class="t_nav w_tr"><td><b>锁定当前用户</b> </td></tr>	
							<tr  class="t_nav w_tr">
								<td >
								 <label for="yes">是</label>
								 <input type="radio" name="allowlogin" id="yes" value='1'   <?php if (($res[0]['allowlogin']==1)):?> checked <?php endif;?>/>
								 <label for="male">否</label>
								 <input type="radio" name="allowlogin" id="no" value='0'   <?php if (($res[0]['allowlogin']==0)):?> checked <?php endif;?>/>
								</td>
							</tr >
							<tr  class="t_nav w_tr">
								<td  ><b>Email</b>
								<input type="text" name="email" value="<?=$res[0]['email'];?>">
								 </td>
							</tr >									
							<tr  class="t_nav w_tr">
								<td   ><b>注册：IP</b>
								<input type="text"  name="ip" value="<?=$res[0]['ip'];?>">
								 </td>
							</tr >									
							<tr  class="t_nav w_tr">
								<td  ><b>注册时间</b> 
								<input type="text" value="<?=$res[0]['regtime'];?>" name="new_pass">
								 </td>
							</tr >									
							<tr  class="t_nav w_tr">
								<td  ><b>上次访问</b>
								<input type="text" value="<?=$res[0]['lasttime'];?>" name="new_pass">
								 </td>
							</tr >									
							<tr  class="t_nav w_tr">
								<td ><b>积分奖励</b>
								<input type="text" value="<?=$res[0]['grade'];?>" name="new_pass">
								 </td>
							</tr >									
							<tr  class="t_nav w_tr">
								<td ><b>签名</b> 
								<input type="textarea" value="<?=$res[0]['autograph'];?>" name="new_pass">
								 </td>
							</tr >									
							<tr  class="t_nav w_tr">
								<td ><b>用户栏目</b> </td>
							</tr >									
							<tr  class="t_nav w_tr">
								<td ><b>真实姓名</b> 
								<input type="text" value="<?=$res[0]['realname'];?>" name="realname">
								 </td>
							</tr >	
							<tr  class="t_nav w_tr">
								<td ><b>性别</b>
									  <label for="secret">secret</label>
									  <input type="radio" name="sex" id="secret" value='o'    <?php if (($res[0]['sex']=0)):?> checked <?php endif;?> />
									  <label for="male">Male</label>
									  <input type="radio" name="sex" id="male" value='1'  	  <?php if (($res[0]['sex']=1)):?> checked <?php endif;?> />
									  <label for="female">Female</label>
									  <input type="radio" name="sex" id="female" value='2' 	  <?php if (($res[0]['sex']=2)):?> checked <?php endif;?> />
								</select>
								 </td>
							</tr >									
							<tr  class="t_nav w_tr">
								<td ><b>qq</b> 
								<input type="text" value="<?=$res[0]['qq'];?>" name="qq">
								</td>
							</tr >	
							<tr class="t_nav w_tr"><td>籍贯</td></tr>
							<tr><td><input type="submit" value="提交"></td></tr>
						</table>
						</form>
						<?php endif;?>							
						<?php if ($skip == "user12"):?>
						<?php endif;?>							
						<?php if (($skip == "user2")):?>
						<form action="admin_set.php?skip=user2" method="post">
							<table cellpadding="20" cellspacing="10">	
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6"><b>禁止 IP</b></td>
								</tr>
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6"><b>注意事项</b></td>
								</tr>								
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6"><p>被限制的IP地址不能访问本站。</p><p>有效期如果设置为空则永久禁止</p></td>
								</tr>
								<tr class="t_nav w_tr">	
									<td></td>
									<td>IP地址</td>
									<td>起始时间</td>
									<td>终止时间</td>
								</tr>
								<?php foreach ($res as $key => $values ):?>
									<tr class="w_tr">	
										<td>
											<input calss="u_del" type="checkbox"  name="lid[]" value="<?=$res[$key]['id'];?>">
										</td>

										<td>
											<p><?=$cip;?></p>
										</td>	

										<td>
											<p><?=$addtime;?></p>
										</td>

										<td>
											<p><?=$overtime;?></p>
										</td>
									</tr>
								<?php endforeach;?>
									<tr class="t_nav w_tr">	</tr>
									<tr class="t_nav w_tr">	</tr>
									<tr class="t_nav w_tr">	
										<td>添加</td>
										<td><input type="text" name="cip"></td>
										<td style="width: 550px"></td>
										<td style="width: 550px;">有效期：<input style="width:40px" type="text" name="day">：天 </td>
										<td></td>
									</tr>
									<tr><?php if (($flag==1)):?><td>ip地址错误</td><?php endif;?>
										<?php if (($flag==2)):?><td>不能为空</td><?php endif;?>
										<td><input type="submit" value="新增"></td>
									</tr>
							</table>
						</form>
						<?php endif;?>
						<?php if (($skip == "plate1")):?>
						<form action="admin_set.php?skip=plate1" method="post">
							<table>
								<tr class="w_tr t_nav">
									<th align="left">显示顺序</th>
									<th align="left">版块名称</th>
									<th align="left">版主</th>
								</tr>
							</table>
							<?php foreach ($res as $key => $val ):?>
							<?php if (($res[$key]['parentid']==0)):?>
							<table>
								<tr class="w_tr t_nav">	
									<td><input type="text" class="txt1" name="<?=$res[$key]['cid'];?>orderby" value="<?=$res[$key]['orderby'];?>"></td>
									<td><input type="text" class="txt2" name="<?=$res[$key]['cid'];?>classname" value="<?=$res[$key]['classname'];?>"></td>
								</tr>
								<?php foreach ($res as $key => $value):?>
									<?php if (($val['cid']==$value['parentid'])):?>
										<tr class="w_tr t_nav">	
											<td class="txt1"><input type="text" class="txt1" name="<?=$res[$key]['cid'];?>orderby" value="<?=$res[$key]['orderby'];?>"></td>
											<td><div class="border"><input type="text" class="txt2" name="<?=$res[$key]['cid'];?>classname" value="<?=$res[$key]['classname'];?>"></div></td>
											<td><input type="text" class="txt2" name="<?=$res[$key]['cid'];?>compere" value="<?=$res[$key]['compere'];?>"></td>
										</tr>
									<?php endif;?>
								<?php endforeach;?>
							<table>	
							<?php endif;?>		
							<?php endforeach;?>
							<?php if (($flag == 3)):?><p>因为未知原因修改失败</p><?php endif;?>
							<input type="submit" value="提交">
						</form>
						<?php endif;?>						
						<?php if (($skip == "plate2")):?>
						<form action="admin_set.php?skip=plate2" method="post">
							<table>
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6"><b>用户管理</b></td>
								</tr>
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6"><b>技巧提示</b></td>
								</tr>								
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6">添加时不选择大板块即为添加大板块</td>
								</tr>
								<tr class="t_nav w_tr">	
									<td>版块名称</td>
									<td><input type="text" name="plate"></td>
								</tr>								
								<tr class="t_nav w_tr">	
									<td>选择大板块</td>
									<td>
										<select name="bigplate">
											<option selected value="0">--不选择--</option>
										<?php foreach ($res as $key => $val):?>
											<option><?=$val['classname'];?></option>
										<?php endforeach;?>
										</select>
									</td>
								</tr>
								<tr><td><input type="submit" value="提交"></td></tr>
								<?php if (($flag == 3)):?><tr><td>因为未知原因添加失败</td></tr><?php endif;?>
							</table>
						</form>
						<?php endif;?>
						<?php if (($skip == "detail1")):?>
							<form action="admin_set.php?skip=detail1&&page=$page" method="post">
							<form action="admin_set.php?skip=detail1" method="post">
							<table cellpadding="20" cellspacing="10">	
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6"><b>帖子管理</b></td>
								</tr>
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6"><b>主题数 <?=$sum;?></b></td>
								</tr>
								<tr class="t_nav w_tr">	
									<td></td>
									<td>标题</td>
									<td>板块</td>
									<td>作者</td>
									<td>回复</td>
									<td>浏览</td>
									<td>最后发表</td>
								</tr>
								<?php foreach ($row as $key => $values ):?>
									<tr class="w_tr">	
										<td>
											<input calss="u_del" type="checkbox"  name="id[]" value="<?=$values['id'];?>">
										</td>

										<td>
											<p><?=$values['title'];?></p>
										</td>	

										<td>
											<p><?=$values['classname'];?></p>
										</td>	

										<td>
											<p><?=$values['username'];?></p>
										</td>

										<td>
											<p><?=$values['replycount'];?></p>
										</td>

										<td>
											<p><?=$values['hits'];?></p>
										</td>
							<input type="hidden" name=<?=$time = date("Y-m-d H:i:",$values['addtime']);?>s>
											
										<td>
											<p><?=$time;?></p>
										</td>

									</tr>
								<?php endforeach;?>
									<tr>
										 <td><input type='submit' value='删除'></td>	
										 <td><a href=admin_index.php?skip=detail1&&page=1>首页</a></td>	
										 <td><a href="admin_index.php?skip=detail1&&page=<?=$prev;?>">上一页</a></td>
										 <td>
												<?php foreach ($arr[0] as $val):?>
												<a href="admin_index.php?skip=detail1&&page=<?=$val;?>"><?=$val;?></a>
												<?php endforeach;?>
										</td>	
										 <td><a href="admin_index.php?skip=detail1&&page=<?=$next;?>">下一页</a></td>
										 <td><a href="admin_index.php?skip=detail1&&page=<?=$val;?>">尾页</a></td>
								 	</tr>	
								<!-- 	<?php if ($flag == 3):?><tr><td>可能是因为外星人，删除失败</td></tr><?php endif;?> -->
							</table>
						</form>
						<?php endif;?>
						<?php if (($skip == "detail2")):?>
							<form action="admin_set.php?skip=detail2&&page=$page" method="post">
							<form action="admin_set.php?skip=detail2" method="post">
							<table cellpadding="20" cellspacing="10">	
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6"><b>帖子管理</b></td>
								</tr>
								<tr  class="t_nav w_tr">
							<?php if ($flag!='yhz'):?><td class="pp" colspan="6"><b>主题数 <?=$sum;?></b></td><?php endif;?>
							<?php if ($flag=='yhz'):?><td class="pp" colspan="6"><b>主题数 0</b></td><?php endif;?>
								</tr>
								<tr class="t_nav w_tr">	
									<td></td>
									<td>标题</td>
									<td>板块</td>
									<td>作者</td>
									<td>回复</td>
									<td>浏览</td>
									<td>最后发表</td>
								</tr>
							<?php if ($flag!='yhz'):?>	
								<?php foreach ($row as $key => $values ):?>
									<tr class="w_tr">	
										<td>
											<input calss="u_del" type="checkbox"  name="id[]" value="<?=$values['id'];?>">
										</td>

										<td>
											<p><?=$values['title'];?></p>
										</td>	

										<td>
											<p><?=$values['classname'];?></p>
										</td>	

										<td>
											<p><?=$values['username'];?></p>
										</td>

										<td>
											<p><?=$values['replycount'];?></p>
										</td>

										<td>
											<p><?=$values['hits'];?></p>
										</td>
							<input type="hidden" name=<?=$time = date("Y-m-d H:i:",$values['addtime']);?>>
											
										<td>
											<p><?=$time;?></p>
										</td>

									</tr>
								<?php endforeach;?>
									<tr>
										 <td><input type='submit' name="del" value='删除'>&nbsp
										 <input type='submit' value='恢复'></td>	
										 <td><a href=admin_index.php?skip=detail2&&page=1>首页</a></td>	
										 <td><a href="admin_index.php?skip=detail2&&page=<?=$prev;?>">上一页</a></td>
										 <td>
												<?php foreach ($arr[0] as $val):?>
												<a href="admin_index.php?skip=detail2&&page=<?=$val;?>"><?=$val;?></a>
												<?php endforeach;?>
										</td>	
										 <td><a href="admin_index.php?skip=detail2&&page=<?=$next;?>">下一页</a></td>
										 <td><a href="admin_index.php?skip=detail2&&page=<?=$val;?>">尾页</a></td>
								 	</tr>	
								<!-- 	<?php if ($flag == 'fail'):?><tr><td>可能是因为外星人，删除失败</td></tr><?php endif;?> -->
								<?php endif;?>
								<?php if ($flag=='yhz'):?>
									<tr>
										 <td><input type='submit' name="del" value='删除'>&nbsp
										 <input type='submit' value='恢复'></td>	
										 <td><a href=admin_index.php?skip=detail2&&page>首页</a></td>	
										 <td><a href="admin_index.php?skip=detail2">上一页</a></td>
										 <td>
										</td>	
										 <td><a href="admin_index.php?skip=detail2">下一页</a></td>
										 <td><a href="admin_index.php?skip=detail2">尾页</a></td>
								 	</tr>
								 <?php endif;?>	
							</table>
						</form>
						<?php endif;?>
						<?php if (($skip == "detail3")):?>
							<form action="admin_set.php?skip=detail3&&page=$page" method="post">
							<form action="admin_set.php?skip=detail3" method="post">
							<table cellpadding="20" cellspacing="10">	
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6"><b>帖子管理</b></td>
								</tr>
								<tr  class="t_nav w_tr">
							<?php if ($flag!='yhz'):?><td class="pp" colspan="6"><b>主题数 <?=$sum;?></b></td><?php endif;?>
							<?php if ($flag=='yhz'):?><td class="pp" colspan="6"><b>主题数 0</b></td><?php endif;?>
								</tr>
								<tr class="t_nav w_tr">	
									<td></td>
									<td>回复内容</td>
									<td>板块</td>
									<td>作者</td>
									<td>回复时间</td>
								</tr>
							<?php if ($flag!='yhz'):?>	
								<?php foreach ($row as $key => $values ):?>
									<tr class="w_tr">	
										<td>
											<input calss="u_del" type="checkbox"  name="id[]" value="<?=$values['id'];?>">
										</td>

										<td>
											<p><?=$values['content'];?></p>
										</td>	

										<td>
											<p><?=$values['classname'];?></p>
										</td>	

										<td>
											<p><?=$values['username'];?></p>
										</td>

								<input type="hidden" name=<?=$time = date("Y-m-d H:i:",$values['addtime']);?>>
											
										<td>
											<p><?=$time;?></p>
										</td>

									</tr>
									<tr></tr>
								<?php endforeach;?>
									<tr>
										 <td><input type='submit' value='放入回收站'></td>	
										 <td><a href=admin_index.php?skip=detail2&&page=1>首页</a></td>	
										 <td><a href="admin_index.php?skip=detail2&&page=<?=$prev;?>">上一页</a></td>
										 <td>
												<?php foreach ($arr[0] as $val):?>
													<a href="admin_index.php?skip=detail2&&page=<?=$val;?>"><?=$val;?></a>
												<?php endforeach;?>
										</td>	
										 <td><a href="admin_index.php?skip=detail2&&page=<?=$next;?>">下一页</a></td>
										 <td><a href="admin_index.php?skip=detail2&&page=<?=$val;?>">尾页</a></td>
								 	</tr>	
								<!-- 	<?php if ($flag == 'fail'):?><tr><td>可能是因为外星人，删除失败</td></tr><?php endif;?> -->
								<?php endif;?>
								<?php if ($flag=='yhz'):?>
									<tr>
										 <td><input type='submit' name="del" value='删除'>&nbsp
										 <input type='submit' value='恢复'></td>	
										 <td><a href=admin_index.php?skip=detail2&&page>首页</a></td>	
										 <td><a href="admin_index.php?skip=detail2">上一页</a></td>
										 <td>
										</td>	
										 <td><a href="admin_index.php?skip=detail2">下一页</a></td>
										 <td><a href="admin_index.php?skip=detail2">尾页</a></td>
								 	</tr>
								 <?php endif;?>	
							</table>
						</form>
						<?php endif;?>
						<?php if (($skip == "detail4")):?>
							<form action="admin_set.php?skip=detail4&&page=$page" method="post">>
							<table cellpadding="20" cellspacing="10">	
								<tr  class="t_nav w_tr">
									<td class="pp" colspan="6"><b>帖子管理</b></td>
								</tr>
								<tr  class="t_nav w_tr">
							<?php if ($flag!='yhz'):?><td class="pp" colspan="6"><b>主题数 <?=$sum;?></b></td><?php endif;?>
							<?php if ($flag=='yhz'):?><td class="pp" colspan="6"><b>主题数 0</b></td><?php endif;?>
								</tr>
								<tr class="t_nav w_tr">	
									<td></td>
									<td>回复内容</td>
									<td>板块</td>
									<td>作者</td>
									<td>回复时间</td>
								</tr>
							<?php if ($flag!='yhz'):?>	
								<?php foreach ($row as $key => $values ):?>
									<tr class="w_tr">	
										<td>
											<input calss="u_del" type="checkbox"  name="id[]" value="<?=$values['id'];?>">
										</td>

										<td>
											<p><?=$values['content'];?></p>
										</td>	

										<td>
											<p><?=$values['classname'];?></p>
										</td>	

										<td>
											<p><?=$values['username'];?></p>
										</td>

								<input type="hidden" name=<?=$time = date("Y-m-d H:i:",$values['addtime']);?>>
											
										<td>
											<p><?=$time;?></p>
										</td>

									</tr>
									<tr></tr>
								<?php endforeach;?>
									<tr>
										 <td><input type='submit' value='恢复'><input type='submit' name="del" value='删除'></td>	
										 <td><a href=admin_index.php?skip=detail4&&page=1>首页</a></td>	
										 <td><a href="admin_index.php?skip=detail4&&page=<?=$prev;?>">上一页</a></td>
										 <td>
												<?php foreach ($arr[0] as $val):?>
													<a href="admin_index.php?skip=detail4&&page=<?=$val;?>"><?=$val;?></a>
												<?php endforeach;?>
										</td>	
										 <td><a href="admin_index.php?skip=detail4&&page=<?=$next;?>">下一页</a></td>
										 <td><a href="admin_index.php?skip=detail4&&page=<?=$val;?>">尾页</a></td>
								 	</tr>	
								<!-- 	<?php if ($flag == 'fail'):?><tr><td>可能是因为外星人，删除失败</td></tr><?php endif;?> -->
								<?php endif;?>
								<?php if ($flag=='yhz'):?>
									<tr>
										 <td><input type='submit' name="del" value='删除'>&nbsp
										 <input type='submit' value='恢复'></td>	
										 <td><a href=admin_index.php?skip=detail2&&page>首页</a></td>	
										 <td><a href="admin_index.php?skip=detail2">上一页</a></td>
										 <td>
										</td>	
										 <td><a href="admin_index.php?skip=detail2">下一页</a></td>
										 <td><a href="admin_index.php?skip=detail2">尾页</a></td>
								 	</tr>
								 <?php endif;?>	
							</table>
						</form>
						<?php endif;?>
					</div>
		</div>
	</body>
</html>