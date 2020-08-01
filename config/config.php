<?php
    //Константы для обращения к контроллерам
    define('PathPrefix', '../controllers/');
    define('PathPostfix', 'Controller.php');
    //<

    // Используем шаблон
    $template = 'default';

    // Пути к файлам шаблонов
    define('TemplatePrefix', "../views/$template/");
    define('TemplatePostfix', ".tpl");

    // Пути к файлам шаблонов в вебпространстве
    define("TemplateWebPath", "/templates/$template/");
    //<

    //Инициализация шаблонизатора Smarty
    // put full path to Smarty.class.php
    require("../library/Smarty/libs/Smarty.class.php");
    $smarty = new Smarty();

    $smarty->setTemplateDir(TemplatePrefix);
    $smarty->setCompileDir("../tmp/smarty/templates_c");
    $smarty->setCacheDir("../tmp/smarty/cache");
    $smarty->setConfigDir("../library/Smarty/configs");

    $smarty->assign('templateWebPath', TemplateWebPath);

    //<


//> используемый шаблон
/*
    $template = 'default' ;

    // пути к файлам шаблонов (*.tpl)

    define('TemplatePrefix', "../views/$template/"); // где находятся шаблоны
    define('TemplatePostfix', ".tpl"); // чтобы не дописывать каждый раз формат

    // пути к файлам шаблонов в веб-пространстве
    define('TemplateNamePath', "/templates/$template/");
//<
*/