<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-22 14:53:23
         compiled from "/var/www/daps/site/application/views/admin/clientes/acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97288945829d499e4d836-51161463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd68227e657501f4491765b98b5a673ba3d9d2bca' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/clientes/acciones.tpl',
      1 => 1519219731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97288945829d499e4d836-51161463',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5829d499e67e40_34804177',
  'variables' => 
  array (
    'actualBackuser' => 0,
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5829d499e67e40_34804177')) {function content_5829d499e67e40_34804177($_smarty_tpl) {?><?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1,2))) {?>
<div class="text-right">
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/clientes/ver/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Ver"><i class="fa fa-eye"></i></a>
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/clientes/editar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Modificar"><i class="fa fa-pencil"></i></a>
    <a class="btn btn-icon-only btn-eliminar red " href="<?php echo site_url();?>
admin/clientes/eliminar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
"  data-toggle="tooltip" data-placement="top"  data-original-title="Eliminar"><i class="fa fa-times"></i></a>
</div>
<?php } else { ?>
<div class="text-right">
	<span class="text-info">Sin acceso</span>
</div>
<?php }?>
<?php }} ?>
