$(document).ready(function() {
    $('.fancybox').fancybox();
	
	$('.fancybox').fancybox({
		padding : 0,
		openEffect  : 'elastic'
	});
	
	$('#search-submit-btn').click(function() {
		if($('#search-keyword').val() == '') {
			console.log('2');
			// $.fancybox({
				// helpers:  {
					// title : {
						// type : 'systerm warning'
					// },
					// thumbs : {
						// width: 50,
						// height: 50,
						// source: 'http://cg3002-10-z.comp.nus.edu.sg/fancybox/blank.gif',
						// position: 'top'
					// }
				// }
			// })
			alert('Please type in the keyword!');
		}
	});
	
	$('#add-category').click(function() {
		$('#add-new-category').css({"input[type='text']": 'disabled', 'background': '#DDD'});
		$(this).css({"input[type='text']": 'enabled', 'background': '#FFF'});
	})
	
	$('#add-new-category').click(function() {
		$('#add-category').css({"input[type='text']": 'disabled', 'background': '#DDD'});
		$(this).css({"input[type='text']": 'enabled', 'background': '#FFF'});
	})
	
	$('#admin_mem_check_all_btn').click(function() {
		checkBoxes = $('.admin_member_tr input');
		checkBoxes.attr('checked', !checkBoxes.attr("checked"));
	});
	
	$('#admin_mem_send_email_btn').click(function() {
		var result = [];
		$('.admin_member_tr').each(function(idx, elem) {
			var $input = $(elem).find("input");
			
			if ($input && $input.attr("checked")) {
				var email = $.trim($(this).find(".admin_member_email_td").text());
				result.push(email);
			}
		});
		
		var emails = result.join(';')
		window.open('/index.php/admin/sendEmail?data=' + emails, '_blank');
		
	});
	
	var itemList = [];
	
	$('.add_shopping_cart').click(function() {
		var quantity;
		var barcode;
		var store_id;
		
		var item = [];
		
		var $product = $(this).closest('.product');
		quantity = $product.find('.quantity').val();
		barcode = $product.find('.productBarcode').text();
		store_id = $product.find('.productStoreID').text();
		
		item = [barcode, store_id, quantity];
		itemList.push(item);
		console.log(item);
		console.log(itemList);
		if (item.length > 0) {
			alert('Add to shopping cart successfully!');
			$product.find('.quantity').val('');
		}
	});
	
	$('#shopping_cart_btn').click(function() {
		window.open('/index.php/member/shoppingCart?data=' + itemList);
	});
	
	// $('#add-item-name').blur(function() {
		// var value = $(this).val();
		// if(ValidateBarcode(value)) {
			// $('#error_display').val('only numeric ofr barcode')
		// }
	// })
	
	// $('#add-barcode').blur(function() {
		// var value = $(this).val();
		// if(ValidateBarcode(value)) {
			// $('#error_display').val('only numeric ofr barcode')
		// }
	// })
	
	// $('#add-new-category').blur(function() {
		// var value = $(this).val();
		// if(ValidateText(value)) {
			// $('#error_display').val('only allows text oNly.. No number, No Special characters')
		// }
	// })
	
	// $('#add-manu').blur(function() {
		// var value = $(this).val();
		// if(ValidateText(value)) {
			// $('#error_display').val('only allows text oNly.. No number, No Special characters')
		// }
	// })
	
	// $('#add-price').blur(function() {
		// var value = $(this).val();
		// validatePrice(value);
	// })
	
	// $('#add-current-stock').blur(function() {
		// var value = $(this).val();
		// validateInt(value);
	// })
	
	// $('#add-min-stock').blur(function() {
		// var value = $(this).val();
		// validateInt(value);
	// })
	
	// function validateInt(ele){
		// var container = document.getElementById("error"+ele.id);
		// var threshold = ele.value.split(' ').join('');
		// t=false;
		// if(threshold =='' || threshold == null ){
			// $('#error_display').val("<font color=\"red\">This field is Required *  </font>");
		// }else if(!isNumber(threshold)){
			// $('#error_display').val("<font color=\"red\">Numbers Only </font>");
		// }else{
			// $('#error_display').val("<font color=\"Green\">Good! </font>");
			// t= true;
		// }
		// checkAll();
	
	// }
	
	// function validatePrice(ele){
		// var price = ele.value.split(' ').join('');
		// var container= document.getElementById("error"+ele.id);
		// p = false;
		// if(price === "0" || price ==='' || price === null ){
			// $('#error_display').val( "<font color=\"red\"> This field is Required * </font>");
		// }else if(!isNumber(price)){
			// $('#error_display').val("<font color=\"red\">Numbers only</font>");
		// }else if(!checkDec(price)){
			// $('#error_display').val("<font color=\"red\"> Up To 2 Decimal Place Only! </font>");
		// }else{
			// ele.setAttribute("class", "");
			// $('#error_display').val("<font color=\"Green\"> Good! </font>");
			// p = true;
		// }

		// ele.value = price;
		// checkAll();
	// }
	
	// function ValidateText(n){
		//only allows Text ONly.. No number, No Special characters
		// var currentValue = n.value;
		// var lastEntered = currentValue.charAt((currentValue.length-1));
		// if(!validationNum(lastEntered) && isSpclChar(lastEntered)){

			// return true;
		// }else{

			// if(currentValue.length == 1){
				// n.value = "";
			// }else{
				// currentValue = currentValue.substring(0,(currentValue.length-1));
				// n.value = currentValue;
			// }
			// return true;
		// }
	// }
	
	// function checkAll(){
		// if(p && t){
			// document.getElementById("sub").disabled = false;
			
		// }else{
			// document.getElementById("sub").disabled = true;
				
		// }
	// }
	
	// function ValidateBarcode(n) {
		//this function restricts to only numeric
		// var currentValue = n.value;
		// var lastEntered = currentValue.charAt((currentValue.length-1));
		// if(validationNum(lastEntered) && validateFinite(lastEntered)){
			// return true;
		// }else{
			// if(currentValue.length == 1){
				// n.value = "";
			// }else{
				// currentValue = currentValue.substring(0,(currentValue.length-1));
				// n.value = currentValue;
			// }
			// return true;
		// }

	// }
	
	// function isSpclChar(n){
		// var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?";
		// for (var i = 0; i < n.length; i++) {
			// if (iChars.indexOf(n.charAt(i)) != -1) {
				// return false;
			// }
		// }
		// return true;
	// }
});