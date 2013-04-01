<?php $this->load->view('layouts/banner'); ?>
<div class="container">
	<div id="side-bar">
	<?php $this->load->view('layouts/admin_right_nav'); ?>
	</div>
	<section id='right_content'>
		<?php 
		//var_dump($orders);
		echo "<table class='table table-hover'>";
		echo "<thead><tr><th>Order Datetime</th><th>First Name</th><th>Last Name</th><th>Store ID</th><th>Barcode</th><th>Quantity</th><th>Price</th><th>Item Name</th><th>Payment</th><th>Address</th></tr></thead>";
		echo "<tbody>";
		foreach ($orders as $key => $order) {
			echo "<tr><td>".$order['order_datetime']."</td><td>".$order['first_name']."</td><td>".$order['last_name']."</td><td>".$order['store_id']."</td><td>".$order['barcode']."</td><td>".$order['quantity']."</td><td>".$order['discounted_price']."</td><td>".$order['name']."</td><td>".$order['discounted_price']*$order['quantity']."</td><td>".$order['address']."</td></tr>";
		}
		echo "</tbody></table>";
		?>
		<button class="btn btn-success" onClick="window.print();">Print</button>
	</section>
</div>