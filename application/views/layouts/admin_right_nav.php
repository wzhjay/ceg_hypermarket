<?php if($this->session->userdata('a_id')): ?>
	<div id='right_nav_bar'>
		<div class='nav_bar_link'><?php echo anchor('admin/newAdmin', 'Add New Admin')?></div>
		<div class='nav_bar_link'><?php echo anchor('admin/addNewItem', 'Add New Item')?></div>
		<div class='nav_bar_link'><?php echo anchor('admin/viewTrans/'.$this->session->userdata('store_id'), 'View Transaction')?></div>
		<div class='nav_bar_link'><?php echo anchor('admin/viewMembers', 'Member Regulation')?></div>
		<div class='nav_bar_link'><?php echo anchor('admin/viewItems/'.$this->session->userdata('store_id'), 'Item Regulation')?></div>
		<div class='nav_bar_link'><?php echo anchor('admin/viewOrders', 'View Orders')?></div>
		<div class='nav_bar_link'><?php echo anchor('admin/synchronization', 'Synchronization')?></div>
	</div>
<?php endif;?>