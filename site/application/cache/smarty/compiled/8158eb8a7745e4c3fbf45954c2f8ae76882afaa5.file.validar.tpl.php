<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-09 00:31:28
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\mails\validar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52765bbbdac08bcd85-08747508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8158eb8a7745e4c3fbf45954c2f8ae76882afaa5' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\mails\\validar.tpl',
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
  'nocache_hash' => '52765bbbdac08bcd85-08747508',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbbdac093ad04_53728028',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbbdac093ad04_53728028')) {function content_5bbbdac093ad04_53728028($_smarty_tpl) {?><div width="100%" height="100%" style="height: 100%; padding: 0; margin: 0; background: #180807;font-family: 'Helvetica', san-serif; text-align: center;">
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
		                
<h3 style="margin:0 auto; padding: 0 auto;">¡Gracias por Registrarte en Diego Dap's! :)</h3>
   <p>Nos queda solo un paso para que puedas usar nuestro sistema</p>
   <div style="margin-bottom:30px;"></div>
   <a href="<?php echo $_smarty_tpl->tpl_vars['verificar_link']->value;?>
" style="text-decoration: none; color:white; background: #ceac5b; padding: 10px 10px; border-radius: 100px; margin: 30px 0; height: 35px;">
       VERIFICA TU EMAIL
   </a>
   <p style="margin-top: 60px;">
	   <small>Si el link no abre correctamente, probá copiándolo y pegandolo en tu navegador.
	   <?php echo $_smarty_tpl->tpl_vars['verificar_link']->value;?>

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
