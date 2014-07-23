<?php include 'head.php';?>
 
<div class="content" style="width:1000px">
    <div class="pt">
    	<span>当前位置： </span>
    	<a href=<?php echo '"'.base_url().'index.php/home"'?> >中国书画评论网</a>
        <em>-</em>
    	<a href=<?php echo '"'.base_url().'index.php/cms/Viewlist?menu='.$cmsType[0]['classid'].'">' ;?> ><?php  echo $cmsType[0]['menu_name'];?></a>
        <em>></em>
    	<span>正文</span>
    </div>
    <div class="l_linnk ab">
    	<div class="l_header"><em>■</em><?php  echo $cmsType[0]['menu_name'];?></div>
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
                
               <?php 

               if(count($lastOneCms)>0)
               {
               	echo '<a href="'.base_url().'index.php/cms/View?id='.$lastOneCms[0]['id'].'">' ;
               	 echo '上一篇：';
                if($lastOneCms[0]['writer']){ 
                	echo $lastOneCms[0]['writer']; 
                	echo':';
                } 
                echo $lastOneCms[0]['title']; 
                echo '</a>';
               }?>
                   <?php
				if(count($nextOneCms)>0)
				{
                echo '<a href="'.base_url().'index.php/cms/View?id='.$nextOneCms[0]['id'].'">'; 
                echo "下一篇："; 
                  if($nextOneCms[0]['writer'])
                  {echo $nextOneCms[0]['writer']; echo' : ';
                  } 
                  echo $nextOneCms[0]['title'];
                
                	echo "</a>";
				}
                ?>
               
               </div>
            
        </div>
 <div class="comment">
        	<img src="img/comment.png"/>
            <textarea id="content" name="content"></textarea>
            <div class="comitText">
                <input type="button" class="btn" id="chk_num" value="发表评论" />
            	<input type="text" id="user_name" name="user_name" style="width:135px"/>
                <input type="text" id="code_num" style="width:88px" />
                 
                <input type="hidden"" id="cmsid" value=<?php echo $result[0]['id']; ?> />
                
                <input type="hidden" id="cmstitle" value=<?php echo $result[0]['title']; ?> />
                <input type="hidden" id="baseurl" value=<?php echo base_url();?> />
              <img src="code_num.php" id="getcode_num" title="看不清，点击换一张" align="absmiddle">
                 
            </div>
            <em>注：网友评论只供表达个人看法，并不代表本网站其看法或者证实其描述</em>
            <div class="comcont">
            <?php $count=count($comment);?>
            	<p>已有<?php echo $count;?> 位对此新闻感兴趣的网友发表了看法</p>
                <ul id="commentList">
                <?php   
                
              
                foreach ($comment as $value)
                {
                	 print "<li>";
                         print "<img src=\"img/plico.png\" /> ";
                        echo  date('Y-m-d H:i:s', $value['create_time']);
                        print " <a>".$value['userName']."</a>";
                         print "发表评论";
                         print "<p>".$value['comment']."</p>";
                    print " </li>";
                }
                	 
                	
                ?>
                    
                  
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


<script type="text/javascript"> 
    function changeCode(){
         $("#verify_code").src ="/user/verify_image?r=" + Math.random();
    }
    $(function(){ 
        //数字验证 
        $("#getcode_num").click(function(){ 
            $(this).attr("src",'code_num.php?' + Math.random()); 
        }); 
       
    }); 
    $("#chk_num").click(function(){ 
    	 
    	
    	$("#code_num").attr("value","111");
        var code_num = $("#code_num").val();
        var result=0;
        $.post("chk_code.php?act=num",{code:code_num},function(msg){ 
            if(msg==1){ 
            	$("#getcode_num").click();
            	postComment();
                
            }else{ 
                alert("验证码错误！"); 
            } 
          
        }); 

        
    }); 
function postComment()
{
	   //执行数据提交处理
    var base_url =$("#baseurl").val();
    var content_p=$("#content").val();
    var username_p=$("#user_name").val();
    var cmsid_p=$("#cmsid").val();
    var cmstitle_p=$("#cmstitle").val();

    var url1=base_url+"index.php/cms/AddComment";

    $.ajax({
        url:url1,
        type:'POST',
        data:{content:content_p,username:username_p,cmsid:cmsid_p,cmstitle:cmstitle_p},
        success:function(data){
           //清空画面数据
           
           alert("评论提交成功!");
           
              $('#content').val("");
              $('#user_name').val("");
              $('#code_num').val("");
           //列表追加内容
           $('#commentList').prepend(data);
        },
        error : function(a,b,v){
			alert(a.status);
			alert(a.readyState);
		} 
    });
}
    
</script>
<?php include 'foot.php'; ?>