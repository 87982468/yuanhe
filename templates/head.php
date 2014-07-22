<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<base href="<?php echo base_url().'templates/'; ?>" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="js/jquery-latest.min.js"></script>
<script src="js/unslider.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.v_photo').unslider({
			fluid: true,
			dots: true
	});
	$(function(){
	
		$(".c_menu").hide();
		
		$(".nav li").hover(function(){
			$(this).find(".c_menu").stop(true,true);
			$(this).find(".c_menu").slideDown();
		},function(){
			$(this).find(".c_menu").stop(true,true);
			$(this).find(".c_menu").slideUp();
		});
		
	})
});
</script>

<script>
//收藏

function AddFavorite(sURL, sTitle) {
sURL = encodeURI(sURL);
try{
window.external.addFavorite(sURL, sTitle);
}catch(e) {
try{
window.sidebar.addPanel(sTitle, sURL, "");
}catch (e) {
alert("加入收藏失败，请使用Ctrl+D进行添加,或手动在浏览器里进行设置.");
}
}
}
//设为首页
 function SetHome(url){ 
 if (document.all) { 
 document.body.style.behavior='url(#default#homepage)'; 
 document.body.setHomePage(url); 
 }else{ 
 alert("您好,您的浏览器不支持自动设置页面为首页功能,请您手动在浏览器里设置该页面为首页!"); 
 } 
 } 

</script>



<title>中国书画评论网</title>
</head>

<body style="background-color: #f2f2f2">
<div class="header">
<div class="banner"><img src="img/banner.jpg" />
<h1>www.arteveryone.com</h1>
<ul>
	<li><a class="login ly" href="#">登陆</a></li>
	<li><a class="reg ly" href="#">注册</a></li>
	<li><a class="setindex lw"  onclick="SetHome('http://www.baidu.com');" href="javascript:void(0)">设为首页</a></li>
	<li><a class="fova lw" onclick="AddFavorite('http://www.baidu.com','中国书画评论网');" href="javascript:void(0)">加入收藏</a></li>
</ul>
<div class="keyword">
<ul>
	<li><a href="#">拍卖</a></li>
	<li><a href="#">艺术家</a></li>
	<li><a href="#">艺术品</a></li>
	<li><a href="#">展览</a></li>
	<li><a href="#">资讯</a></li>
</ul>
</div>
<div class="search_reg"><input type="text" class="s_text" /> <a hre="#">搜索</a>
</div>
</div>

<div class="nav">
<ul>

<?php

$menuItem=$this->Home_mdl->get_Menu();

//一级菜单
foreach ($menuItem as $menu) {

	if($menu['level']=='1')
	{
		print '<li><a href="'.base_url().'index.php'.$menu['menu_link'].'">'.$menu['menu_name'].'</a>';


		$menuTwoLevel=array();
		foreach ($menuItem as $menu2) {
			if($menu2['parentid']==$menu['classid'])
			{
				array_push($menuTwoLevel, $menu2);
			}
		}
		if(count($menuTwoLevel)>0)
		{
			print "<dl>";
			//循环二级菜单
			foreach ($menuTwoLevel as $value) {
				print '<dd><a href="'.base_url().'index.php'.$value['menu_link'].'">'.$value['menu_name'].'</a></dd>';
			}

		}
		if(count($menuTwoLevel)>0)
		print "</dl>";

		print "</li><li class=\"line\"></li>";

	}
}

?>

</ul>
</div>
</div>

