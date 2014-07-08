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
	
		$("dl").hide();
		
		$(".nav li").hover(function(){
			$(this).find("dl").stop(true,true);
			$(this).find("dl").slideDown();
		},function(){
			$(this).find("dl").stop(true,true);
			$(this).find("dl").slideUp();
		});
		
	})
});
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
	<li><a class="setindex lw" href="#">设为首页</a></li>
	<li><a class="fova lw" href="#">加入收藏</a></li>
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
//一级菜单
foreach ($menuItem as $menu) {

	if($menu['level']=='1')
	{
		print "<li><a href=\"#\">".$menu['menu_name']."</a>";


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
				print "<dd><a href=\"#\">▌".$value['menu_name']."</a></dd>";
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
<div class="canvas" style="width: 1414px">
<div class="nav2">
<ul>
	<li><a href="#">设计与人</a></li>
	<li><a href="#">知识库</a></li>
	<li><a href="#">设计与创业</a></li>
	<li><a href="#">设计背景</a></li>
	<li><a href="#">设计资源下载</a></li>
</ul>
</div>
<div class="spread">

<div class="v_photo">
<ul>
	<li><img src="http://i11.topit.me/o/201011/09/12892845564068.jpg" /></li>
	<li><img
		src="http://image6.tuku.cn/pic/wallpaper/fengjing/lundundabengzhongbizhi/002.jpg" /></li>
	<li><img src="http://i11.topit.me/o/201012/01/12911613352026.jpg" /></li>
</ul>
</div>

<div class="s_photo">
<div class="title_img"><span>作品检索</span></div>
<div class="search_img"><img src="img/search_img.jpg" /> <span>精彩中的精彩
尽在手绘作品库</span>
<ul>
	<li><a href="#">国画</a></li>
	<li><a href="#">人物画</a></li>
	<li><a href="#">花鸟国画</a></li>
	<li><a href="#">工笔仕女</a></li>
	<li><a href="#">动物国画</a></li>
	<li><a href="#">人体素描</a></li>
	<li><a href="#">人物油画</a></li>
	<li><a href="#">字画</a></li>
	<li><a href="#">篆刻</a></li>
	<li><a href="#">油画</a></li>
</ul>
</div>
</div>

<div class="cms_a">
<div style="width: 75px;" class="c_bg"><span>会员空间</span></div>
<div style="width: 295px;" class="c_bg r"><a href="#"><img
	src="img/more.gif" /></a></div>
<div style="width: 105px;" class="c_bg"><span>国内书画动态</span></div>
<div style="width: 250px;" class="c_bg r"><a href="#"><img
	src="img/more.gif" /></a></div>

<div class="cms_content">
<div class="main_t"><a href="#"><span>浪漫之夜 | sha-do壁灯设计 | 一晃十年·零九岁光影【图】</span></a></div>
<div class="main_i"><a href="#"><img src="img/1.gif" />
<p>耗时六年完成全关节金属人</p>
</a></div>
<div class="cms_text">
<ul>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
</ul>
</div>
</div>

<div class="cms_virtual"></div>

<div class="cms_content" style="width: 355px">
<div class="main_t"><a href="#"><span>性感诱惑·JBS广告 | 纳尼亚传奇原话欣赏 | 为呼吸你的脸</span></a></div>
<div class="main_i"><a href="#"><img src="img/2.gif" />
<p>ZA.Y雜鱼.治的.不象插画的插画</p>
</a></div>
<div class="cms_text">
<ul>
	<li><a href="#">涩女郎策划《艺术不定时》系列个性卡通图</a></li>
	<li><a href="#">招聘【兼职文字录入】，时间：卡通图</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
	<li><a href="#">懒出风格，懒出品味，无间盗智能 懒出品味</a></li>
</ul>
</div>
</div>
</div>

<div class="s_photo" style="height: 279px;">
<div class="title_img"><span>当代名家</span></div>
<div class="search_img l"><a href="#"><span>1、王羲之兰亭序拓本</span></a> <a
	href="#"><span>2、八大山人作品</span></a> <a href="#"><span>3、唐代工笔花鸟、仕女图</span></a>
<a href="#"><span>4、当代画家油画系列作品</span></a> <a href="#"><span>5、中国博物馆馆藏作品</span></a>
</div>

<div class="main_i"><a href="#"><img src="img/3.jpg" />
<p>新年素材</p>
</a></div>
<div class="main_i"><a href="#"><img src="img/4.jpg" />
<p>圣诞图片</p>
</a></div>
</div>

<div class="ad_main" style="border-style: none;">
<ul>
	<li><a href="#"><img src="img/ad1.jpg" /></a></li>
	<li><a href="#"><img src="img/ad2.jpg" /></a></li>
	<li><a href="#"><img src="img/ad3.jpg" /></a></li>
</ul>
</div>

<div class="member">
<div style="width: 938px;" class="c_bg"><span>画家会员</span></div>
<div style="width: 50px;" class="c_bg r"><a href="#"><img
	src="img/more.gif" /></a></div>
<div class="artist">
<ul>
	<li><a href="#"><img src="img/mb1.jpg" /></a></li>
	<li><a href="#"><img src="img/mb2.jpg" /></a></li>
	<li><a href="#"><img src="img/mb3.jpg" /></a></li>
	<li><a href="#"><img src="img/mb4.jpg" /></a></li>
	<li><a href="#"><img src="img/mb5.jpg" /></a></li>
	<li><a href="#"><img src="img/mb6.jpg" /></a></li>
	<li><a href="#"><img src="img/mb7.jpg" /></a></li>
</ul>
</div>
</div>

<div class="cms_b">
<div class="cms_syzs">
<div class="bl"><span>书画知识</span></div>
<div class="sanjiao"></div>
<div class="hese"></div>
<?php
for($i = 0; $i < 2;$i++):
{
	//左侧位置标题
	print  "<div style=\"width: 75px;\" class=\"c_bg\"><span>".$ShuHuaZhiShiLanMu[$i*2]['menu_name']."</span></div>";
	print  "<div style=\"width: 295px;\" class=\"c_bg r\"><a href=\"#\"><img	src=\"img/more.gif\" /></a></div>";

	print "<div style=\"width: 105px;\" class=\"c_bg\"><span>".$ShuHuaZhiShiLanMu[$i*2+1]['menu_name']."</span></div>";
	print "<div style=\"width: 250px;\" class=\"c_bg r\"><a href=\"#\"><img	src=\"img/more.gif\" /></a></div>";


	print "<div class=\"cms_content\" style=\"height: 155px;\">";
	print "<div class=\"main_t\"><a href=\"#\"><span>浪漫之夜 | sha-do壁灯设计 | 一晃十年·零九岁光影【图】</span></a></div>";
	print "<div class=\"main_i\"><a href=\"#\"><img src=\"img/1.gif\" />";
	print "<p>耗时六年完成全关节金属人</p>";
	print "</a></div>";
	print "<div class=\"cms_text\">";
	print "<ul>";
	foreach ($artInfo as $value) {
		if($value['menu_name']==$ShuHuaZhiShiLanMu[$i*2]['menu_name'])
		{
			print 	"<li><a href=\"#\">".$value['title']."</a></li>";
		}
	}
	print "</ul>";
	print "</div>";
	print "</div>";
	print "<div class=\"cms_content\" style=\"width: 355px; height: 155px\">";
	print "<div class=\"main_t\"><a href=\"#\"><span>浪漫之夜 | sha-do壁灯设计 | 一晃十年·零九岁光影【图】</span></a></div>";
	print "<div class=\"main_i\"><a href=\"#\"><img src=\"img/1.gif\" />";
	print "<p>耗时六年完成全关节金属人</p>";
	print "</a></div>";
	print "<div class=\"cms_text\">";
	print "<ul>";
	foreach ($artInfo as $value) {
			
		if($value['menu_name']==$ShuHuaZhiShiLanMu[$i*2+1]['menu_name'])
		{
			print 	"<li><a href=\"#\">".$value['title']."</a></li>";
		}
	}
	print "</ul>";
	print "</div>";
	print "</div>";
}

endfor;
print "</div>";
?>
<div class="cms_rdbw">
<div class="rd_header" style="width: 150px"><span>热点博文</span></div>
<div class="rd_header r" style="width: 100px"><a href="#"><img
	src="img/black_more.jpg" /></a></div>
<div class="bowen">
<ul>
	<li><a href="#">忽然相逢：与艺术家的对话</a></li>
	<li><a href="#">从2013秋拍看国内市场“理性回归”</a></li>
	<li><a href="#">书画家营销能力是小学生水平</a></li>
	<li><a href="#">忽然相逢：与艺术家的对话</a></li>
	<li><a href="#">从2013秋拍看国内市场“理性回归”</a></li>
	<li><a href="#">书画家营销能力是小学生水平</a></li>
	<li><a href="#">忽然相逢：与艺术家的对话</a></li>
	<li><a href="#">从2013秋拍看国内市场“理性回归”</a></li>
	<li><a href="#">书画家营销能力是小学生水平</a></li>
	<li><a href="#">忽然相逢：与艺术家的对话</a></li>
	<li><a href="#">从2013秋拍看国内市场“理性回归”</a></li>
	<li><a href="#">书画家营销能力是小学生水平</a></li>
	<li><a href="#">忽然相逢：与艺术家的对话</a></li>
	<li><a href="#">从2013秋拍看国内市场“理性回归”</a></li>
</ul>
</div>

</div>
</div>
</div>
</div>
<div class="footer">
<div class="gray_line">
<div>
<div class="fo_info">
<h3>咨询热线：400 900 7877</h3>
<ul>
	<li><a href="#">首页</a></li>
	<li>|</li>
	<li><a href="#">国画家协会</a></li>
	<li>|</li>
	<li><a href="#">艺术文献</a></li>
	<li>|</li>
	<li><a href="#">当代作品库</a></li>
	<li>|</li>
	<li><a href="#">相关服务</a></li>
	<li>|</li>
	<li><a href="#">艺术展馆</a></li>
	<li>|</li>
	<li><a href="#">行业资讯</a></li>
	<li>|</li>
	<li><a href="#">客服中心</a></li>
</ul>
<h3>版权所有 2008-3300 艺术家联盟（the wall draws the alliance） 最佳分辨率1400 x 900
<h3>

</div>
</div>

</body>
</html>
