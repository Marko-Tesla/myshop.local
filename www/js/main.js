/**
 *Функция добавления товара в корзину
 *
 * @param integer itemId ID продукта
 * @return в случае успеха обновятся данные корзины на сайте
 */
function addToCart(itemId) {
    console.log("js-addtoCart()");
    $.ajax({
        type: 'POST',
        url: "/cart/addtocart/" + itemId + '/',
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' + itemId).hide();
                $('#removeCart_' + itemId).show();
            }
        }

    });

}

    /**
     *Функция удаления товара из корзины
     *
     * @param integer itemId ID продукта
     * @return в случае успеха обновятся данные корзины на сайте
     */

    function removeFromCart(itemId) {
        console.log("js-removeFromCart("+itemId+")");
        $.ajax({
            type: 'POST',
            url: "/cart/removefromcart/" + itemId + '/',
            dataType: 'json',
            success: function (data) {
                if (data['success']) {
                    $('#cartCntItems').html(data['cntItems']);

                    $('#addCart_' + itemId).show();
                    $('#removeCart_' + itemId).hide();
                }
            }
        });
    }

/**
 * Подсчёт стоимости купленного товара
 * @param integer itemId ID продукта
 */
function conversionPrice(itemId) {
    let newCnt = $('#itemCnt_' + itemId).val();
    let itemPrice = $('#itemPrice_' + itemId).attr('value');
    let itemRealPrice = newCnt * itemPrice;

    $('#itemRealPrice_' + itemId).html(itemRealPrice + ' тенге');

}