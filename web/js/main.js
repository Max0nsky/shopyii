// Ajax-корзина

function showCart(cart) {
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res) {
            if (!res) {
                alert("Ошибка!")
            }
            showCart(res);
        },
        error: function() {
            alert("Ошибка корзины!");
        }
    })
    return false;
}

function clearCart(cart) {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function(res) {
            if (!res) {
                alert("Ошибка!")
            }
            showCart(res);
        },
        error: function() {
            alert("Ошибка корзины!");
        }
    })
}

$('.add-to-cart').on('click', function(ob) {
    ob.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/add',
        data: { id: id },
        type: 'GET',
        success: function(res) {
            if (!res) {
                alert("Ошибка, товар не существует.");
            }
            showCart(res);
        },
        error: function() {
            alert("Ошибка корзины!");
        }
    });
});

$('#cart .modal-body').on('click', '.del-item', function() {
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/del-item',
        data: { id: id },
        type: 'GET',
        success: function(res) {
            if (!res) {
                alert("Ошибка, товар не существует.");
            }
            showCart(res);
        },
        error: function() {
            alert("Ошибка корзины!");
        }
    });
});