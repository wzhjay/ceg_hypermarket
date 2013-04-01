<?php $this->load->view('layouts/banner'); ?>
<div class="container">
	<?php $this->load->view('layouts/category_nav'); ?>
	<div id="side-bar">
	<?php $this->load->view('layouts/right_search_nav'); ?>
	<?php $this->load->view('layouts/recommend_right_nav'); ?>
	</div>
	
	<section id='display_content'>
	<?php
		// var_dump($keyword);
		// var_dump($search_price_from);
		// var_dump($search_price_to);
		// var_dump($search_sort);
		// var_dump($search_cate);
		// var_dump($items);
		foreach($items as $key => $item) {
			//$i_id = $item['hq_i_id'];  // can change to barcode later
			$name = $item['name'];
			$barcode = $item['barcode'];
			$manufacturer = $item['manufacturer'];
			$price = $item['price'];
			$c_name = $item['c_name'];
			$c_main_name = $item['c_main_name'];
			$c_main_id = $item['c_main_id'];
			$discount = $item['discount'] * 100;
			$discounted_price = $item['discounted_price'];
			$discount_price = round($discounted_price, 2);
			
			echo "<div class='product'><div class='product-content'>";
			if ($discount != 100) {
				echo "<div class='product_discount_lable'><span class='label label-warning'>Discounted To: ".$discount."% </span></div>";  // discount ,e.g 70%! 
			}	
			if ($discount <= 75) {
				echo "<div class='product_promotion_lable'><span class='label label-info'>Must Buy!</span></div>";
			}	
			echo "<div class='productImg'><a href=".$this->config->item('img_rechieve_url').'items/'.$this->session->userdata('store_id').'_'.$barcode.".jpg"." class='product_img fancybox'>";
			echo "<img src=".$this->config->item('img_rechieve_url').'items/'.$this->session->userdata('store_id').'_'.$barcode.".jpg"."></a></div>";
			echo "<p class='productPrice'><em title='Product Price'>S$".$discount_price."  </em>"; if($discount != 100) { echo "<em class='usual_price' title='Usual Price'>S$".$price."</em>"; } echo "</p>";
			echo "<p class='productName'><em title='Product Name'>".$name."</em></p>";
			echo "<p class='productManu pull-right'>Buy!<input type='text' class='quantity'>   <em title='Manufacturer'>".anchor($this->config->item('base_url').'index.php/display/manufacturer/'.$manufacturer, $manufacturer)."</em></p><br>";
			echo "<p class='productCateName'><em title='Catagory'>".$c_name."</em></p>";
			echo "<p class='productCateMainName'><em title='Groups'>".anchor($this->config->item('base_url').'index.php/display/category/'.$c_main_id, $c_main_name)."</em></p>";
			if($this->session->userdata('m_id')) { echo "<a><p class='add_shopping_cart pull-right'><em title='shopping_cart'>Add to shopping cart</em></p></a><br>"; }
			echo "<p class='productBarcode'>".$barcode."</p>";
			echo "<p class='productStoreID'>".$this->session->userdata('store_id')."</p>";
			echo "</div></div>"; 
			// if promotion, add lable
		}
	?>
	</section>
</div>