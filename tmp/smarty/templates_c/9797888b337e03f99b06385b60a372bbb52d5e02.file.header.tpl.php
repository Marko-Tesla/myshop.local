<?php /* Smarty version Smarty-3.1.6, created on 2020-07-30 15:56:43
         compiled from "../views/default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93995f22d19b9db940-30432700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9797888b337e03f99b06385b60a372bbb52d5e02' => 
    array (
      0 => '../views/default\\header.tpl',
      1 => 1596117403,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93995f22d19b9db940-30432700',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5f22d19ba1c61',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f22d19ba1c61')) {function content_5f22d19ba1c61($_smarty_tpl) {?><html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css" />
</head>
<body>
<div id="header">
    <h1> myshop - интернет магазин </h1>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('leftColumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="centerColumn">
    CenterColumn
</div> <?php }} ?>