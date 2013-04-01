<?php $this->load->view('layouts/banner'); ?>
<div class="container">
	<div id="side-bar">
	<?php $this->load->view('layouts/admin_right_nav'); ?>
	<?php $this->load->view('layouts/trans_search_nav'); ?>
	</div>
	<section id='right_content'>
		<?php 
		echo "<table class='table table-hover'>";
		echo "<thead><tr><th>Transaction ID</th><th>Tansaction Date</th><th>Cashier ID</th><th>Store ID</th><th>Barcode</th><th>Quantity</th><th>Item Name</th><th>Actions</th></tr></thead>";
		echo "<tbody>";
		foreach ($trans as $key => $tran) {
			echo "<tr><td>".$tran['local_t_id']."</td><td>".$tran['t_date']."</td><td>".$tran['a_id']."</td><td>".$tran['s_id']."</td><td>".$tran['barcode']."</td><td>".$tran['quantity']."</td><td>".$tran['p_name']."</td><td>".anchor('admin/deleteTran/'.$tran['t_id'], 'Delete')."</td></tr>";
		}
		echo "</tbody></table>";
		?>
	</section>
</div>