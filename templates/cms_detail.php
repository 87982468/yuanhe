<?php include 'head.php';?>
<div class="content" style="width:1000px">
    <div class="pt">
    	<span>当前位置： </span>
    	<a href="#" >中国书画评论网</a>
        <em>-</em>
    	<a href="#" >国内书画动态</a>
        <em>></em>
    	<span>正文</span>
    </div>
    <div class="l_linnk ab">
    	<div class="l_header"><em>■</em>国内书画动态</div>
        <div class="newsDetails">
        	<div class="caption">
            	<h1><?php  echo $result[0]['title'];?></h1>
                <div class="info">
                	<span><?php echo date('Y-m-d H:i', $result[0]['update_time']);  ?></span><span>来源：</span><span><?php  echo $result[0]['cms_from'];?></span><span>作者：</span><span><?php echo $result[0]['writer']; ?></span>
                </div>
            </div>
            <div class="newscont">
            	<P>
<?php echo $result[0]['detail_info']; ?>

</P>

            </div>
            <div class="note">
            	<p>（责任编辑：<?php echo $result[0]['editor']; ?>）</p>
 				<p>注：本站上发表的所有内容，均为原作者的观点，不代表书画网的立场，也不代表本网站的价值判断。</p>
                
               <?php   echo '<a href="'.base_url().'index.php/cms/View?id='.$lastOneCms[0]['id'].'">'?> 上一篇：<?php if($lastOneCms[0]['writer']){  echo $lastOneCms[0]['writer']; echo':';} echo $lastOneCms[0]['title'];?></a>
                <?php print '<a href="'.base_url().'index.php/cms/View?id='.$nextOneCms[0]['id'].'">'?>下一篇：<?php  if($nextOneCms[0]['writer']){echo $nextOneCms[0]['writer']; echo' : ';} echo $nextOneCms[0]['title'];?></a>
            </div>
            
        </div>
 <div class="comment">
        	<img src="img/comment.png"/>
            <textarea></textarea>
            <div class="comitText">
                <input type="button" class="btn" value="发表评论" />
            	<input type="text" style="width:135px"/>
                <input type="text" style="width:88px" />
                <img src="img/yzm00001.png" />
            </div>
            <em>注：网友评论只供表达个人看法，并不代表本网站其看法或者证实其描述</em>
            <div class="comcont">
            	<p>已有 1 位对此新闻感兴趣的网友发表了看法</p>
                <ul>
                    <li>
                        <img src="img/plico.png" />
                        2014-07-20 14:51:56 
                        <a>张三</a>
                        发表评论
                        <p>很棒的画家！</p>
                    </li>
                   <li>
                        <img src="img/plico.png" />
                        2014-07-20 14:51:56 
                        <a>李四</a>
                        发表评论
                        <p>很棒的画家阿拉卡睡大觉了卡机放辣椒水电费垃圾啊了双方将拉丝级！</p>
                    </li>
                   <li>
                        <img src="img/plico.png" />
                        2014-07-20 14:51:56 
                        <a>王二</a>
                        发表评论
                        <p>很棒的画家！</p>
                    </li>
                </ul>
                
            </div>
        </div>
    </div>

    
    <div class="r_link ab" style="height:305px;">
    	<div class="y_header"><span>最近更新</span></div>
        <div class="y_list">
        	<ul>
        	<?php 
       
        		 $count= count($lastNewCms);
        		 
        	for($i=0;$i<$count;$i++)
        	{
        	print '	<li><a href="'.base_url().'index.php/cms/View?id='.$lastNewCms[$i]['id']."\">".($i+1).". ".$lastNewCms[$i]['title']."</a></li>";
        	}
        	?>
        	 
            </ul>
        </div>
    </div>
    
    <div class="r_link ab" style="height:305px;">
    	<div class="y_header"><span>最热浏览</span></div>
        <div class="y_list">
        	<ul>
            	<?php

        		 $count= count($hotCms);
        		 
        	for($i=0;$i<$count;$i++)
        	{
        	print '	<li><a href="'.base_url().'index.php/cms/view?id='.$hotCms[$i]['cms_id']."\">".($i+1).". ".$hotCms[$i]['cms_title']."</a></li>";
        	}
        	
        	?>
            </ul>
        </div>
    </div>
    
</div>
<?php include 'foot.php'; ?>