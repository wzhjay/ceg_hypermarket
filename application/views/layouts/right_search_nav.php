<form id="right_nav_bar" class="form-inline"  method="post" accept-charset="utf-8" action="<?php echo $this->config->item('base_url').'index.php/display/search'?>">
	<input class="input-medium" id='search-keyword' name='keyword' type="text" placeholder="Key Word"><br><br>
    <span class="add-on">$</span>
    <input class="span1" id="appendedPrependedInput" name='searchpriceto' type="text" placeholder="T0">
    <span class="add-on">.00</span><br><br>
	<select class="span2" name='searchsort'>
      <option value='asc'>Price from low to high</option>
      <option value='desc'>Price from high to low</option>
    </select>
	<span class="add-on">Sort</span><br><br>
	<select class="span2" name='search_cate'>
    </select>
	<span class="add-on">Category</span><br><br>