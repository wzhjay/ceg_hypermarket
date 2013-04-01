<?php $this->load->view('layouts/banner'); ?>
<div class="container">
	<section id='right_content'>
		<?php echo validation_errors(); ?>
		<div id='error_display'></div>
		<form class="login"  method="post" accept-charset="utf-8" action="<?php echo $this->config->item('base_url').'index.php/member/memberRegistered'?>">
		<div class='login_lable'><span class="label label-info">Member Sign Up</span></div>
		  <div class="input-prepend input-append">
			<span class="add-on">Username: </span>
			<input class="input-medium" id='member_username' name='member_username' type="text" placeholder="Username"><br><br>
			<span class="add-on">Password: </span>
			<input class="input-medium" id='member_password' name='member_password' type="password" placeholder="Password"><br><br>
			<span class="add-on">Password Confirm: </span>
			<input class="input-medium" id='member_password_confirm' name='member_password_confirm' type="password" placeholder="Confirm"><br><br>
			<span class="add-on">Email: </span>
			<input class="input-medium" id='member_email' name='member_email' type="text" placeholder="Email"><br><br>
			<label class="checkbox">
			  <input type="checkbox" name="member_email_receive" id="member_email_receive"  value="accept" checked="checked">
			  Receive the promotion email of products from us!
			</label>
			<span class="add-on">First Name:</span>
			<input class="input-medium" id='member_first_name' name='member_first_name' type="text" placeholder="First Name"><br><br>
			<span class="add-on">Last Name: </span>
			<input class="input-medium" id='member_last_name' name='member_last_name' type="text" placeholder="Last Name"><br><br>
			<span class="add-on">Gender: </span>
			<select class="span2" name='member_gender' id='member_gender' placeholder="Gender">
				<option>Male</option>
				<option>Female</option>
			</select><br><br>
			<span class="add-on">Address: </span>
			<textarea rows="3" class="input-medium" id='member_address' name='member_address' type="text" placeholder="Address"></textarea><br><br>
		  </div>
		  <button type="reset" class="btn" id='member-reset-btn' name="member-reset-btn">Reset</button>
		  <button type="submit" class="btn" id='member-submit-btn' name="member-submit-btn">Create</button>
		</form>
	</section>
</div>