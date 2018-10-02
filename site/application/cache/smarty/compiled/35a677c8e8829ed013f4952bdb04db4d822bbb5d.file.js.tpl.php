<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-02 23:41:23
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\include\js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209375bb3e603c77d13-51815600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35a677c8e8829ed013f4952bdb04db4d822bbb5d' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\include\\js.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209375bb3e603c77d13-51815600',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usuarioActual' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb3e603c8a8f2_25909629',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb3e603c8a8f2_25909629')) {function content_5bb3e603c8a8f2_25909629($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">
	var __SITEURL = '<?php echo site_url();?>
';
	var __isLogged = <?php if ($_smarty_tpl->tpl_vars['usuarioActual']->value) {?>true<?php } else { ?>false<?php }?>;
<?php echo '</script'; ?>
><?php }} ?>
