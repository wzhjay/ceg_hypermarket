<?php $this->load->view('layouts/banner'); ?>
<div class="container">
	<div id="side-bar">
		<?php $this->load->view('layouts/admin_right_nav'); ?>
	</div>
	<section id='right_content'>
		<p>Insert new members uploaded from local stores.</p>
		<button class="btn btn-success" onClick="window.open('<?php echo $this->config->item('base_url').'index.php/member/insertNewMember';?>')">Insert!</button>
		<br><br>
		<p>Insert new items uploaded from local stores.</p>
		<button class="btn btn-success" onClick="window.open('<?php echo $this->config->item('base_url').'index.php/admin/insertNewItem';?>')">Insert!</button>
		<br><br>
		<p>Insert new transactions uploaded from local stores.</p>
		<button class="btn btn-success" onClick="window.open('<?php echo $this->config->item('base_url').'index.php/admin/insertNewTran';?>')">Insert!</button>
		<br><br>
		<p>Update price and stock if items from local stores.</p>
		<button class="btn btn-success" onClick="window.open('<?php echo $this->config->item('base_url').'index.php/admin/updateItemFromLocal';?>')">Update Price & Stock!</button>
	</section>
</div>