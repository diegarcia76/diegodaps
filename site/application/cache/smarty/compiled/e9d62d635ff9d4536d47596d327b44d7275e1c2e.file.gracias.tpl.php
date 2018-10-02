<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-18 11:33:34
         compiled from "/var/www/daps/site/application/views/mails/gracias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15901123675ad7573ec83da1-69948217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9d62d635ff9d4536d47596d327b44d7275e1c2e' => 
    array (
      0 => '/var/www/daps/site/application/views/mails/gracias.tpl',
      1 => 1524061883,
      2 => 'file',
    ),
    '58d6503fb43dd53fcdc761a04b3aea9b0eee786c' => 
    array (
      0 => '/var/www/daps/site/application/views/mails/base.tpl',
      1 => 1498751243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15901123675ad7573ec83da1-69948217',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ad7573ec97b69_46553182',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ad7573ec97b69_46553182')) {function content_5ad7573ec97b69_46553182($_smarty_tpl) {?><div width="100%" height="100%" style="height: 100%; padding: 0; margin: 0; background: #180807;font-family: 'Helvetica', san-serif; text-align: center;">
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
   <p>Gracias por dejas tu comentario y te esperamos nuevamente!</p>   
   <div style="margin-bottom:30px;"></div>
   <a href="<?php echo site_url();?>
turnos" style="text-decoration: none; color:white; background: #ceac5b; padding: 10px 10px; border-radius: 100px; margin: 30px 0; height: 35px;">
       VER MIS TURNOS
   </a>

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
