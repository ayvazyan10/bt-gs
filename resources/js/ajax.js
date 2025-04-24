$(document).ready(function($) {
	$(document).on('click','.add_to_cart',function(event) {
		event.preventDefault();
		var that = $(this);
		var rel = that.data('rel');
		var qty = that.parents('.product_parent').find('.qty').val();
		$.ajax({
			url: '/actions/',
			type: 'POST',
			dataType: 'json',
			data: {
				'product_rel': rel,
				'product_quantity': qty,
				'doit': 'add_shopbag'
			},
			success: function (data) {
				if(data.status == 'ok') {
					// location.reload();
					$('.shopcartcount').text(Number($('.shopcartcount').text()) + Number(qty));
					that.parents('.product_parent').find('.qty').val(1);
				} else {
					alert(data.message);
				}
			}
		});
	});
	$(document).on('click','.add_to_cart_one',function(event) {
		event.preventDefault();
		var rel = $(this).data('rel');
		$.ajax({
			url: '/actions/',
			type: 'POST',
			dataType: 'json',
			data: {
				'product_rel': rel,
				'product_quantity': 1,
				'doit': 'add_shopbag'
			},
			success: function (data) {
				if(data.status == 'ok') {
					// location.reload();
					$('.shopcartcount').text(Number($('.shopcartcount').text()) + 1);
				} else {
					alert(data.message);
				}
			}
		});
	});
	$(document).on('click','.deletefromcart',function(event) {
		event.preventDefault();
		var rel = $(this).data('rel');
		$.ajax({
			url: '/actions/',
			type: 'POST',
			dataType: 'json',
			data: {
				'product_rel': rel,
				'doit': 'deletefromshopbag'
			},
			success: function (data) {
				if(data.status == 'ok') {
					location.reload();
				} else {
					alert(data.message);
				}
			}
		});
	});
	$(document).on('click','.add_to_wishlist',function(event) {
		event.preventDefault();
		var rel = $(this).data('rel');
		$.ajax({
			url: '/actions/',
			type: 'POST',
			dataType: 'json',
			data: {
				'product_rel': rel,
				'doit': 'add_wishlist'
			},
			success: function (data) {
				if(data.status == 'ok') {
					location.reload();
				} else {
					alert(data.message);
				}
			}
		});
	});
	$(document).on('click','.deletefromwishlist',function(event) {
		event.preventDefault();
		var rel = $(this).data('rel');
		$.ajax({
			url: '/actions/',
			type: 'POST',
			dataType: 'json',
			data: {
				'product_rel': rel,
				'doit': 'deletefromwishlist'
			},
			success: function (data) {
				if(data.status == 'ok') {
					location.reload();
				} else {
					alert(data.message);
				}
			}
		});
	});

	if( $('.reg_form').length > 0 ) {
		$('.reg_form').parsley().on('form:submit', function () {
		    $.ajax({
				url: '/actions/',
				type: 'POST',
				dataType: 'json',
				data: $('.reg_form').serialize() + "&doit=reg",
				success: function(data) {
					if(data.status == 'ok') {
						$('.reg_form')[0].reset();
					} else {
						alert(data.message);
					}
				}
			});
			return false;
		});
	}

	if( $('.login_form').length > 0 ) {
		$('.login_form').parsley().on('form:submit', function () {
		    $.ajax({
				url: '/actions/',
				type: 'POST',
				dataType: 'json',
				data: $('.login_form').serialize() + "&doit=login",
				success: function(data) {
					if(data.status == 'ok') {
						window.location = data.url;
						// location.reload();
					} else {
						alert(data.message);
					}
				}
			});
			return false;
		});
	}

	if( $('#edit_profile_data').length > 0 ) {
		$('#edit_profile_data').parsley().on('form:submit', function () {
		    $.ajax({
				url: '/actions/',
				type: 'POST',
				dataType: 'json',
				data: $('#edit_profile_data').serialize() + "&doit=edit_profile_data",
				success: function(data) {
					if(data.status == 'ok') {
						// $('#edit_profile_data')[0].reset();
					} else {
						alert(data.message);
					}
				}
			});
			return false;
		});
	}

	$('#load_more').click(function(event){
		event.preventDefault();
		var that = $(this);
		var shown = that.data('shown');
		$.ajax({
			url: '/actions/',
			type: 'POST',
			dataType: 'json',
			data: {
				'from': shown,
				'qty': 6,
				'doit': 'load_more'
			},
			
			success: function (data) {
				if(data.status == 'ok') {
					var products = data.products;
					var product;
					for (var i in products) {
						product = products[i];
						$('#products_in_homepage').append("<div class='maxarts-width-1-3' style='float:left;'><div class='short_product_item shortp_product product_parent'><div class='shortptopside'><a class='shortpfastaddcart add_to_cart_one' data-rel='"+product['rel']+"' href=''></a><a class='shortpfastaddwishlist add_to_wishlist' data-rel='"+product['rel']+"' href='#'></a></div><div class='shortpimg'><a href='/"+data.lang+"/products/"+product['link']+"/'><img src='"+product['main_img']+"'></a></div><a href='/"+data.lang+"/products/"+product['link']+"/'><div class='shortptitle'>"+product['title']+"</div></a><div class='shortpbottomside'><div class='form-group'><span class='shortpcan'>1 CAN</span>"+(product['c_dis_price'] == 0 ? product['c_price'] + data.currency_db['code']  : '<del>' + product['c_price'] + data.currency_db['code'] + '</del>' + product['c_dis_price']+ data.currency_db['code'])+"<div class='shortpbottoms'><div class='_number'><span class='_minus'>-</span><input type='text' value='1' name='qty' size='3' class='input-sm qty' /><span class='_plus'>+</span></div><button class='add_to_cart shortpaddtocart' data-rel='"+product['rel']+"'>BUY</button></div></div></div></div></div>");
					// minusplus();
					}
					that.data('shown', shown + 6);
				} else {
					alert(data.message);
				}
			}
		});
		
	});

	if ( $('.subscribe').length > 0 ) {
		$('.subscribe').parsley().on('form:submit', function () {
		    $.ajax({
				url: '/actions/',
				type: 'POST',
				dataType: 'json',
				data: $('.subscribe').serialize() + "&doit=subscribe",
				success: function(data) {
					if(data.status == 'ok') {
						$('.subscribe')[0].reset();
						$('._subscribetext').html("You are successfully registered to our newsletter");
					} else {
						//alert(data.message);
						$('._subscribetext').html(data.message);
					}
				}
			});
			return false;
		});
	}

	$('#zipcode').blur(function(event) {
		var zipcode = $('#zipcode').val();
		var country = $('#country option:selected').text();
		$.ajax({
			url: 'http://maps.google.com/maps/api/geocode/json?components=country:'+country+'|postal_code:'+zipcode+'&sensor=false&language=en',
			type: 'GET',
			dataType: 'JSON'
		}).done(function(data) {
			if (typeof(data.results[0].address_components[2]) != 'undefined') $('#city').val(data.results[0].address_components[2].long_name);
			else $('#city').val("cannot find");
		});
		
	});

	if ($('#add_comment').length > 0) {
		$('#add_comment').parsley().on('form:submit', function () {
		    $.ajax({
				url: '/actions/',
				type: 'POST',
				dataType: 'json',
				data: $('#add_comment').serialize() + "&doit=add_comment",
				success: function(data) {
					if(data.status == 'ok') {
						$('#add_comment')[0].reset();
					} else {
						alert(data.message);
					}
				}
			});
			return false;
		});
	}

	if ($('#filter').length > 0) {
		$('#filter').submit(function(){
			return false;
		});
		$('#filter *, #filter_top *').change(function(){
			$.ajax({
				url: '/actions/',
				type: 'POST',
				dataType: 'json',
				data: $('#filter, #filter_top').serialize() + "&doit=filter",
				success: function(data) {
					if(data.status == 'ok') {
						var product;
						$('#products_div').html('');
						for ( i in data.products ) {
							product = data.products[i];
							$('#products_div').append("<div class='maxarts-width-1-3' style='float:left;'><div class='short_product_item shortp_product product_parent'><div class='shortptopside'><a class='shortpfastaddcart add_to_cart_one' data-rel='"+product['rel']+"' href=''></a><a class='shortpfastaddwishlist add_to_wishlist' data-rel='"+product['rel']+"' href='#'></a></div><div class='shortpimg'><a href='/"+data.lang+"/products/"+product['link']+"/'><img src='"+product['main_img']+"'></a></div><a href='/"+data.lang+"/products/"+product['link']+"/'><div class='shortptitle'>"+product['title']+"</div></a><div class='shortpbottomside'><div class='form-group'><span class='shortpcan'>1 CAN</span>"+(product['c_dis_price'] == 0 ? product['c_price'] + data.currency_db['code']  : '<del>' + product['c_price'] + data.currency_db['code'] + '</del>' + product['c_dis_price']+ data.currency_db['code'])+"<div class='shortpbottoms'><div class='_number'><span class='_minus'>-</span><input type='text' value='1' name='qty' size='3' class='input-sm qty' /><span class='_plus'>+</span></div><button class='add_to_cart shortpaddtocart' data-rel='"+product['rel']+"'>BUY</button></div></div></div></div></div>")
						}
					} else {
						alert(data.message);
					}
				}
			});
		});
	}

	$('#search_input').keyup(function(){
		var that = $(this),
			value = that.val();
		$.ajax({
			url: "/actions/",
			type: 'POST',
			dataType: 'json',
			data: {
				text: value,
				doit: 'live_text_search'
			},
			success: function(data) {
				var product;
				$('#sch-data').html('');
				if ( data.count > 0 ) {
					for (i in data.products) {
						product = data.products[i];
						$('#sch-data').append("<a href='"+product.url+"'><img src='"+product.main_img+"'>"+product.title+"</p></a>");
					}
					$('#_headerend').css('overflow', 'visible');
					$('#sch-data').slideDown(400);
				} else {
					$('#_headerend').css('overflow', 'hidden');
					$('#sch-data').hide();
				}
			}
		});
	});

	$('.rating input').click(function(event) {
		event.preventDefault();
		var rating      = $(this).val();
		var product_rel = $(this).parents('.rating').data('rel');
		$.ajax({
			url: "/actions/",
			type: 'POST',
			dataType: 'json',
			data: {
				product_rel: product_rel,
				rating: rating,
				doit: 'rate'
			},
			success: function(data) {
				if (data.status == 'ok') {
					if (data.rating <= 5 && data.rating > 4.5) {
						$('.rating input[value="5"]').prop( "checked", true );
					} else if (data.rating <= 4.5 && data.rating > 4) {
						$('.rating input[value="4.5"]').prop( "checked", true );
					} else if (data.rating <= 4 && data.rating > 3.5) {
						$('.rating input[value="4"]').prop( "checked", true );
					} else if (data.rating <= 3.5 && data.rating > 3) {
						$('.rating input[value="3.5"]').prop( "checked", true );
					} else if (data.rating <= 3 && data.rating > 2.5) {
						$('.rating input[value="3"]').prop( "checked", true );
					} else if (data.rating <= 2.5 && data.rating > 2) {
						$('.rating input[value="2.5"]').prop( "checked", true );
					} else if (data.rating <= 2 && data.rating > 1.5) {
						$('.rating input[value="2"]').prop( "checked", true );
					} else if (data.rating <= 1.5 && data.rating > 1) {
						$('.rating input[value="1.5"]').prop( "checked", true );
					} else if (data.rating <= 1 && data.rating > 0.5) {
						$('.rating input[value="1"]').prop( "checked", true );
					} else if (data.rating <= 0.5 && data.rating > 0) {
						$('.rating input[value="0.5"]').prop( "checked", true );
					}
				} else {
					alert(data.message);
				}
			}
		});
	});
});

$(document).ready(function() {
		$(document).on('click','._minus', function () {
			var $input = $(this).parent().find('input');
			var count = parseInt($input.val()) - 1;
			count = count < 1 ? 1 : count;
			$input.val(count);
			$input.change();
			return false;
		});
		$(document).on('click','._plus',function () {
			var $input = $(this).parent().find('input');
			$input.val(parseInt($input.val()) + 1);
			$input.change();
			return false;
		});
	});

$(".open_search").click(function() { $(".hidden_search").fadeIn(); 	});
$(".close_searchbox").click(function() { $(".hidden_search").fadeOut(); });

$('ul.navbar-nav li a').each(function () { var location = window.location.href; var link = this.href; if(location == link) { $(this).parent().addClass('selected'); $(this).append('<span class="navbar-unread"></span>') } });