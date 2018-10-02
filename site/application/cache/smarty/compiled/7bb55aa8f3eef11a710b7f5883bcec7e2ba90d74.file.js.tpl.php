<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-21 12:14:40
         compiled from "/var/www/daps/site/application/views/admin/include/js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8806568835829a98f6b0451-83267821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bb55aa8f3eef11a710b7f5883bcec7e2ba90d74' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/include/js.tpl',
      1 => 1519219732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8806568835829a98f6b0451-83267821',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5829a98f6b20d5_86660945',
  'variables' => 
  array (
    'usuarioActual' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5829a98f6b20d5_86660945')) {function content_5829a98f6b20d5_86660945($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">
	var __SITEURL = '<?php echo site_url();?>
';
	var __isLogged = <?php if ($_smarty_tpl->tpl_vars['usuarioActual']->value) {?>true<?php } else { ?>false<?php }?>;
<?php echo '</script'; ?>
><?php }} ?>
