<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-22 14:50:28
         compiled from "/var/www/daps/site/application/views/admin/productos/acciones_marcas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5437340805a7b1b5ee77403-87389583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f08b62003eb49f359ddc14d82417983107d621b4' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/productos/acciones_marcas.tpl',
      1 => 1519219733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5437340805a7b1b5ee77403-87389583',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a7b1b5eea1101_60890626',
  'variables' => 
  array (
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7b1b5eea1101_60890626')) {function content_5a7b1b5eea1101_60890626($_smarty_tpl) {?><div class="text-right">
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/productos/editar_marca/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Modificar"><i class="fa fa-pencil"></i></a>
    <a class="btn btn-icon-only btn-eliminar red " href="<?php echo site_url();?>
admin/productos/eliminar_marca/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
"  data-toggle="tooltip" data-placement="top" data-original-title="Eliminar" titulo="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->nombre;?>
"><i class="fa fa-times"></i></a> 
</div><?php }} ?>
