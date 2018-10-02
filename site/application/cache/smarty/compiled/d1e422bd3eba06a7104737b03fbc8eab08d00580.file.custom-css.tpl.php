<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-29 10:47:49
         compiled from "/var/www/daps/site/application/views/themes/default/include/custom-css.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134494468557ed1b850720e7-80331461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1e422bd3eba06a7104737b03fbc8eab08d00580' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/include/custom-css.tpl',
      1 => 1475100779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134494468557ed1b850720e7-80331461',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'federacionActual' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ed1b850d1036_03172721',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ed1b850d1036_03172721')) {function content_57ed1b850d1036_03172721($_smarty_tpl) {?><style type="text/css">
	body #header-container{
		<?php if ($_smarty_tpl->tpl_vars['federacionActual']->value->fondo) {?>
		background-image: url(<?php ob_start();?><?php echo \Managers\ImagenManager::getInstance()->getUrl($_smarty_tpl->tpl_vars['federacionActual']->value->fondo,'full');?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
) !important;
		background-size: cover !important;
		background-position: top center;
		<?php }?>
	}
</style><?php }} ?>
