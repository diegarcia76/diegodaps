<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-22 14:50:26
         compiled from "/var/www/daps/site/application/views/admin/productos/acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:911096325829fd4da55922-44244345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2b7ccb7543f0d4981bdb44637ad2e10a3684919' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/productos/acciones.tpl',
      1 => 1519219731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '911096325829fd4da55922-44244345',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5829fd4da631d2_84736637',
  'variables' => 
  array (
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5829fd4da631d2_84736637')) {function content_5829fd4da631d2_84736637($_smarty_tpl) {?><div class="text-right">
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/productos/ver/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Ver"><i class="fa fa-eye"></i></a>
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/productos/editar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Modificar"><i class="fa fa-pencil"></i></a>
    <a class="btn btn-icon-only btn-eliminar red " href="<?php echo site_url();?>
admin/productos/eliminar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
"  data-toggle="tooltip" data-placement="top"  data-original-title="Eliminar"><i class="fa fa-times"></i></a> 
</div><?php }} ?>
