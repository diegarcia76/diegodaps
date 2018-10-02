<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-22 10:34:27
         compiled from "/var/www/daps/site/application/views/include/js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19983667295819f52b60afe0-52023629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e88583cf0eca572fa692305bf522c532e76636b2' => 
    array (
      0 => '/var/www/daps/site/application/views/include/js.tpl',
      1 => 1519219732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19983667295819f52b60afe0-52023629',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5819f52b611115_46709866',
  'variables' => 
  array (
    'usuarioActual' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5819f52b611115_46709866')) {function content_5819f52b611115_46709866($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">
	var __SITEURL = '<?php echo site_url();?>
';
	var __isLogged = <?php if ($_smarty_tpl->tpl_vars['usuarioActual']->value) {?>true<?php } else { ?>false<?php }?>;
<?php echo '</script'; ?>
><?php }} ?>
