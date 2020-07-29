<?php

    $controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

    echo $controllerName . '<br/>';

    $actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

    echo 'Func form str'.$actionName . '<br/>';

    include_once '../controllers/'.$controllerName.'Controller.php';

    $function = $actionName . "Action";
    echo 'polnoe nazvanie func' .$function."<br/>";