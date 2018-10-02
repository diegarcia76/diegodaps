<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-29 10:47:49
         compiled from "/var/www/daps/site/application/views/themes/default/include/js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174480086557ed1b85128ac7-49559001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6f655e4907ac32db0463edef262edfc3e2c6492' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/include/js.tpl',
      1 => 1475100779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174480086557ed1b85128ac7-49559001',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usuarioActual' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ed1b8517aeb5_18885543',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ed1b8517aeb5_18885543')) {function content_57ed1b8517aeb5_18885543($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">
	var __SITEURL = '<?php echo site_url();?>
';
	var __isLogged = <?php if ($_smarty_tpl->tpl_vars['usuarioActual']->value) {?>true<?php } else { ?>false<?php }?>;
<?php echo '</script'; ?>
><?php }} ?>
