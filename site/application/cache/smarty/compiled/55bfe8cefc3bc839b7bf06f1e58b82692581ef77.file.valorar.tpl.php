<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-03-21 11:52:38
         compiled from "/var/www/daps/site/application/views/mails/valorar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4084394795902223bab8c57-65283220%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55bfe8cefc3bc839b7bf06f1e58b82692581ef77' => 
    array (
      0 => '/var/www/daps/site/application/views/mails/valorar.tpl',
      1 => 1521642690,
      2 => 'file',
    ),
    '58d6503fb43dd53fcdc761a04b3aea9b0eee786c' => 
    array (
      0 => '/var/www/daps/site/application/views/mails/base.tpl',
      1 => 1498751243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4084394795902223bab8c57-65283220',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5902223bad84f7_02172641',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5902223bad84f7_02172641')) {function content_5902223bad84f7_02172641($_smarty_tpl) {?><div width="100%" height="100%" style="height: 100%; padding: 0; margin: 0; background: #180807;font-family: 'Helvetica', san-serif; text-align: center;">
<table align="center" style="padding:0; margin: 0 auto 60px;">
	<tr>
    	<td align="center" style="padding: 30px 0">
        	<img src="http://turnos.diegodaps.com/assets/images/isologo.png" alt="logo Dap's" width="160" height="auto" />
    	</td>
    </tr>
	<tr>
		<td align="center">
			<table width="500" height="300" style="background: white; border:5px solid #ceac5b;">
		    	<thead>

		        </thead>
		    	<tbody >
		        	<tr>
		            	<td align="center" style="padding: 30px;">
		                
<h3 style="margin:0 auto; padding: 0 auto;">¡Hola <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
! :)</h3>
<p><strong>Gracias por visitarnos.</strong></p>
<p>Para poder seguir mejorando, te pedimos que puntues el servicio que te dimos.</p>
<div style="margin-bottom:30px;"></div>
	<a href="<?php echo $_smarty_tpl->tpl_vars['verificar_link']->value;?>
" style="text-decoration: none; color:white; background: #ceac5b; padding: 10px 10px; border-radius: 100px; margin: 30px 0;">
    PUNTUAR EL SERVICIO: <?php echo $_smarty_tpl->tpl_vars['servicio']->value;?>

  </a>
<p style="margin-top: 60px;">
	<small>Si el link no abre correctamente, prueba copiandolo y pegandolo en tu navegador. <br> <br><?php echo $_smarty_tpl->tpl_vars['verificar_link']->value;?>
</small>
</p>

		                </td>
		            </tr>
		        </tbody>
		    </table>
		</td>
	</tr>
	<tr>
		<td align="center" style="text-align: center; padding-top: 20px; color:#fff;">
			
		</td>
    </tr>
</table>
<div style="clear:both;"></div>
</div>
<?php }} ?>
