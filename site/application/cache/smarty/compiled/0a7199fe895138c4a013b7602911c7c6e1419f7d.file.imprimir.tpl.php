<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-19 12:36:17
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\balance\imprimir.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56785bc9f9f1b1b5e6-79305712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a7199fe895138c4a013b7602911c7c6e1419f7d' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\balance\\imprimir.tpl',
      1 => 1539963246,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56785bc9f9f1b1b5e6-79305712',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fechas_start' => 0,
    'fechas_end' => 0,
    'aPeluquero' => 0,
    'aPel' => 0,
    'aBalance2' => 0,
    'aBal' => 0,
    'subt' => 0,
    'total' => 0,
    'comision' => 0,
    'comisionFinal' => 0,
    'totalFinal' => 0,
    'aBalance' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bc9f9f1d11be6_48666968',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc9f9f1d11be6_48666968')) {function content_5bc9f9f1d11be6_48666968($_smarty_tpl) {?>
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
 
    <?php $_smarty_tpl->tpl_vars["totalFinal"] = new Smarty_variable(0, null, 0);?>
	<?php $_smarty_tpl->tpl_vars["comisionFinal"] = new Smarty_variable(0, null, 0);?>
<?php  $_smarty_tpl->tpl_vars['aPel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aPel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aPeluquero']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aPel']->key => $_smarty_tpl->tpl_vars['aPel']->value) {
$_smarty_tpl->tpl_vars['aPel']->_loop = true;
?>
	<?php echo $_smarty_tpl->tpl_vars['aPel']->value->nombre;?>
<br />
	<?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable(0, null, 0);?>
  	<?php $_smarty_tpl->tpl_vars["comision"] = new Smarty_variable(0, null, 0);?>
  		<?php  $_smarty_tpl->tpl_vars['aBal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aBal']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aBalance2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aBal']->key => $_smarty_tpl->tpl_vars['aBal']->value) {
$_smarty_tpl->tpl_vars['aBal']->_loop = true;
?>
		
			<?php if ($_smarty_tpl->tpl_vars['aPel']->value->id==$_smarty_tpl->tpl_vars['aBal']->value['id']) {?>	
      			
		
				 <?php $_smarty_tpl->tpl_vars["subt"] = new Smarty_variable($_smarty_tpl->tpl_vars['aBal']->value['total']-$_smarty_tpl->tpl_vars['aBal']->value['descuento'], null, 0);?>
		 		 <?php echo $_smarty_tpl->tpl_vars['aBal']->value['cantidad'];?>
 -  <?php echo $_smarty_tpl->tpl_vars['aBal']->value['descripcion'];?>
 - $<?php echo $_smarty_tpl->tpl_vars['subt']->value;?>
<br />
		 		 <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['subt']->value, null, 0);?>
				 <?php $_smarty_tpl->tpl_vars["comision"] = new Smarty_variable($_smarty_tpl->tpl_vars['comision']->value+$_smarty_tpl->tpl_vars['aBal']->value['comision'], null, 0);?>
				 	
	  	    <?php }?>
		 		
  	<?php } ?>
	<br />
	Total: $<?php echo number_format($_smarty_tpl->tpl_vars['total']->value,2,'.',',');?>
<br />
	Comisión: $<?php echo number_format($_smarty_tpl->tpl_vars['comision']->value,2,'.',',');?>
<br />
	 <?php $_smarty_tpl->tpl_vars["comisionFinal"] = new Smarty_variable($_smarty_tpl->tpl_vars['comisionFinal']->value+$_smarty_tpl->tpl_vars['comision']->value, null, 0);?>
	 <?php $_smarty_tpl->tpl_vars["totalFinal"] = new Smarty_variable($_smarty_tpl->tpl_vars['totalFinal']->value+$_smarty_tpl->tpl_vars['total']->value, null, 0);?>
	 ---
	<br /><br />
<?php } ?>  
  
  <!--
  <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable(0, null, 0);?>
  <?php $_smarty_tpl->tpl_vars["comision"] = new Smarty_variable(0, null, 0);?>
  <?php  $_smarty_tpl->tpl_vars['aBal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aBal']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aBalance']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aBal']->key => $_smarty_tpl->tpl_vars['aBal']->value) {
$_smarty_tpl->tpl_vars['aBal']->_loop = true;
?>
  <?php echo $_smarty_tpl->tpl_vars['aBal']->value['nombre'];?>
<br />
  	  <?php $_smarty_tpl->tpl_vars["subt"] = new Smarty_variable($_smarty_tpl->tpl_vars['aBal']->value['total']-$_smarty_tpl->tpl_vars['aBal']->value['descuento'], null, 0);?>		
      Total: $<?php echo number_format($_smarty_tpl->tpl_vars['subt']->value,2,'.',',');?>
<br />
      <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['subt']->value, null, 0);?>
      Comisión: $<?php echo number_format($_smarty_tpl->tpl_vars['aBal']->value['comision'],2,'.',',');?>
<br />
      <?php $_smarty_tpl->tpl_vars["comision"] = new Smarty_variable($_smarty_tpl->tpl_vars['comision']->value+$_smarty_tpl->tpl_vars['aBal']->value['comision'], null, 0);?>
      <br />
  <?php } ?>
  <br />
  ---
  -->
 DETALLE FINAL
  <br />
  TOTAL: $<?php echo number_format($_smarty_tpl->tpl_vars['totalFinal']->value,2,'.',',');?>
 <br />
   
   COMISION: $<?php echo number_format($_smarty_tpl->tpl_vars['comisionFinal']->value,2,'.',',');?>
 <br />
<?php }} ?>
