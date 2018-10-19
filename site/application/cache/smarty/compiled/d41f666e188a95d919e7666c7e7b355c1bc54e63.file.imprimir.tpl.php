<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-05 17:41:21
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\tickets\imprimir.tpl" */ ?>
<?php /*%%SmartyHeaderCode:322415bb78621e63477-74605265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd41f666e188a95d919e7666c7e7b355c1bc54e63' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\tickets\\imprimir.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322415bb78621e63477-74605265',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aPago' => 0,
    'aDetalle' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb786220c68a2_25429639',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb786220c68a2_25429639')) {function content_5bb786220c68a2_25429639($_smarty_tpl) {?>
<?php echo '<script'; ?>
 type="text/javascript">
window.onload = function(){
  //window.setTimeout(history.back(), 100);
  window.print();
  window.close();
};
<?php echo '</script'; ?>
>


  DIEGO DAP'S<br />
  Estilista unisex & barbería <br /><br />
  San Luis 2608 - 491-7396<br />
  ---
  <br />
  <?php echo $_smarty_tpl->tpl_vars['aPago']->value->fecha->format('d/m/Y');?>

  <br />
  # <?php echo $_smarty_tpl->tpl_vars['aPago']->value->nroFormateado;?>

  <br />
  Cliente: <?php if ($_smarty_tpl->tpl_vars['aPago']->value->cliente) {
echo $_smarty_tpl->tpl_vars['aPago']->value->cliente->nombre;
} else {
echo $_smarty_tpl->tpl_vars['aPago']->value->nombre;
}?>
  <br />
  ---
  <br />
  <br />
  DETALLE
  <br />
  <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable(0, null, 0);?>
  <?php  $_smarty_tpl->tpl_vars['aDetalle'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aDetalle']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aPago']->value->detallePago; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aDetalle']->key => $_smarty_tpl->tpl_vars['aDetalle']->value) {
$_smarty_tpl->tpl_vars['aDetalle']->_loop = true;
?>
  <?php echo $_smarty_tpl->tpl_vars['aDetalle']->value->cantidad;?>
 <?php echo $_smarty_tpl->tpl_vars['aDetalle']->value->descripcion;?>
 - <?php echo $_smarty_tpl->tpl_vars['aDetalle']->value->coiffeur->nombre;?>
 -
    $<?php echo number_format(($_smarty_tpl->tpl_vars['aDetalle']->value->precio*$_smarty_tpl->tpl_vars['aDetalle']->value->cantidad),2,'.',',');?>

    <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+($_smarty_tpl->tpl_vars['aDetalle']->value->precio*$_smarty_tpl->tpl_vars['aDetalle']->value->cantidad), null, 0);?>
      <br />
  <?php } ?>
  <br />
  ---
  <br />
  <br />
  TOTAL: $<?php echo number_format($_smarty_tpl->tpl_vars['total']->value,2,'.',',');?>

<?php }} ?>
