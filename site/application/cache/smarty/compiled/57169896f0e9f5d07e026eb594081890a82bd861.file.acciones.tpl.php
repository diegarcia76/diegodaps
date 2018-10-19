<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-05 17:38:48
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\productos\acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207635bb78588e4d299-00323668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57169896f0e9f5d07e026eb594081890a82bd861' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\productos\\acciones.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207635bb78588e4d299-00323668',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb78588ead110_10053976',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb78588ead110_10053976')) {function content_5bb78588ead110_10053976($_smarty_tpl) {?><div class="text-right">
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
