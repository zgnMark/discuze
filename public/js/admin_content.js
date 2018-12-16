window.onload = function () {
	var nav = document.getElementById("nav"),
		nav_index = getClassName("nav_l_index")[0],
		nav_user = getClassName("nav_l_user")[0],
		nav_model = getClassName("nav_l_model")[0],
		nav_tiezi = getClassName("nav_l_tiezi")[0],
		i_integral = getClassName("content_integral")[0],
		i_content1 = getClassName("main_content1")[0],
		i_content2 = getClassName("main_content2")[0],
		u_content1 = getClassName("main_content3")[0],
		u_content2 = getClassName("main_content4")[0],
		m_content1 = getClassName("main_content5")[0],
		m_content2 = getClassName("main_content6")[0],
		t_content1 = getClassName("main_content7")[0],
		t_content2 = getClassName("main_content8")[0],
		t_content3 = getClassName("main_content9")[0],
		t_content4 = getClassName("main_content10")[0];
		nav_index1 = nav_index.childNodes[1].childNodes[1].childNodes[1];
		nav_index2 = nav_index.childNodes[1].childNodes[1].childNodes[3];
		nav_user1 = nav_user.childNodes[1].childNodes[1].childNodes[1];
		nav_user2 = nav_user.childNodes[1].childNodes[1].childNodes[3];
		nav_model1 = nav_model.childNodes[1].childNodes[1].childNodes[1];
		nav_model2 = nav_model.childNodes[1].childNodes[1].childNodes[3];
		nav_tiezi1 = nav_tiezi.childNodes[1].childNodes[1].childNodes[1];
		nav_tiezi2 = nav_tiezi.childNodes[1].childNodes[1].childNodes[3];
		nav_tiezi3 = nav_tiezi.childNodes[1].childNodes[1].childNodes[5];
		nav_tiezi4 = nav_tiezi.childNodes[1].childNodes[1].childNodes[7];

	var mydiv = [
			nav_index,
			nav_user,
			nav_model,
			nav_tiezi,
			i_content1,
			i_content2,
			u_content1,
			u_content2,
			m_content1,
			m_content2,
			t_content1,
			t_content2,
			t_content3,
			t_content4,
			nav_index1,
			nav_index2,
			nav_user1,
			nav_user2,
			nav_model1,
			nav_model2,
			nav_tiezi1,
			nav_tiezi2,
			nav_tiezi3,
			nav_tiezi4,
			i_integral
		];
		li = nav.childNodes;
		for (var i = 0; i <= 7; i++) {
			if (li[i].innerHTML != undefined) {
				li[i].onclick = function () 
				{
					this.style.background = 'url(public/admin/image/btn_block.gif)';
					this.style['border-top-right-radius'] = '8px';
					this.childNodes[0].style.color = 'white';
					var name = this.innerHTML;
					var nav_name = this.childNodes[0].innerHTML;
					switch (nav_name) {
						case "站点信息":
							dis(mydiv, 0, 4, 14);
							break;
						case "用户管理":
							dis(mydiv, 1, 6, 16);
							break;
						case "板块管理":
							dis(mydiv, 2, 8, 18);
							break;
						default:
							dis(mydiv, 3, 10, 20);
							break;
					}
					for (var j = 0; j <= 7; j++) {
						if (li[j].innerHTML != name && li[j].innerHTML != undefined) {
							li[j].style.background = 'none';
							li[j].childNodes[0].style.color = '#639BC0';
						}
					}
				}
			}
		}
		for (var i = 14; i < mydiv.length - 1; i++) {
			mydiv[i].onclick = function ()
			{
				switch (this.childNodes[1].innerHTML) {
					case "站点信息":
						dis(mydiv, 0, 4, 14);
						break;
					case "友情链接":
						dis(mydiv, 0, 5, 15);
						break;
					case "编辑用户":
						dis(mydiv, 1, 6, 16);
						break;
					case "禁止IP":
						dis(mydiv, 1, 7, 17);
						break;
					case "管理板块":
						dis(mydiv, 2, 8, 18);
						break;
					case "添加板块":
						dis(mydiv, 2, 9, 19);
						break;
					case "帖子管理":
						dis(mydiv, 3, 10, 20);
						break;
					case "帖子回收站":
						dis(mydiv, 3, 11, 21);
						break;
					case "回帖管理":
						dis(mydiv, 3, 12, 22);
						break;
					default:
						dis(mydiv, 3, 13, 23);
						break;
				}
			}
		}
}

function dis(mydiv, num1, num2, flag = false)
{
	for (var k = 0; k <= 13; k++) {
		if (k != num1 && k != num2) {
			mydiv[k].style.display = "none";
		} else {
			mydiv[k].style.display = "block";
		}
		mydiv[24].style.display = "none";
	}
	if (flag) {
		for (var i = 14; i < 24; i++) {
			if (i != flag) {
				mydiv[i].style.background = "#F2F9FD";
			} else {
				mydiv[i].style.background = "#DEEFFA";
			}
		}
	}
}

function getClassName(className, context) {
	context = context || document;
	if (context.getElementsByClassName) {
		return context.getElementsByClassName(className);
	}
	var nodes=context.getElementsByTagName('*'),ret=[];
	for (var i = 0; i < nodes.length; i++) {
		if (hasClass(nodes[i], className)) ret.push(nodes[i]);
	}
	return ret;
}

function hasClass(node, className) {
	var names = node.className.split(/\s+/);
	for (var i = 0; i < names.length; i++) {
		if (names[i] == className) return true;
	}
	return false;
}

function getTagName(TagName, context){
	context = context || document;
	return context.getElementsByTagName(TagName);
	
}