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

/**
 * Получение данных с формы
 *
 */
function getData(obj_form) {
    let hData = {};
    $('input, textarea, select', obj_form).each(function() {
        if (this.name && this.name != '') {
            hData[this.name] = this.value;
            console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }
    });
    return hData;
};
/**
 * Регистрация нового пользователя
 **/

function registerNewUser(){
    let postData = getData('#registerBox');

    $.ajax({
        type: 'POST',
        url: "/user/register/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                alert('Регистрация прошла успешно');
                //>блок в левом столбце
                $('#registerBox').hide();
                $('#userLink').attr('href', '/user');
                $('#userLink').html(data['userName']);
                $('#userBox').show();
                //<
                //> страница заказа
                $('#loginBox').hide();
                $('#btnSaveOrder').show();
                //<
            } else {
                alert(data['message']);
            }
        }
    });
}

/**
 * Разлогинивание
 * @param itemId
 */

function logout() {
    console.log('Logout');
    $.ajax({
        type: 'POST',
        url: '/user/logout/',
        success: function() {
            console.log('User logged out');
            $('#registerBox').show();
            $('#userBox').hide();
        }
    });
}

/**
 *Авторизация пользователя
 *
 */
function login() {
    let email = $('#loginEmail').val();
    let pwd = $('#loginPwd').val();

    let postData = "email=" + email + "&pwd=" + pwd;

    $.ajax({
        type: 'POST',
        url: "/user/login/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            if(data['success']){
                $('#registerBox').hide();
                $('#loginBox').hide();

                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['displayName']);
                $('#userBox').show();
            } else {
                alert(data['message']);
            }
        }
    });
}

/**
 * Показать/спрятать при нажатии кнопки регистрация
 *
 */

function showRegisterBox(){
    if($('#registerBoxHidden').css('display') != 'block' ) {
        $('#registerBoxHidden').show();
    } else{
        $('#registerBoxHidden').hide();
    }
}

/**
 * обновления данных пользователя
 */
function updateUserData(){
    console.log("js - updateUserData()");
    let phone = $('#newPhone').val();
    let adress = $('#newAdress').val();
    let pwd1 = $('#newPwd1').val();
    let pwd2 = $('#newPwd2').val();
    let curPwd = $('#curPwd').val();
    let name = $('#newName').val();

    let postData = {phone: phone,
                    adress: adress,
                    pwd1: pwd1,
                    pwd2: pwd2,
                    curPwd: curPwd,
                    name:name};

    $.ajax({
        type:'POST',
        url: "/user/update/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#userLink').html(data['userName']);
                alert(data['message']);
            }else {
                alert(data['message']);
            }
        }
    });

}