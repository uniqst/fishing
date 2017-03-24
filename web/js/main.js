$('.catalog').dcAccordion({speed:200});

function showCart(cart){
	$('#cart .modal-body').html(cart);
	$('#cart').modal();
}

function getCart(){
	return false;
	$.ajax({
		url: '/web/cart/show',
		type: 'GET',
		success: function(res){
			if(!res) alert('Ошибка');
			showCart(res);
		},
		error: function(){
			alert('Error');
		}
	});
}

$('#cart .modal-body').on('click', '.del-item', function(){
	var id = $(this).data('id');
	$.ajax({
		url: '/web/cart/del-item',
		data: {id: id},
		type: 'GET',
		success: function(res){
			if(!res) alert('Ошибка');
			showCart(res);
		},
		error: function(){
			alert('Error');
		}
	});
});

function clearCart(){
	$.ajax({
		url: '/web/cart/clear',
		type: 'GET',
		success: function(res){
			if(!res) alert('Ошибка');
			showCart(res);
		},
		error: function(){
			alert('Error');
		}
	});
}



$('.add-to-cart').on('click', function (e){
	e.preventDefault();
	var id = $(this).data('id');
	qty = $('#qty'+ id).val();
	$.ajax({
		url: '/web/cart/add',
		data: {id: id, qty: qty},
		type: 'GET',
		success: function(res){
			if(!res) alert('Ошибка');
			showCart(res);
		},
		error: function(){
			alert('Error');
		}
	});
});