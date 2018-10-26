<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-23 18:08:25
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\balance\acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128215bcf8d5c30c792-94252121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da0b937e8f1d0d70b2f47321274ff6adfcf22446' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\balance\\acciones.tpl',
      1 => 1540328896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128215bcf8d5c30c792-94252121',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bcf8d5c3a77f9_06313239',
  'variables' => 
  array (
    'edit_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bcf8d5c3a77f9_06313239')) {function content_5bcf8d5c3a77f9_06313239($_smarty_tpl) {?>
<div class="text-right">
     <a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/balance/change/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="Modificar Pago"><i class="fa fa-pencil"></i></a>
   
</div>
<?php }} ?>
