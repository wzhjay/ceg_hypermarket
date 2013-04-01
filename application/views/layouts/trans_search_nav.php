<form id="right_nav_bar" class="form-inline"  method="post" accept-charset="utf-8" action="<?php echo $this->config->item('base_url').'index.php/admin/transSearch'?>">
<div id='search_lable'><span class="label label-info">Transaction Search</span></div>
  <div class="input-prepend input-append">  <?php echo validation_errors(); ?>
	<input class="input-medium" id='search-keyword' name='trans_keyword' type="text" placeholder="keyword/barcode/IDs/"><br><br>
    <span class="add-on">Date:</span>
    <input class="span1" id="appendedPrependedInput" name='search_trans_from' type="text" placeholder="From">
    <span class="add-on">(yyyy-mm-dd)</span><br><br>
    <span class="add-on">Date:</span>
    <input class="span1" id="appendedPrependedInput" name='search_trans_to' type="text" placeholder="T0">
    <span class="add-on">(yyyy-mm-dd)</span><br><br>
  </div>
  <button type="submit" class="btn" id='search-submit-btn' name="search-submit">Let's Search!</button>
</form>