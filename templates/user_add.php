<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta charset="utf-8"/>
 </head>
<body>



<div class="content_box">
	<div class="content form_content">
	
        <?php   echo form_open('user/add');?>
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th> 会员类型</th>
					 
					<td><?php $this->form->show('user_type','radio',array('1'=>'画家','2'=>'收藏家'),'');?></td>
					
				</tr>
				<tr>
					<th> 用户名称：</th>
					<td><?php $this->form->show('username','input',''); ?><label>*3-16位用户名称.</label><?php echo form_error('username'); ?></td>
				</tr>
                <tr>
					<th> 用户密码：</th>
					<td><input class="normal" type="password" maxlength="16" name="password" /><label>*6-16位用户密码.</label><?php echo form_error('password'); ?></td>
				</tr>
                <tr>
					<th> 重复用户密码：</th>
					<td><input class="normal" type="password" maxlength="16" name="confirm_password" /><label>*6-16位用户密码.</label><?php echo form_error('confirm_password'); ?></td>
				</tr>
                <tr>
					<th> 手机：</th>
					<td><?php $this->form->show('telphone','input',''); ?><label>*有效的手机号码.</label><?php echo form_error('telphone'); ?></td>
				</tr>
				 <tr>
					<th> 用户EMAIL：</th>
					<td><?php $this->form->show('email','input',''); ?><label>*有效的EMAIL地址.</label><?php echo form_error('email'); ?></td>
				</tr>
            	 
				 
				<tr>
					<th> 备注资料：</th>
					<td><?php $this->form->show('memo','input',''); ?><label>备注信息</label><?php echo form_error('memo'); ?></td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit'><span>注册会员</span></button>
					</td>
				</tr>
			</table>
		<?php echo form_close(); ?>
	</div>
</div>
</body>

</html>

