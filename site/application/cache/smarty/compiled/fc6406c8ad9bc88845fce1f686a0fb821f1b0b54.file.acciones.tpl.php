<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-05 17:41:10
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\tickets\acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182585bb78616d894f9-14059541%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc6406c8ad9bc88845fce1f686a0fb821f1b0b54' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\tickets\\acciones.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182585bb78616d894f9-14059541',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aPago' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb78616dcf1d4_80445681',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb78616dcf1d4_80445681')) {function content_5bb78616dcf1d4_80445681($_smarty_tpl) {?><div class="text-right">	
	<?php if ($_smarty_tpl->tpl_vars['aPago']->value->cobrado==true) {?>
     	<a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/tickets/imprimir/<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" data-toggle="tooltip" data-placement="top" target="_blank"  data-original-title="Imprimir"><i class="fa fa-print"></i></a>
	<?php }?>
</div><?php }} ?>
