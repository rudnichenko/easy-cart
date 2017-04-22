jQuery(document).ready(function($){
	var cartWrapper = $('.cd-cart-container');
	//product id - you don't need a counter in your real project but you can use your real product id
	var productId = $('.prod-id');

	if( cartWrapper.length > 0 ) {
		//store jQuery objects
		var cartBody = cartWrapper.find('.body')
		var cartList = cartBody.find('ul').eq(0);
		var cartTotal = cartWrapper.find('.checkout').find('span');
		var aCheckoutBtn = cartWrapper.find('a.checkout.btn');
		var cartTrigger = cartWrapper.children('.cd-cart-trigger');
		var cartCount = cartTrigger.children('.count')
		var addToCartBtn = $('.cd-add-to-cart');
		var undo = cartWrapper.find('.undo');
		var undoTimeoutId;

		//add product to cart
		addToCartBtn.on('click', function(event){
			event.preventDefault();
			addToCart($(this));
		});

		//open/close cart
		cartTrigger.on('click', function(event){
			event.preventDefault();
			toggleCart();
		});

		//type phone name and number
		aCheckoutBtn.on('click', function(event){
			event.preventDefault();
			toggleInput();
		});

		//close cart when clicking on the .cd-cart-container::before (bg layer)
		cartWrapper.on('click', function(event){
			if( $(event.target).is($(this)) ) toggleCart(true);
		});

		//delete an item from the cart
		cartList.on('click', '.delete-item', function(event){
			event.preventDefault();
			removeProduct($(event.target).parents('.product'));
		});

		//update item quantity
		cartList.on('change', 'select', function(event){
			quickUpdateCart();
		});

		//reinsert item deleted from the cart
		undo.on('click', 'a', function(event){
			clearInterval(undoTimeoutId);
			event.preventDefault();
			cartList.find('.deleted').addClass('undo-deleted').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
				$(this).off('webkitAnimationEnd oanimationend msAnimationEnd animationend').removeClass('deleted undo-deleted').removeAttr('style');
				quickUpdateCart();
			});
			undo.removeClass('visible');
		});
	}

	$("#send-order-btn").on('click', function(e){
		e.preventDefault();

		console.log("click")
		var form = this;
		var dataForm = $(this).serialize();

		if(this.checkValidity()) {
			$.ajax({
				data : dataForm,
				type: 'POST',
				url: $(form).attr('action')
			}).done(function(data) {
				clearCart(); // clear all items from cart
				toggleCart(); // close cart
			});
		} else {
			// animate input shake
			$("#orderForm").find('input[type="tel"]').addClass('shake');
		}
	});

	function toggleCart(bool) {
		var cartIsOpen = ( typeof bool === 'undefined' ) ? cartWrapper.hasClass('cart-open') : bool;
		
		if( cartIsOpen ) {
			cartWrapper.removeClass('cart-open');
			aCheckoutBtn.find('form').replaceWith('<em>К оплате - <span>0</span> грн.</em>');
			quickUpdateCart();
			//reset undo
			clearInterval(undoTimeoutId);
			undo.removeClass('visible');
			cartList.find('.deleted').remove();

			setTimeout(function(){
				cartBody.scrollTop(0);
				//check if cart empty to hide it
				if( Number(cartCount.find('li').eq(0).text()) == 0) cartWrapper.addClass('empty');
			}, 500);
		} else {
			cartWrapper.addClass('cart-open');
		}
	}

	function clearCart() {
		cartList.children('li').each().addClass('deleted');
		quickUpdateCart();
	}

	function addToCart(trigger) {
		var cartIsEmpty = cartWrapper.hasClass('empty');
		//update cart product list
		addProduct(trigger);
		//update number of items 
		updateCartCount(cartIsEmpty);
		//update total price
		updateCartTotal(trigger.data('price'), true);
		quickUpdateCart();
		//show cart
		cartWrapper.removeClass('empty');
	}

	function addProduct(trigger) {
		var productAdded = $('<li class="product"><div class="product-image"><a href="#0"><img src="' + trigger.data('icon') + '" alt="placeholder"></a></div><div class="product-details"><h3><a href="#0">' + trigger.data('name') + '</a></h3><span class="price">' + trigger.data('price') + '</span><span class="currency"> грн.</span><div class="actions"><a href="#0" class="delete-item">Удалить</a><div class="quantity"><label for="cd-product-'+ productId +'">К-во:</label><span class="select"><select id="cd-product-'+ productId +'" name="quantity"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select></span></div></div></div></li>');
		cartList.prepend(productAdded);
	}

	function removeProduct(product) {
		clearInterval(undoTimeoutId);
		cartList.find('.deleted').remove();
		
		var topPosition = product.offset().top - cartBody.children('ul').offset().top ,
		productQuantity = Number(product.find('.quantity').find('select').val()),
		productTotPrice = Number(product.find('.price').text().replace('$', '')) * productQuantity;
		
		product.css('top', topPosition+'px').addClass('deleted');

		//update items count + total price
		updateCartTotal(productTotPrice, false);
		updateCartCount(true, -productQuantity);
		undo.addClass('visible');
		quickUpdateCart();

		//wait 8sec before completely remove the item
		undoTimeoutId = setTimeout(function(){
			undo.removeClass('visible');
			cartList.find('.deleted').remove();
		}, 8000);
	}

	function quickUpdateCart() {
		var quantity = 0;
		var price = 0;
		
		cartList.children('li:not(.deleted)').each(function(){
			var singleQuantity = Number($(this).find('select').val());
			quantity = quantity + singleQuantity;
			price = price + singleQuantity*Number($(this).find('.price').text().replace('$', ''));
		});

		// cartTotal.text(price.toFixed(2)); old code
		// my variation, with 50% discount 3+ products
		if (quantity < 3) {
			$('.cd-cart-container').find('.checkout').find('span').text(price.toFixed(2));
		} else {
			price = price - price/2;
			$('.cd-cart-container').find('.checkout').find('span').text(price.toFixed(2));
		}

		cartCount.find('li').eq(0).text(quantity);
		cartCount.find('li').eq(1).text(quantity+1);
	}

	function updateCartCount(emptyCart, quantity) {
		if( typeof quantity === 'undefined' ) {
			var actual = Number(cartCount.find('li').eq(0).text()) + 1;
			var next = actual + 1;
			
			if( emptyCart ) {
				cartCount.find('li').eq(0).text(actual);
				cartCount.find('li').eq(1).text(next);
			} else {
				cartCount.addClass('update-count');

				setTimeout(function() {
					cartCount.find('li').eq(0).text(actual);
				}, 150);

				setTimeout(function() {
					cartCount.removeClass('update-count');
				}, 200);

				setTimeout(function() {
					cartCount.find('li').eq(1).text(next);
				}, 230);
			}
		} else {
			var actual = Number(cartCount.find('li').eq(0).text()) + quantity;
			var next = actual + 1;
			
			cartCount.find('li').eq(0).text(actual);
			cartCount.find('li').eq(1).text(next);
		}
	}

	function updateCartTotal(price, bool) {
		bool ? cartTotal.text( (Number(cartTotal.text()) + Number(price)).toFixed(2) )  : cartTotal.text( (Number(cartTotal.text()) - Number(price)).toFixed(2) );
	}

	function toggleInput() {
		if (aCheckoutBtn.find('em')) {
			aCheckoutBtn.find('em').replaceWith('<form id="orderForm" class="cart-phone-form animated fadeInDown" action="sendmail.php" method="post"><input name="phone" type="tel" placeholder="0955465757" maxlength="12" minlength="10"  required><input id="hidden-list" type="hidden"><input id="send-order-btn" type="submit" value="Заказать"></form>');
		} else {
			aCheckoutBtn.find('form').replaceWith('<em></em>');
		}
	}

});