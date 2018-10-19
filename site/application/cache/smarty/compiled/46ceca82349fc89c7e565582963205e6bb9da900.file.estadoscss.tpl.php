<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-19 12:36:12
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\turnos\estadoscss.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83615bc9f9ec7ef945-97006982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46ceca82349fc89c7e565582963205e6bb9da900' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\turnos\\estadoscss.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83615bc9f9ec7ef945-97006982',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'estados' => 0,
    'e' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bc9f9ec858909_15496705',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc9f9ec858909_15496705')) {function content_5bc9f9ec858909_15496705($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value) {
$_smarty_tpl->tpl_vars['e']->_loop = true;
?>

    .<?php echo $_smarty_tpl->tpl_vars['e']->value->className;?>
 {
        background-color: <?php echo $_smarty_tpl->tpl_vars['e']->value->color;?>
;
    }
<?php } ?>

	.disponible{
		background-color: #95D5FF;
	}
	.nodisponible{
		background-color: #BFBFBF;
	}
	.ocupado{
		background-color: #FF9797;
	}<?php }} ?>
