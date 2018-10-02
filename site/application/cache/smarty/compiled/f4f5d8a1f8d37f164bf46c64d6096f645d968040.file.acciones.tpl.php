<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-26 14:51:38
         compiled from "/var/www/daps/site/application/views/admin/usuarios/acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11013204655829fbd64ee530-46863415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4f5d8a1f8d37f164bf46c64d6096f645d968040' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/usuarios/acciones.tpl',
      1 => 1519667489,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11013204655829fbd64ee530-46863415',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5829fbd6501196_71888771',
  'variables' => 
  array (
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5829fbd6501196_71888771')) {function content_5829fbd6501196_71888771($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include '/var/www/daps/site/application/third_party/Smarty/plugins/modifier.capitalize.php';
?><div class="text-right">
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/usuarios/ver/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
"><i class="fa fa-eye"></i></a>
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/usuarios/editar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
"><i class="fa fa-pencil"></i></a>
    <a class="btn btn-icon-only btn-eliminar red " href="<?php echo site_url();?>
admin/usuarios/eliminar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" title="<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['edit_user']->value->nombre);?>
 <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['edit_user']->value->nombre);?>
"><i class="fa fa-times"></i></a> 
</div>
<?php }} ?>
