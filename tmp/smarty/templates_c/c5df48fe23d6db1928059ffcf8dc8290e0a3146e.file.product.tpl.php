<?php /* Smarty version Smarty-3.1.6, created on 2020-08-01 11:32:58
         compiled from "../views/default\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:220225f2535c9b2d345-62345909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5df48fe23d6db1928059ffcf8dc8290e0a3146e' => 
    array (
      0 => '../views/default\\product.tpl',
      1 => 1596274377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '220225f2535c9b2d345-62345909',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5f2535c9b6e92',
  'variables' => 
  array (
    'rsProduct' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f2535c9b6e92')) {function content_5f2535c9b6e92($_smarty_tpl) {?>
<div style="display: flex; flex-direction: column;">
    <h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

    <img width="575" height="575" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
">

    Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>
 тенге.

    <a href="#" alt="Добавить в корзину">Добавить в корзину</a>
    <p> Описание <br/><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p>
</div><?php }} ?>