<?php $this->load->view('layouts/banner'); ?><div class="container">	<div id="side-bar">		<?php $this->load->view('layouts/admin_right_nav'); ?>	</div>	<section id='right_content'>		<?php echo validation_errors(); ?>		<form class="login"  method="post" accept-charset="utf-8" action="<?php echo $this->config->item('base_url').'index.php/admin/login';?>">
		<div class='login_lable'><span class="label label-info">Login:</span></div>
		  <div class="input-prepend input-append">			<span class="add-on">User Name: </span>
			<input class="input-medium" id='admin-username' name='admin-username' type="text" placeholder="User Name"><br><br>
			<span class="add-on">Password: </span>			<input class="input-medium" id='admin-password' name='admin-password' type="password" placeholder="Password"><br><br>			<span class="add-on">Confirm: </span>			<input class="input-medium" id='admin-comfirm' name='admin-comfirm' type="password" placeholder="Confirm"><br><br>
		  </div>		  <button type="reset" class="btn" id='admin-reset-btn' name="admin-reset-btn">Reset</button>
		  <button type="submit" class="btn" id='admin-submit-btn' name="admin-submit-btn">Login</button>
		</form>	</section></div> 