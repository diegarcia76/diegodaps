<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-26 16:30:59
         compiled from "/var/www/daps/site/application/views/admin/dashboard/item-turno-dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15015263645a465205bab394-29695906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b53cbea2648a4a885160e3172b83e78b29a2e9d8' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/dashboard/item-turno-dashboard.tpl',
      1 => 1519219733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15015263645a465205bab394-29695906',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a465205bf1f42_38711143',
  'variables' => 
  array (
    'th' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a465205bf1f42_38711143')) {function content_5a465205bf1f42_38711143($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/daps/site/application/third_party/Smarty/plugins/modifier.date_format.php';
?><tr>
	<td>
		<div class="fc-title">

			<span class="label <?php echo $_smarty_tpl->tpl_vars['th']->value->estadoTurno->className;?>
"><?php echo $_smarty_tpl->tpl_vars['th']->value->estadoTurno->nombre;?>
 &nbsp;
			<?php if ($_smarty_tpl->tpl_vars['th']->value->prioridad>0) {?>
			<br>&nbsp;<strong>(sobreturno)</strong>
			<?php }?>
			</span>
			
		</div>
	</td>
	<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['th']->value->fecha_hora,"%H:%M");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['th']->value->fecha_hora_fin,"%H:%M");?>
</td>
	<td><?php if ($_smarty_tpl->tpl_vars['th']->value->cliente) {
echo $_smarty_tpl->tpl_vars['th']->value->cliente->nombre;
} else {
echo $_smarty_tpl->tpl_vars['th']->value->nombre;
}?></td>
	<td><?php echo $_smarty_tpl->tpl_vars['th']->value->coiffeur->nombre;?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['th']->value->servicio->nombre;?>
</td>
	<td>
		<button class="btn btn-default pull-left cambioEstado" data-id-turno="<?php echo $_smarty_tpl->tpl_vars['th']->value->id;?>
" data-accion="<?php echo $_smarty_tpl->tpl_vars['th']->value->estadoTurno->accion_siguiente->nombre;?>
"> <?php echo $_smarty_tpl->tpl_vars['th']->value->estadoTurno->accion_siguiente->accion;?>
 </button>
		<a class="btn btn-eliminar btn-icon-only btn-default pull-left m-l-2" href="<?php echo site_url();?>
admin/turnos/eliminar/<?php echo $_smarty_tpl->tpl_vars['th']->value->id;?>
"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

		<a class="btn btn-default btn-icon-only pull-left" href="<?php echo site_url();?>
admin/turnos/editar/<?php echo $_smarty_tpl->tpl_vars['th']->value->id;?>
">
			<i class="fa fa-pencil" aria-hidden="true"></i>
		</a>
		<div class="clearfix"></div>
		</div>
	</td>
</tr><?php }} ?>
