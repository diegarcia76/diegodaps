<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-19 12:36:11
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\include\js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18725bc9f9ebf21157-74930821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '18725bc9f9ebf21157-74930821',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usuarioActual' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bc9f9ebf35351_70208209',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc9f9ebf35351_70208209')) {function content_5bc9f9ebf35351_70208209($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">
	var __SITEURL = '<?php echo site_url();?>
';
	var __isLogged = <?php if ($_smarty_tpl->tpl_vars['usuarioActual']->value) {?>true<?php } else { ?>false<?php }?>;
<?php echo '</script'; ?>
><?php }} ?>
