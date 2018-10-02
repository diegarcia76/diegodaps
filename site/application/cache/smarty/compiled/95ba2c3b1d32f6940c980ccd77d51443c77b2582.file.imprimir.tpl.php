<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-12-29 11:37:06
         compiled from "/var/www/daps/site/application/views/admin/balance/imprimir.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5801952015a46447c7e19f8-30039346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95ba2c3b1d32f6940c980ccd77d51443c77b2582' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/balance/imprimir.tpl',
      1 => 1514554624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5801952015a46447c7e19f8-30039346',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a46447c82a7a1_02422805',
  'variables' => 
  array (
    'fechas_start' => 0,
    'fechas_end' => 0,
    'aBalance' => 0,
    'aBal' => 0,
    'total' => 0,
    'comision' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a46447c82a7a1_02422805')) {function content_5a46447c82a7a1_02422805($_smarty_tpl) {?>
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
  Cierre de Caja
  <br />
  Del <?php echo $_smarty_tpl->tpl_vars['fechas_start']->value;?>
 al <?php echo $_smarty_tpl->tpl_vars['fechas_end']->value;?>

  <br />
  ---
  <br />
  <br />
  DETALLE
  <br />
  <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable(0, null, 0);?>
  <?php $_smarty_tpl->tpl_vars["comision"] = new Smarty_variable(0, null, 0);?>
  <?php  $_smarty_tpl->tpl_vars['aBal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aBal']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aBalance']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aBal']->key => $_smarty_tpl->tpl_vars['aBal']->value) {
$_smarty_tpl->tpl_vars['aBal']->_loop = true;
?>
  <?php echo $_smarty_tpl->tpl_vars['aBal']->value['nombre'];?>
<br />
      Total: $<?php echo number_format($_smarty_tpl->tpl_vars['aBal']->value['total'],2,'.',',');?>
<br />
      <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['aBal']->value['total'], null, 0);?>
      Comisión: $<?php echo number_format($_smarty_tpl->tpl_vars['aBal']->value['comision'],2,'.',',');?>
<br />
      <?php $_smarty_tpl->tpl_vars["comision"] = new Smarty_variable($_smarty_tpl->tpl_vars['comision']->value+$_smarty_tpl->tpl_vars['aBal']->value['comision'], null, 0);?>
      <br />
  <?php } ?>
  <br />
  ---
  <br />
  <br />
  TOTAL: $<?php echo number_format($_smarty_tpl->tpl_vars['total']->value,2,'.',',');?>

  <br />
  COMISIÓN: $<?php echo number_format($_smarty_tpl->tpl_vars['comision']->value,2,'.',',');?>

<?php }} ?>
