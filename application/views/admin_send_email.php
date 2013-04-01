<?php $this->load->view('layouts/banner'); ?>
<div class="container">
	<div id="side-bar">
	<?php $this->load->view('layouts/admin_right_nav'); ?>
	<?php $this->load->view('layouts/admin_mem_search'); ?>
	</div>
	<section id='right_content'>
	<?php
		echo "<a href='mailto:".$emails."'><button class='btn btn-success'>Initialize Email Services</button></a><br>";
	?>
	</section>
</div>