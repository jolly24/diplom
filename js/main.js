$(function() {

    function showCart(cart) { 
        $('#cart-modal .modal-cart-content').html(cart);
        $('#cart-modal').modal();

        let cartQty = $('#modal-cart-qty').text() ? $('#modal-cart-qty').text() : 0;
        $('.mini-cart-qty').text(cartQty);
    }

    $('.add-to-cart').on('click', function (e) {
        e.preventDefault(); // отключение переход по ссылку
        let id = $(this).data('id'); // добавление индификатора товара в корзину

        $.ajax({ // аяк запрос
            url: 'cart.php', // отправка запроса
            type: 'GET', // запрос уходит методом get
            data: {cart: 'add', id: id}, // указываем данные , которые будут отправлены на сервер (добавление в корзину)
            dataType: 'json', // в ответе мы принимаем json
            success: function (res) { // принимаем ответ с сервера
                if (res.code == 'ok') { // получаем ответ 
                    showCart(res.answer);
                } else { // если не получилось 
                    alert(res.answer);
                }
            },
            error: function () { // запрос не дошёл 
                alert('Error'); // суда попадём
            }
        });
    });

    $('#get-cart').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'show'},
            success: function (res) {
                showCart(res);
            },
            error: function () {
                alert('Error');
            }
        });
    });

    $('#cart-modal .modal-cart-content').on('click', '#clear-cart', function () {
        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'clear'},
            success: function (res) {
                showCart(res);
            },
            error: function () {
                alert('Error');
            }
        });
    });

});