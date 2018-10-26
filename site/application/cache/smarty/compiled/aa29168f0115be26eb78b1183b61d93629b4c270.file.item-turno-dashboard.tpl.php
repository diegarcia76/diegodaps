<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-22 14:48:19
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\dashboard\item-turno-dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87545bce0d63a3de02-14186550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa29168f0115be26eb78b1183b61d93629b4c270' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\dashboard\\item-turno-dashboard.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87545bce0d63a3de02-14186550',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'th' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bce0d63b31c85_74365286',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bce0d63b31c85_74365286')) {function content_5bce0d63b31c85_74365286($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\third_party\\Smarty\\plugins\\modifier.date_format.php';
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
