<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-02 23:42:30
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\coiffeurs\acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:287325bb3e6465a3132-02672668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23afa01977193ad9c2b1ff5741c3a3bb4ba53fea' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\coiffeurs\\acciones.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '287325bb3e6465a3132-02672668',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb3e6466548f9_24837513',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb3e6466548f9_24837513')) {function content_5bb3e6466548f9_24837513($_smarty_tpl) {?><div class="text-right">
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
