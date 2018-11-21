<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-11-21 17:11:08
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\caja\acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191245bf5b90831bc63-30362946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64e5a051c7cf960c068a2b56c3e612eaf350d242' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\caja\\acciones.tpl',
      1 => 1542831059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191245bf5b90831bc63-30362946',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bf5b9083582e7_09751519',
  'variables' => 
  array (
    'aPago' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bf5b9083582e7_09751519')) {function content_5bf5b9083582e7_09751519($_smarty_tpl) {?><div class="text-right">
     <a class="btn btn-icon-only  btn-eliminar red" href="<?php echo site_url();?>
admin/caja/anular/<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" data-toggle="tooltip" data-placement="top"  data-original-title="ANULAR PAGO"><i class="fa fa-times"></i></a>
   
</div><?php }} ?>
