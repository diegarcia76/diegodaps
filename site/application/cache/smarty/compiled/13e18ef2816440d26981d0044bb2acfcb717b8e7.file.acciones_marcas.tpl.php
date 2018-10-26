<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-23 17:45:46
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\productos\acciones_marcas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32525bcf887a248077-57370440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13e18ef2816440d26981d0044bb2acfcb717b8e7' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\productos\\acciones_marcas.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32525bcf887a248077-57370440',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bcf887a2960b7_71414165',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bcf887a2960b7_71414165')) {function content_5bcf887a2960b7_71414165($_smarty_tpl) {?><div class="text-right">
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/productos/editar_marca/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Modificar"><i class="fa fa-pencil"></i></a>
    <a class="btn btn-icon-only btn-eliminar red " href="<?php echo site_url();?>
admin/productos/eliminar_marca/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
"  data-toggle="tooltip" data-placement="top" data-original-title="Eliminar" titulo="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->nombre;?>
"><i class="fa fa-times"></i></a> 
</div><?php }} ?>
