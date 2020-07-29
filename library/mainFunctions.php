<?php

/**
 *
 * Основные функции
 *
 */

/**
 * Формирование запрашиваемой страницы
 *
 * @param string $controllerName название контроллера
 * @param string $actionName название функции обработки страницы
 */
function loadPage($smarty, $controllerName, $actionName = 'index'){

    include_once PathPrefix . $controllerName . PathPostfix;

    $function = $actionName . 'Action';
    $function($smarty);
}

/**
 * Загрузка шаблона
 *
 * @param object $smarty объект шаблонизатора
 * @param string $templateName название файла шаблона
 */
function loadTemplate($smarty, $templateName)
{
    #$smarty->display(TemplatePrefix . $templateName . TemplatePostfix);
    $smarty->display($templateName . TemplatePostfix);
    #TemplatePrefix . $templateName .= TemplatePostfix;
    #$smarty->display( $templateName);
}











