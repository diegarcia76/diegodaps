<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-25 12:37:30
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\clientes\acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89285bca28b37eb5b1-69324932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '391a669d55f989ac7c380b9129bc9f327c11eb1c' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\clientes\\acciones.tpl',
      1 => 1540481792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89285bca28b37eb5b1-69324932',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bca28b38850a2_81584172',
  'variables' => 
  array (
    'actualBackuser' => 0,
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bca28b38850a2_81584172')) {function content_5bca28b38850a2_81584172($_smarty_tpl) {?><?php if (in_array($_smarty_tpl->tpl_vars['actualBackuser']->value->perfil->id,array(1,2))) {?>
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
	<input type="checkbox" name="eliminar[]" class="eliminar" id="eliminar" rel="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
"/>
</div>
<?php } else { ?>
<div class="text-right">
	<span class="text-info">Sin acceso</span>
</div>
<?php }?>
<?php }} ?>
