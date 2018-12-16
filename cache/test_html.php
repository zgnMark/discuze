<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?= WEB_SITE ?>public/css/admin_index.css" />
</head>
<body>
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
<form action="test.php" method="post">
							<table>
								<tr class="header">
									<th>显示顺序</th>
									<th>版块名称</th>
									<th>版主</th>
								</tr>
								<tr class="w_tr t_nav">
									<td><input type="text" class="txt" name="or" value="s"></td>
									<td><input type="text" class="txt" name="or" value="2"></td>
									<td><input type="text" class="txt" name="or" value="3"></td>
									<td><input type="submit" name="1"></td>
								</tr>
							</table>
						</form>
	

</table>
</body>
</html>