<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-05 17:52:54
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\mails\valorar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200055bb788d631c0d1-87831929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e99e2284a4eed6fcaa352e3b15f4d6a88bf0835f' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\mails\\valorar.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
    '65bcfaa04bf285a651e6fc1269014666baf968a7' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\mails\\base.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200055bb788d631c0d1-87831929',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb788d63d1e96_42983293',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb788d63d1e96_42983293')) {function content_5bb788d63d1e96_42983293($_smarty_tpl) {?><div width="100%" height="100%" style="height: 100%; padding: 0; margin: 0; background: #180807;font-family: 'Helvetica', san-serif; text-align: center;">
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
