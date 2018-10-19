<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-09 00:28:17
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\mails\olvido.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102165bbbda01d6f592-54917493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5cbc6318d7c526d111097c95d1d00f4f5b43632' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\mails\\olvido.tpl',
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
  'nocache_hash' => '102165bbbda01d6f592-54917493',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbbda01de4e16_40054203',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbbda01de4e16_40054203')) {function content_5bbbda01de4e16_40054203($_smarty_tpl) {?><div width="100%" height="100%" style="height: 100%; padding: 0; margin: 0; background: #180807;font-family: 'Helvetica', san-serif; text-align: center;">
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
		                
<h3 style="margin: 0 0 30px; padding: 0;">¡Parece que olvidaste tu clave de Diego Dap's! :O</h3>

	<a href="<?php echo $_smarty_tpl->tpl_vars['verificar_link']->value;?>
" style="text-decoration: none; color:white; background: #ceac5b; padding: 10px 10px; border-radius: 100px; margin: 30px 0;">
       RECUPERALA YA MISMO
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
