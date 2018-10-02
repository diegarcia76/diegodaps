<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-03-20 12:11:20
         compiled from "/var/www/daps/site/application/views/admin/coiffeurs/acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2076635774582af5b14efec1-31220891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58ee3d6d903d8309f993fa09a8a5bedfc8ff9619' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/coiffeurs/acciones.tpl',
      1 => 1521557935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2076635774582af5b14efec1-31220891',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582af5b154f5a1_49275693',
  'variables' => 
  array (
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582af5b154f5a1_49275693')) {function content_582af5b154f5a1_49275693($_smarty_tpl) {?><div class="text-right">
	<a class="btn btn-icon-only blue" href="<?php echo site_url();?>
admin/coiffeurs/administrar_horarios/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Administrar Horarios"><i class="fa fa-clock-o"></i></a>
	<a class="btn btn-icon-only blue" href="<?php echo site_url();?>
admin/coiffeurs/administrar_precios/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Administrar Precios"><i class="fa fa-usd"></i></a>
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/coiffeurs/ver/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Ver"><i class="fa fa-eye"></i></a>
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/coiffeurs/editar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Modificar"><i class="fa fa-pencil"></i></a>
    <a class="btn btn-icon-only btn-eliminar red " href="<?php echo site_url();?>
admin/coiffeurs/eliminar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
"  data-toggle="tooltip" data-placement="top"  data-original-title="Eliminar"><i class="fa fa-times"></i></a> 
</div><?php }} ?>
