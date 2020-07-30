<?php
/**
 * categoryController.php
 *
 *  Контроллер страницы категории (/category/1)
 */

//подключаем модели
include_once  '../models/CategoriesModel.php';
include_once  '../models/ProductsModel.php';

/**
 * Формирование страницы категории
 *
 * @param object $smarty шаблонизатор
 */

function indexAction($smarty) {
    $catId = isset($_GET['id']) ? $_GET['id'] : null;
    if(!$catId) exit();

    $rsCategory = getCatById($catId);

}