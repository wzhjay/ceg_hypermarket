<?php $this->load->view('layouts/banner'); ?>
<div class="container">
	<section id='right_content'>
	<?php
		//var_dump($items);
		echo "<table class='table table-hover'>";
		echo "<thead><tr><th>Manufacturer</th><th>Name</th><th>Production Date</th><th>Expired Date</th><th>Usual Price</th><th>Discount</th><th>Discounted Price</th><th>Quantity</th><th>Payment</th><th>Store</th><th>Actions</th></tr></thead>";
		echo "<tbody>";
		$index = 0;
		$total = 0;
		foreach ($items as $key => $item) {
			$item['index'] = $index;
			$index += 1;
			$total += $item['quantity']*$item['discounted_price'];
			echo "<tr><td>".$item['manufacturer']."</td><td>".$item['name']."</td><td>".$item['production_date']."</td><td>".$item['expired_date']."</td><td>".$item['price']."</td><td>".$item['discount']."</td><td>".$item['discounted_price']."</td><td>".$item['quantity']."</td><td>".$item['quantity']*$item['discounted_price']."</td><td>".$item['store_id']."</td><td>".anchor('member/deleteShoppingCartItem/'.$item['o_id'], 'Delete')."</td></tr>";
		}
		echo "</tbody></table>";
		echo "<br><br>";
		echo "<div class='pull-right'><p><em>Totle Payment: $".$total."</em><p></div>";
	?>
	<button class="btn btn-success" onClick="window.open('<?php echo $this->config->item('base_url').'index.php/member/checkOut/'.$this->session->userdata['m_id'];?>')">Order!</button>
	</section>
</div>