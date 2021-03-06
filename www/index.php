<?php

    session_start(); // стартуем сессию
    // если в сессии нет массива корзины, то создаём его

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    include_once '../config/config.php'; //Инициализация настроек
    include_once '../config/db.php'; //Инициализация БД
    include_once '../library/mainFunctions.php';//Основные функции

    // определяем с каким контроллером будем работать.
    $controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

    // определяем с какой функцией будем работать.
    $actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

    //Если в сессии есть данные об авторизованном пользователе, то передаём
    //их в шаблон
    if (isset($_SESSION['user'])){
        $smarty->assign('arUser',$_SESSION['user']);
    }

    $smarty->assign('cartCntItems', count($_SESSION['cart']));

    loadPage($smarty, $controllerName, $actionName);
