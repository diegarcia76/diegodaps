<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-02 23:42:11
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\clientes\acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:51775bb3e6331bc024-05560646%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '391a669d55f989ac7c380b9129bc9f327c11eb1c' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\clientes\\acciones.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51775bb3e6331bc024-05560646',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'actualBackuser' => 0,
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb3e633274632_37648683',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb3e633274632_37648683')) {function content_5bb3e633274632_37648683($_smarty_tpl) {?><?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1,2))) {?>
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
