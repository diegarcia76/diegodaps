<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-05 17:43:19
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\usuarios\acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166955bb786972463b3-99536947%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '403a030c804a3c7ebd34f2f0d985cd2f2a2b4953' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\usuarios\\acciones.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166955bb786972463b3-99536947',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb786972a5e83_83767858',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb786972a5e83_83767858')) {function content_5bb786972a5e83_83767858($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\third_party\\Smarty\\plugins\\modifier.capitalize.php';
?><div class="text-right">
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/usuarios/ver/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
"><i class="fa fa-eye"></i></a>
    <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/usuarios/editar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
"><i class="fa fa-pencil"></i></a>
    <a class="btn btn-icon-only btn-eliminar red " href="<?php echo site_url();?>
admin/usuarios/eliminar/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" title="<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['edit_user']->value->nombre);?>
 <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['edit_user']->value->nombre);?>
"><i class="fa fa-times"></i></a> 
</div>
<?php }} ?>
