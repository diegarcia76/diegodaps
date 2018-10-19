<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-05 17:39:58
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\servicios\acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130925bb785ceb35448-60786612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83f974f3dcd633d0039b09b1258e3448422d1811' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\servicios\\acciones.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130925bb785ceb35448-60786612',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb785ceb73db7_26851455',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb785ceb73db7_26851455')) {function content_5bb785ceb73db7_26851455($_smarty_tpl) {?><div class="text-right">
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/servicios/editar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Modificar"><i class="fa fa-pencil"></i></a>
    <a class="btn btn-icon-only btn-eliminar red " href="<?php echo site_url();?>
admin/servicios/eliminar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
"  data-toggle="tooltip" data-placement="top"  data-original-title="Eliminar"><i class="fa fa-times"></i></a> 
</div><?php }} ?>
