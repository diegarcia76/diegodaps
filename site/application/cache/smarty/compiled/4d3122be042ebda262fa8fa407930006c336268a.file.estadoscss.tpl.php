<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-12-02 09:15:51
         compiled from "/var/www/daps/site/application/views/turnos/estadoscss.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171822105758407c6a9b5447-86829603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d3122be042ebda262fa8fa407930006c336268a' => 
    array (
      0 => '/var/www/daps/site/application/views/turnos/estadoscss.tpl',
      1 => 1480680916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171822105758407c6a9b5447-86829603',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58407c6aa0e8b5_65050410',
  'variables' => 
  array (
    'estados' => 0,
    'e' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58407c6aa0e8b5_65050410')) {function content_58407c6aa0e8b5_65050410($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
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
