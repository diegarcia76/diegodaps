<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-11-15 10:11:10
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\mails\nuevoUsuario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:236045bed706eed70d5-34801983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '209134f4afe2d86b254a969d90b4ce8b86ded4ff' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\mails\\nuevoUsuario.tpl',
      1 => 1539037502,
      2 => 'file',
    ),
    '65bcfaa04bf285a651e6fc1269014666baf968a7' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\mails\\base.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236045bed706eed70d5-34801983',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bed706f1245e5_67979263',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bed706f1245e5_67979263')) {function content_5bed706f1245e5_67979263($_smarty_tpl) {?><div width="100%" height="100%" style="height: 100%; padding: 0; margin: 0; background: #180807;font-family: 'Helvetica', san-serif; text-align: center;">
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
<p><strong>Gracias por eleginornos.</strong></p>
<p>A partir de ahora vas a poder usar nuestra app o usar nuestro sistema web para sacar turnos, valorar los servicios y muchas cosas más.</p>

<p>
	<small>Puedes descargar la plaicacion desde app store o google play o ingresar a nuestra web.</small>
</p>
<p>
	<small>Tu usuario es tu mail y tu contraseña es: 12345 (Lo podés cambiar cuando quieras)</small>
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
