<?php

/**
 *
 * cartController.php
 *
 * Котроллер работы с корзиной
 */

//подключаем модели
include_once  '../models/CategoriesModel.php';
include_once  '../models/ProductsModel.php';

/**
 * Добавление продукта в корзину
 *
 * @param integer id GET параметр - ID добавляемого продукта
 * @return json информация об операции (успех, кол-во элементов в корзине)
 */
function addtocartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (!$itemId) return false;

    $resData = array();

    // если значение не найдено, то добавляем
    if(isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    }else {
        $resData['success'] = 0;
    }

    echo json_encode($resData);
}

/**
 * Удалене продукта из корзины
 *
 * @param integer id GET параметр - ID удаляемого из корзины продукта
 * @return json информация об оперциии (успех, кол-во элементов в корзине)
 */

function removefromcartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if(!$itemId) exit();

    $resData = array();
    $key = array_search($itemId, $_SESSION['cart']);
    if($key !== false){
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
    }
    echo json_encode($resData);
}

/**
 * Формирование страницы корзины
 * @link /cart/
 */
function indexAction($smarty){
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getProductsFromArray($itemsIds);

    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');

}

/**
 * Формирование страницы заказа
 */
function orderAction($smarty){
    //получаем массив идентификаторов (ID) продуктов корзины
    $itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    //если корзина пуста то редиректим в корзину
    if (!$itemIds){
        redirect('/cart/');
        return;
    }
    //получаем из массива $_POST количество покупаемых товаров
    $itemsCnt = array();
    foreach($itemIds as $item){
        //формируем ключ для массива POST
        $postVar = 'temCnt_' . $item;
        //создаём элемент массива количества покупаемого товара
        //ключ массива - ID товара, значение массива - количество товара
        // $itemsCnt[1] = 3; товар с ID == 1 покупают 3 штуки
        $itemsCnt[$item] = isset ($_POST[$postVar]) ? $_POST[$postVar] : null;

    }

    //получаем список продуктов по массиву корзины
    $rsProducts = getProductsFromArray($itemIds);

    //добавляем каждому продукту дополнительное поле
    // "realPrice = количество продуктов * на цену продукта"
    //"cnt" = количество покупаемого товара

    //&$item - для того чтобы при изменении переменной $item
    // менялся и элемент массива $rsProducts
    $i = 0;
    foreach ($rsProducts as &$item){
        $item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
        if($item['cnt']){
            $item['realPrice'] = $item['cnt'] * $item['price'];
        } else {
            // если вдруг получилось так что товар в корзине есть, а количество == 0
            // то удаляем этот товар
            unset($rsProducts[$i]);
        }
        $i++;
    }
    if (!$rsProducts){
        echo "Корзина пуста";
        return;
    }
    // полученный массив покупаемых товаров помещаем в сессионную переменную
    $_SESSION['saleCart'] = $rsProducts;

    $rsCategories = getAllMainCatsWithChildren();

    // hideLoginBox переменная - флаг для того чтобы спрятать блоки логина и регистрации
    // в боковой панели
    if(!isset($_SESSION['user'])){
        $smarty->assign('hideLoginBox', 1);
    }
    $smarty->assign('pageTitle', 'Заказ');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');

}