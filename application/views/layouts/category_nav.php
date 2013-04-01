<script>
	$(document).ready(function() {
		$('#category-nav .panel').click(function() {
			var c_id = $(this).attr('id').split("-")[1];
			window.location = 'http://ceg.ceghypermarket.info/index.php/display/category/' + c_id;
		});
	});
</script>
<div id="category-nav">
	<div class="panel" id="category-1"><div class="hover"><img class="welcome_store" title="Household Items" src="<?php echo $this->config->item('img_rechieve_url');?>category1.jpg"></div></div>
	<div class="panel" id="category-2"><div class="hover"><img class="welcome_store" title="Fresh & Frozen" src="<?php echo $this->config->item('img_rechieve_url');?>category2.jpg"></div></div>
	<div class="panel" id="category-3"><div class="hover"><img class="welcome_store" title="Food & Beverages" src="<?php echo $this->config->item('img_rechieve_url');?>category3.jpg"></div></div>
	<div class="panel" id="category-4"><div class="hover"><img class="welcome_store" title="Fashion, Beauty & Personal Care" src="<?php echo $this->config->item('img_rechieve_url');?>category4.jpg"></div></div>
	<div class="panel" id="category-5"><div class="hover"><img class="welcome_store" title="Office Supplies & Electrical Appliances" src="<?php echo $this->config->item('img_rechieve_url');?>category5.jpg"></div></div>
	<div class="panel" id="category-6"><div class="hover"><img class="welcome_store" title="Entertainment & Games" src="<?php echo $this->config->item('img_rechieve_url');?>category6.jpg"></div></div>
	<div class="panel" id="category-7"><div class="hover"><img class="welcome_store" title="Sports & Outdoors" src="<?php echo $this->config->item('img_rechieve_url');?>category7.jpg"></div></div>
	<div class="panel" id="category-8"><div class="hover"><img class="welcome_store" title="Child Care & Medications" src="<?php echo $this->config->item('img_rechieve_url');?>category8.jpg"></div></div>
	<div class="panel" id="category-9"><div class="hover"><img class="welcome_store" title="Other Merchandise" src="<?php echo $this->config->item('img_rechieve_url');?>category9.jpg"></div></div>
</div>