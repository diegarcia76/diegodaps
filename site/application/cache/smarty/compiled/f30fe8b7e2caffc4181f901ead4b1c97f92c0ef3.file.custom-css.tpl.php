<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-11-22 18:48:44
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\include\custom-css.tpl" */ ?>
<?php /*%%SmartyHeaderCode:281765bf7243c4a0598-01755051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f30fe8b7e2caffc4181f901ead4b1c97f92c0ef3' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\include\\custom-css.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '281765bf7243c4a0598-01755051',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'federacionActual' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bf7243c4bf549_49741793',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bf7243c4bf549_49741793')) {function content_5bf7243c4bf549_49741793($_smarty_tpl) {?><style type="text/css">
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
