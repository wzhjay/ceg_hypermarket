<form id="right_nav_bar" class="form-inline"  method="post" accept-charset="utf-8" action="<?php echo $this->config->item('base_url').'index.php/admin/memsSearch'?>">
<div id='search_lable'><span class="label label-info">Member Search</span></div>
  <div class="input-prepend input-append">
  <?php echo validation_errors(); ?>
	<input class="input-medium" id='mem-search-keyword' name='mems_keyword' type="text" placeholder="name/email/card IDs/"><br><br>
    <span class="add-on">Create:</span>
    <input class="span1" id="appendedPrependedInput" name='search_mems_from' type="text" placeholder="From">
    <span class="add-on">(yyyy-mm-dd)</span><br><br>
    <span class="add-on">Expiry:</span>
    <input class="span1" id="appendedPrependedInput" name='search_mems_to' type="text" placeholder="T0">
    <span class="add-on">(yyyy-mm-dd)</span><br><br>
	<span class="add-on">Gender</span>
	<select class="span2" name='search_gender'>
	  <option value='null'>Don't Care</option>
      <option value='male'>Male</option>
      <option value='female'>Female</option>
    </select><br><br>
	<span class="add-on">Level</span>
	<select class="span2" name='search_level'>
	  <option value='null'>Don't Care</option>
      <option value='1'>1</option>
      <option value='2'>2</option>
	  <option value='3'>3</option>
	  <option value='4'>4</option>
	  <option value='5'>5</option>
    </select><br><br>
  </div>
  <button type="submit" class="btn" id='search-submit-btn' name="search-submit">Let's Search!</button>
</form>