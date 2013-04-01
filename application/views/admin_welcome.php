<?php $this->load->view('layouts/banner'); ?>
<div class="container">
	<div id="side-bar">
		<?php $this->load->view('layouts/admin_right_nav'); ?>
	</div>
	<section id='right_content'>
		<h3>Welcome! </h3>
		<p><?php echo $admin['first_name'].' '.$admin['last_name']; ?></p>
		<p><?php echo $admin['position']; ?> of Store <?php echo $admin['store_id'];?></p>
		<div>
			<p>This page is used by administratives to regulate members and items.</p>
		</div>
	</section>
</div>