<?php
    /**
     *  ProductController.php
     *
     * Контроллер страницы товара (/product/1)
     */

    // подключаем модели
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/**
 * Формирование страницы продукта
 *
 * @param object $smarty шаблонизатор
 */