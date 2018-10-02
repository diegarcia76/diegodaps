<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-26 18:23:54
         compiled from "/var/www/daps/site/application/views/mails/olvido.tpl" */ ?>
<?php /*%%SmartyHeaderCode:920052543587cee559952d0-43227280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31f09ea7678719d25de737676db7de12763550cf' => 
    array (
      0 => '/var/www/daps/site/application/views/mails/olvido.tpl',
      1 => 1484925499,
      2 => 'file',
    ),
    '58d6503fb43dd53fcdc761a04b3aea9b0eee786c' => 
    array (
      0 => '/var/www/daps/site/application/views/mails/base.tpl',
      1 => 1484925499,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '920052543587cee559952d0-43227280',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_587cee559ae3e0_03325570',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587cee559ae3e0_03325570')) {function content_587cee559ae3e0_03325570($_smarty_tpl) {?><div width="100%" height="100%" style="height: 100%; padding: 0; margin: 0; background: #180807;font-family: 'Helvetica', san-serif; text-align: center;">
<table align="center" style="padding:0; margin: 0 auto 60px;">
	<tr>
    	<td align="center" style="padding: 30px 0">
        	<img src="<?php echo site_url();?>
assets/images/isologo-rectangulo_2_1.svg" alt="logo Dap's" width="160" height="auto" />
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
		                
<h3 style="margin: 0 0 30px; padding: 0;">¡Parece que olvidaste tu clave de Diego Dap's!</h3>

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
			Diego Daps &copy;2016 - diegodaps.com
		</td>
    </tr>
</table>
<div style="clear:both;"></div>
</div>



<?php }} ?>
