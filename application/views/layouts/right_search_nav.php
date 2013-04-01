<form id="right_nav_bar" class="form-inline"  method="post" accept-charset="utf-8" action="<?php echo $this->config->item('base_url').'index.php/display/search'?>"><div id='search_lable'><span class="label label-info">Search</span></div>  <div class="input-prepend input-append">  <?php echo validation_errors(); ?>
	<input class="input-medium" id='search-keyword' name='keyword' type="text" placeholder="Key Word"><br><br>    <span class="add-on">$</span>    <input class="span1" id="appendedPrependedInput" name='searchpricefrom' type="text" placeholder="From">    <span class="add-on">.00</span><br><br>
    <span class="add-on">$</span>
    <input class="span1" id="appendedPrependedInput" name='searchpriceto' type="text" placeholder="T0">
    <span class="add-on">.00</span><br><br>
	<select class="span2" name='searchsort'>
      <option value='asc'>Price from low to high</option>
      <option value='desc'>Price from high to low</option>
    </select>
	<span class="add-on">Sort</span><br><br>
	<select class="span2" name='search_cate'>		<option value='0'>All</option>		<?php 			$cates = $this->display_model->getAllMainCategory();			foreach ($cates as $key => $cate) {				echo "<option value='".$cate['c_main_id']."'>".$cate['c_main_name']."</option>";			}			$_SESSION['store_id'] = $_GET['store_id'];		?>
    </select>
	<span class="add-on">Category</span><br><br>  </div>  <button type="submit" class="btn" id='search-submit-btn' name="search-submit">Let's Search!</button></form>