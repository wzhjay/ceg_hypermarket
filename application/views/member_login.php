<?php $this->load->view('layouts/banner'); ?>
<div class="container">
	<section id='right_content'>
		<?php echo validation_errors(); ?>
		<form class="login"  method="post" accept-charset="utf-8" action="<?php echo $this->config->item('base_url').'index.php/member/login';?>">
		<div class='login_lable'><span class="label label-info">Login:</span></div>
		  <div class="input-prepend input-append">
			<span class="add-on">User Name: </span>
			<input class="input-medium" id='member-username' name='member-username' type="text" placeholder="User Name"><br><br>
			<span class="add-on">Password: </span>
			<input class="input-medium" id='member-password' name='member-password' type="password" placeholder="Password"><br><br>
			<span class="add-on">Confirm: </span>
			<input class="input-medium" id='member-comfirm' name='member-comfirm' type="password" placeholder="Confirm"><br><br>
		  </div>
		  <button type="reset" class="btn" id='member-reset-btn' name="member-reset-btn">Reset</button>
		  <button type="submit" class="btn" id='member-submit-btn' name="memebr-submit-btn">Login</button>
		</form>
		<button class="btn btn-success" onClick="window.open('<?php echo $this->config->item('base_url').'index.php/member/signUp';?>')">Sign Up!</button>
	</section>
</div>