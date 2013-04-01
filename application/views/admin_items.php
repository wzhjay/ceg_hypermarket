<?php $this->load->view('layouts/banner'); ?>
<div class="container">
	<div id="side-bar">
		
	</div>
	<section id='right_content'>
		<?php $this->load->view('layouts/admin_right_nav'); ?>
		<?php $this->load->view('layouts/admin_item_search'); ?>
		<?php 
		echo "<table class='table table-hover'>";
		echo "<thead><tr><th>Barcode</th><th>Manufacturer</th><th>Name</th><th>Production Date</th><th>Expired Date</th><th>Usual Price</th><th>Category</th><th>Group</th><th>Discount</th><th>Current Stock</th><th>Min Stock</th><th>Max Stock</th><th>Discounted Price</th><th>Actions</th></tr></thead>";
		echo "<tbody>";
		foreach ($items as $key => $item) {
			echo "<tr><td>".$item['barcode']."</td><td>".$item['manufacturer']."</td><td>".$item['name']."</td><td>".$item['production_date']."</td><td>".$item['expired_date']."</td><td>".$item['price']."</td><td>".$item['c_name']."</td><td>".$item['c_main_name']."</td><td>".$item['discount']."</td><td>".$item['current_stock']."</td><td>".$item['min_stock']."</td><td>".$item['max_stock']."</td><td>".$item['discounted_price']."</td><td>".anchor('admin/editItem/'.$item['barcode'].'/'.$store_id, 'Edit').' '.anchor('admin/deleteItem/'.$item['barcode'].'/'.$store_id, 'Delete')."</td></tr>";
		}
		echo "</tbody></table>";
		?>
	</section>
</div>