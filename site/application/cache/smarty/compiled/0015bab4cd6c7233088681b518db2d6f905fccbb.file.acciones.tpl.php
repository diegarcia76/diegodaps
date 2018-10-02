<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-03-28 12:51:53
         compiled from "/var/www/daps/site/application/views/admin/tickets/acciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:834932342592589db2c31f8-62626760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0015bab4cd6c7233088681b518db2d6f905fccbb' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/tickets/acciones.tpl',
      1 => 1522252310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '834932342592589db2c31f8-62626760',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592589db2ce102_72040956',
  'variables' => 
  array (
    'aPago' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592589db2ce102_72040956')) {function content_592589db2ce102_72040956($_smarty_tpl) {?><div class="text-right">	
	<?php if ($_smarty_tpl->tpl_vars['aPago']->value->cobrado==true) {?>
     	<a class="btn btn-icon-only yellow" href="<?php echo site_url();?>
admin/tickets/imprimir/<?php echo $_smarty_tpl->tpl_vars['aPago']->value->id;?>
" data-toggle="tooltip" data-placement="top" target="_blank"  data-original-title="Imprimir"><i class="fa fa-print"></i></a>
	<?php }?>
</div><?php }} ?>
