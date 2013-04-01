<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<script>
		$(document).ready(function() {
			$('.media-list .panel').click(function() {
				var s_id = $(this).attr('id').split("-")[1];
				window.location = 'http://ceg.ceghypermarket.info/index.php/store/store' + s_id;
			});
		});
	</script>
</head>
<body>

<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1>CEG Hypermarket</h1>
	<p>Group 10</p>
    <p class="lead">Amazing online shoping experience for you!</p>
	
	<ul class="media-list">
		<div class="media-body">
		  <div class="media">
			<div class="panel" id="store-1"><div class="hover"><img class="welcome_store" title="Store 1" src="<?php echo $this->config->item('img_rechieve_url');?>store1.jpg"></div></div>
			<div class="media-body" id="welcome_store1">
			  <h4 class="media-heading"><?php echo anchor('store/store1', 'Store 1'); ?></h4>
			  Store 1 is localed in Clementi, closed to National University of Singapore (NUS), very convenient 
			</div> 
		  </div>

			  <!-- Nested media object -->
		  <div class="media">
				<div class="panel" id="store-2"><div class="hover"><img class="welcome_store" title="Store 2" src="<?php echo $this->config->item('img_rechieve_url');?>store2.jpg"></div></div>
				<div class="media-body">
				  <h4 class="media-heading"><?php echo anchor('store/store2', 'Store 2'); ?></h4>
				</div>
		  </div>
		  <!-- Nested media object -->
		  <div class="media pull-left">
			<div class="panel" id="store-3"><div class="hover"><img class="welcome_store" title="Store 3" src="<?php echo $this->config->item('img_rechieve_url');?>store3.jpg"></div></div>
			<div class="media-body">
			  <h4 class="media-heading"><?php echo anchor('store/store3', 'Store 3'); ?></h4>
			</div>
		  </div> 
		</div>
	</ul>
  </div> 
  
  
</header>

</body>
</html>