<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-02 23:34:22
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\include\js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7465bb3e45e1a3cd3-05770104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a01047f291023733642b227069a15e81a2a5a054' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\include\\js.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7465bb3e45e1a3cd3-05770104',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usuarioActual' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb3e45e1b7572_65707548',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb3e45e1b7572_65707548')) {function content_5bb3e45e1b7572_65707548($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">
	var __SITEURL = '<?php echo site_url();?>
';
	var __isLogged = <?php if ($_smarty_tpl->tpl_vars['usuarioActual']->value) {?>true<?php } else { ?>false<?php }?>;
<?php echo '</script'; ?>
><?php }} ?>
