<?php include 'head.php';?>

 
<div class="content" style="width:1000px">
    <div class="pt">
    	<span>当前位置： </span>
    	<a href="#" >中国书画评论网</a>
        <em>-</em>
    	<a href="#" >国内书画动态</a>
    </div>
    <div class="l_linnk">
    	<div class="l_header"><em>■</em>国内书画动态</div>
        <div class="con_news">
        <?php 
        foreach ($result as $value)
        {
        	print "<dl>";
        	 // print '<a href ="'.base_url().'ci/index.php/login">登录</a>';
            	print '<dt><a href ="'.base_url().'index.php/cms/View?id='.$value['id']."\">".$value['title']."</a>";
               print " </dt>";
               $strLengh=strlen($value['detail_info']);
               if($strLengh>150)
                 $strLengh=150;
                print "<dd>".substr($value['detail_info'],0,$strLengh);
                echo '</dd>';
                print "<dd class=\"c_info\">";
               print " 发布时间："; echo date('Y-m-d H:i', $value['update_time']); print" 来源：".$value['cms_from'];
              print "  </dd>";
           print " </dl>";
        }
        ?>
        	
         
        </div>
		<div class="paging">
			
			<?php   echo $pageLink; ?>
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
    <div class="r_link rb" style="height:305px;">
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

<?php include 'foot.php';?>
