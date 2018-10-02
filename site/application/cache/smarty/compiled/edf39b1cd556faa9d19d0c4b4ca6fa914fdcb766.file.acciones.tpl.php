<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-03-20 12:05:28
         compiled from "/var/www/daps/site/application/views/admin/servicios/acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1607836412582a094c9084a6-70896021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edf39b1cd556faa9d19d0c4b4ca6fa914fdcb766' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/servicios/acciones.tpl',
      1 => 1521557935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1607836412582a094c9084a6-70896021',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582a094c918ee0_62581271',
  'variables' => 
  array (
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582a094c918ee0_62581271')) {function content_582a094c918ee0_62581271($_smarty_tpl) {?><div class="text-right">
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/servicios/editar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Modificar"><i class="fa fa-pencil"></i></a>
    <a class="btn btn-icon-only btn-eliminar red " href="<?php echo site_url();?>
admin/servicios/eliminar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
"  data-toggle="tooltip" data-placement="top"  data-original-title="Eliminar"><i class="fa fa-times"></i></a> 
</div><?php }} ?>
