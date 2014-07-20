<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');?>
<html>
 <base href="<?php echo base_url().'templates/'.setting('backend_theme').'/'; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery-1.8.3.min.js"></script>
 <link rel="stylesheet" href="css/jquery.Jcrop.css">
 <script src="js/jquery.Jcrop.js" type="text/javascript"></script>
<script src="js/jquery.form.js" type="text/javascript"></script>
 
 <!-- <script charset="utf-8" src="js/crop_photo.js" type="text/javascript"></script> -->
 
 
 
 <body>
 
 <form id="form_photo" action="<?php echo backend_url('content/upload_photo');?>" enctype="multipart/form-data" accept-charset="utf-8" method="post">

头像：<input id="photo_src" type="file" name="photo_src"/> 
<input id="button_photo" type="button" value="上传" />
</form>
<form id="save_photo" action="<?php echo backend_url('content/save_photo');?>" accept-charset="utf-8" method="post">

<input type="hidden" name="p_x" id="p_x" value="">
<input type="hidden" name="p_y" id="p_y" value="">
<input type="hidden" name="p_h" id="p_h" value="">
<input type="hidden" name="p_w" id="p_w" value="">
<input type="hidden" name="p_k" id="p_k" value="">
</form>

</body>
<script type="text/javascript">
 
	 $("#form_photo").ajaxForm();// ajaxForm()只是绑定表单事件，并不是提交表单。。。
	 $("#button_photo").click(function(){

		 $("#button_photo").submit()
		 /*
		 // 判断上传格式，判断图片大小好像只能在服务端检测，所以预览图片必须先传上去
		 var options = {
						success: showResponse,// 上传成功回调函数
						};
		
		$("#form_photo").ajaxSubmit(options);// ajax上传图片，转由CI部分upload_photo
		 // 方法处理。另外，我上传file一直没有成功
		 // 过jquery.form官方文档中的submit()中再
		 // 回调函数ajaxForm()的方式,这种方法ajax
		 // 提交其它表单没问题
		 });
*/


	 
	 function getCookie(name){
		    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
		    if(arr != null) return unescape(arr[2]); return null;
		}

	 function showResponse(data){
		 alert(data);
		//根据返回值判断上传是否成功
		//成功返回图片路径
		//jquery添加<img id="jcrop_photo" src="网站目录"+data />
		//jquery添加<img id="preview_photo" src="网站目录"+data />
		//现在开始准备
		init_photo();//初始化jcrop
		$("#button_photo").click(function(){ 
		 $("#save_photo").submit();//再次上传剪切后图片参数到CI部分save_photo方法 });
		 });
		 
		 }

		 function init_photo(){}
		 
	 
 
 </script>
</html>