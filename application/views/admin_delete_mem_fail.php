<?php $this->load->view('layouts/banner'); ?>
<div class="container">
	<div id="side-bar">
	<?php $this->load->view('layouts/admin_right_nav'); ?>
	</div>
	<section id='right_content'>
		<p>Delete Member Failed!</p>
		<p><?php echo anchor('admin/viewMembers', 'Go Back'); ?></p>
	</section>
</div>