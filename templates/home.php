<?php include 'head.php'; ?>

<div class="canvas" style="width: 1414px">

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

<?php
foreach($keyInfo as $value)
{
	print "<li><a href=\"".$value['key']."\">".$value['key']."</a></li>";
}


?>
</ul>
</div>
</div>

<div class="cms_a">
<div style="width: 75px;" class="c_bg"><span>会员空间</span></div>
<div style="width: 295px;" class="c_bg r"><a href="#"><img
	src="img/more.gif" /></a></div>
<div style="width: 105px;" class="c_bg"><span>国内书画动态</span></div>
<div style="width: 250px;" class="c_bg r">
 
<?php echo '<a href="'.base_url().'index.php/cms/viewlist?menu='.$ShuHuaDongTai[0]['menu_name'].'">';?>
 

<img src="img/more.gif" /></a></div>

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

<div class="cms_content" style="width: 355px"><?php 
//第一行数据
 $count=count($ShuHuaDongTai);
if($count>=1)
print '<div class="main_t"><a href="'.base_url().'index.php/cms/View?id='.$ShuHuaDongTai[0]['id'].'"><span>'.$ShuHuaDongTai[0]['title'].'</span></a></div>';

//插图
$chatuID='';
for($j = 1; $j < $count;$j++)
{
	if($ShuHuaDongTai[$j]['imgSendFlg']==1)
	{
		//插图
		print '<div class="main_i"><a href="'.base_url().'index.php/cms/View?id='.$ShuHuaDongTai[$j]['id'].'"><img src="../attachments'.$ShuHuaDongTai[$j]['smallimage'].'" />';
		print"<p>".$ShuHuaDongTai[$j]['title']."</p>";
		print"</a></div>";
		$chatuID=$ShuHuaDongTai[$j]['id'];
	} 
}

if($count>7)
{
$count=7;
}
print "<div class=\"cms_text\">";
print "<ul>";

for($j = 1; $j < $count;$j++)
{
	if($ShuHuaDongTai[$j]['id']==$chatuID)
	{
		continue;
	}else {
	print '<li><a href="'.base_url().'index.php/cms/View?id='.$ShuHuaDongTai[$j]['id'].'">'.$ShuHuaDongTai[$j]['title'].'</a></li>';
	}
}
print "</ul>";
print "</div>";


?>
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
<?php
foreach($advertInfo as $value)
{
	print "<li><a target=\"_blank\" href=\"".$value['advert_link']."\"><img src=\"../attachments".$value['advert_img']."\"></a></li>";
}



?>
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

<div style="width: 75px;" class="c_bg"><span>历代名家</span></div>
<div style="width: 295px;" class="c_bg r">
<?php echo '<a href="'.base_url().'index.php/cms/viewlist?menu='.$liDaiMingJia[0]['menu_name'].'">';?>
 
<img
	src="img/more.gif" /></a></div>
<div style="width: 105px;" class="c_bg"><span>成名故事</span></div>
<div style="width: 250px;" class="c_bg r">
 
<?php echo '<a href="'.base_url().'index.php/cms/viewlist?menu='.$chengMingGuShi[0]['menu_name'].'">';?>
 

<img
	src="img/more.gif" /></a></div>

<div class="cms_content" style="height: 155px;"><?php 
//历代名家cms
$count=count($liDaiMingJia);
if($count>1)
{print 	'<div class="main_t"><a href="'.base_url().'index.php/cms/View?id='.$liDaiMingJia[0]['id'].'"><span>'.$liDaiMingJia[0]['title'].'</span></a></div>';
 


//插图
$chatuID='';
for($j = 1; $j < $count;$j++)
{
	if($liDaiMingJia[$j]['imgSendFlg']==1)
	{
		//插图
		print '<div class="main_i"><a href="'.base_url().'index.php/cms/View?id='.$liDaiMingJia[$j]['id'].'"><img src="../attachments'.$liDaiMingJia[$j]['smallimage'].'" />';
		print"<p>".$liDaiMingJia[$j]['title']."</p>";
		print"</a></div>";
		$chatuID=$liDaiMingJia[$j]['id'];
	} 
}

if($count>7)
{
$count=7;
}
print "<div class=\"cms_text\">";
print "<ul>";

for($j = 1; $j < $count;$j++)
{
	if($liDaiMingJia[$j]['id']==$chatuID)
	{
		continue;
	}else {
	print '<li><a href="'.base_url().'index.php/cms/View?id='.$liDaiMingJia[$j]['id'].'">'.$liDaiMingJia[$j]['title'].'</a></li>';
		//print "<li><a href=\"#\">".$liDaiMingJia[$j]['title']."</a></li>";
	}
}
print "</ul>";
print "</div>";
}

?>



</div>
<div class="cms_content" style="width: 355px; height: 155px"><?php 
//成名故事cms
$count=count($chengMingGuShi);
if($count>1)
print 	'<div class="main_t"><a href="'.base_url().'index.php/cms/View?id='.$chengMingGuShi[0]['id'].'"><span>'.$chengMingGuShi[0]['title'].'</span></a></div>';
 
 
//插图
$chatuID='';
for($j = 1; $j < $count;$j++)
{
	if($chengMingGuShi[$j]['imgSendFlg']==1)
	{
		//插图
		//print "<div class=\"main_i\"><a href=\"#\"><img src=\"../attachments".$chengMingGuShi[$j]['smallimage']."\" />";
		print '<div class="main_i"><a href="'.base_url().'index.php/cms/View?id='.$chengMingGuShi[$j]['id'].'"><img src="../attachments'.$chengMingGuShi[$j]['smallimage'].'" />';
		print"<p>".$chengMingGuShi[$j]['title']."</p>";
		print"</a></div>";
		$chatuID=$chengMingGuShi[$j]['id'];
	} 
}

if($count>7)
{
$count=7;
}
print "<div class=\"cms_text\">";
print "<ul>";

for($j = 1; $j < $count;$j++)
{
	if($chengMingGuShi[$j]['id']==$chatuID)
	{
		continue;
	}else {
		print '<li><a href="'.base_url().'index.php/cms/View?id='.$chengMingGuShi[$j]['id'].'">'.$chengMingGuShi[$j]['title'].'</a></li>';
	//print "<li><a href=\"#\">".$chengMingGuShi[$j]['title']."</a></li>";
	}
}
print "</ul>";
print "</div>";
?>
</div>

<div style="width: 75px;" class="c_bg"><span>文人轶事</span></div>
<div style="width: 295px;" class="c_bg r">
 
<?php echo '<a href="'.base_url().'index.php/cms/viewlist?menu='.$wenRenYiShi[0]['menu_name'].'">';?>
 
<img
	src="img/more.gif" /></a></div>
<div style="width: 105px;" class="c_bg"><span>藏品故事</span></div>
<div style="width: 250px;" class="c_bg r">
 
<?php echo '<a href="'.base_url().'index.php/cms/viewlist?menu='.$cangPinGuShi[0]['menu_name'].'">';?>
 
<img
	src="img/more.gif" /></a></div>

<div class="cms_content" style="height: 155px;"><?php 
//文人轶事cms
$count=count($wenRenYiShi);
if($count>1)
print 	'<div class="main_t"><a href="'.base_url().'index.php/cms/View?id='.$wenRenYiShi[0]['id'].'"><span>'.$wenRenYiShi[0]['title'].'</span></a></div>';
 
//插图
$chatuID='';
for($j = 1; $j < $count;$j++)
{
	if($wenRenYiShi[$j]['imgSendFlg']==1)
	{
		//插图
		print '<div class="main_i"><a href="'.base_url().'index.php/cms/View?id='.$wenRenYiShi[$j]['id'].'"><img src="../attachments'.$wenRenYiShi[$j]['smallimage'].'" />';
		//print "<div class=\"main_i\"><a href=\"#\"><img src=\"../attachments".$wenRenYiShi[$j]['smallimage']."\" />";
		print"<p>".$wenRenYiShi[$j]['title']."</p>";
		print"</a></div>";
		$chatuID=$wenRenYiShi[$j]['id'];
	} 
}

if($count>7)
{
$count=7;
}
print "<div class=\"cms_text\">";
print "<ul>";

for($j = 1; $j < $count;$j++)
{
	if($wenRenYiShi[$j]['id']==$chatuID)
	{
		continue;
	}else {
	print '<li><a href="'.base_url().'index.php/cms/View?id='.$wenRenYiShi[$j]['id'].'">'.$wenRenYiShi[$j]['title'].'</a></li>';
		//print "<li><a href=\"#\">".$wenRenYiShi[$j]['title']."</a></li>";
	}
}
print "</ul>";
print "</div>";
?>
</div>
<div class="cms_content" style="width: 355px; height: 155px"><?php 
//藏品故事cms
$count=count($cangPinGuShi);
if($count>=1)
print 	'<div class="main_t"><a href="'.base_url().'index.php/cms/View?id='.$cangPinGuShi[0]['id'].'"><span>'.$cangPinGuShi[0]['title'].'</span></a></div>';
 
 

//插图
$chatuID='';
for($j = 1; $j < $count;$j++)
{
	if($cangPinGuShi[$j]['imgSendFlg']==1)
	{
		//插图
		print '<div class="main_i"><a href="'.base_url().'index.php/cms/View?id='.$cangPinGuShi[$j]['id'].'"><img src="../attachments'.$cangPinGuShi[$j]['smallimage'].'" />';
		//print "<div class=\"main_i\"><a href=\"#\"><img src=\"../attachments".$cangPinGuShi[$j]['smallimage']."\" />";
		print"<p>".$cangPinGuShi[$j]['title']."</p>";
		print"</a></div>";
		$chatuID=$cangPinGuShi[$j]['id'];
	} 
}

if($count>7)
{
$count=7;
}
print "<div class=\"cms_text\">";
print "<ul>";

for($j = 1; $j < $count;$j++)
{
	if($cangPinGuShi[$j]['id']==$chatuID)
	{
		continue;
	}else {
	print '<li><a href="'.base_url().'index.php/cms/View?id='.$cangPinGuShi[$j]['id'].'">'.$cangPinGuShi[$j]['title'].'</a></li>';
		//print "<li><a href=\"#\">".$cangPinGuShi[$j]['title']."</a></li>";
	}
}
print "</ul>";
print "</div>";
?>
</div>
</div>

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
<?php include 'foot.php';?>
