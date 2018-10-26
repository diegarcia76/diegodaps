<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-22 14:42:12
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\include\js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:261555bce0bf4afd483-78486711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '261555bce0bf4afd483-78486711',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usuarioActual' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bce0bf4b0fe44_20952973',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bce0bf4b0fe44_20952973')) {function content_5bce0bf4b0fe44_20952973($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">
	var __SITEURL = '<?php echo site_url();?>
';
	var __isLogged = <?php if ($_smarty_tpl->tpl_vars['usuarioActual']->value) {?>true<?php } else { ?>false<?php }?>;
<?php echo '</script'; ?>
><?php }} ?>
