<?php $this->load->view('layouts/banner'); ?>
<div class="container">
	<div id="side-bar">
	<?php $this->load->view('layouts/admin_right_nav'); ?>
	</div>
	<section id='right_content'>
		<p>Add Item Success!</p>
		<?php 
			echo "Upload image file info: ";
			echo "<br>";
			$err = !empty($upload_data)? $upload_data : '';
			if ($err != '')
				var_dump($err);
			echo "<br><br><br>";
			echo "New item info: ";
			echo "<br>";
			echo "name: ".$add_item_name;
			echo "<br>";
			echo "manufacturer: ".$add_manu;
			echo "<br>";
			echo "store: ".$add_store;
			echo "<br>";
			echo "category ID: ".$add_category;
			echo "<br>";
			echo "barcode: ".$add_barcode;
			echo "<br>";
			echo "Price: ".$add_price;
			echo "<br>";
			echo "Production Date: ".$add_production_data;
			echo "<br>";
			echo "Expired Date: ".$add_expired_date;
			echo "<br>";
			echo "Discount: ".$add_discount;
			echo "<br>";
			echo "Current Stock: : ".$add_current_stock;
			echo "<br>";
			echo "Min Stock: ".$add_min_stock;
			echo "<br>";
			echo "Max Stock: ".$add_max_stock;
		?>

		<p><?php echo anchor('admin/viewItems/'.$this->session->userdata('store_id'), 'Go Back'); ?></p>
	</section>
</div>