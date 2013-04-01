<div id="recommend_right_nav" class="inline">
<div id='search_lable'><span class="label label-info">Biggest Discount Recommend</span></div>
  <?php
	$main_cates = $this->display_model->getAllMainCategory();
	//var_dump($main_cates);
	foreach ($main_cates as $key => $main_cate) {
		$c_main_name = $main_cate['c_main_name'];
		$c_main_id = $main_cate['c_main_id'];
		$item_array = $this->display_model->getItemByMainCategory($c_main_id);
		//var_dump($item_array);
		//exit(1);
		echo "<div class='recommend_box'>";
		echo "<div class='recommend_box_lable'><span class='label'>".$c_main_name."</span></div>";
		echo "<div class='recommend_box_content'>";
		
		foreach ($item_array as $key => $item) {
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
			
			echo "<div class='productImg'><a href=".$this->config->item('img_rechieve_url').'items/'.$this->session->userdata('store_id').'_'.$barcode.".jpg"." class='product_img fancybox'>";
			echo "<img src=".$this->config->item('img_rechieve_url').'items/'.$this->session->userdata('store_id').'_'.$barcode.".jpg"."></a></div>";
			echo "<div class='recommend-product-info'>";
			echo "<p class='productPrice'><em title='Product Price'>S$".$discount_price."  </em>"; if($discount != 100) { echo "<em class='usual_price' title='Usual Price'>S$".$price."</em>"; } echo "</p>";
			echo "<p class='productName'><em title='Product Name'>".$name."</em></p>";
			echo "<p class='productManu pull-right'><em title='Manufacturer'>".anchor($this->config->item('base_url').'index.php/display/manufacturer/'.$manufacturer, $manufacturer)."</em></p><br>";
			echo "<p class='productCateName'><em title='Catagory'>".$c_name."</em></p>";
			echo "</div>";
		}
		
		echo "</div></div>";
	}
  ?>
  
</div>