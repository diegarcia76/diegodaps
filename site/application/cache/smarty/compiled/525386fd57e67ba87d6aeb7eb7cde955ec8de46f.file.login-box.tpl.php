<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-02 10:52:40
         compiled from "/var/www/daps/site/application/views/themes/default/include/login-box.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10209798075819efa8cf7338-34017410%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '525386fd57e67ba87d6aeb7eb7cde955ec8de46f' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/include/login-box.tpl',
      1 => 1465834004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10209798075819efa8cf7338-34017410',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'validado' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5819efa8d0ab83_65087083',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5819efa8d0ab83_65087083')) {function content_5819efa8d0ab83_65087083($_smarty_tpl) {?><div class="login-box">
	<div class="inner">
    	<form action="<?php echo site_url();?>
registro/checklogin" method="post" id="frmLogin" class="frmLogin">
        	<h2>Iniciar sesión</h2>
            <?php if ($_smarty_tpl->tpl_vars['validado']->value==1) {?>
            <H5>Tus Datos ya fueron Validados</H5>
            <?php }?>
			<div class="form-group">
                <div class="inner-addon left-addon">
                    <i class="glyphicon glyphicon-user outline"></i>
                    <input type="text" class="form-control" name="username" placeholder="Email" />
                </div>
            </div>    

			<div class="form-group">
                <div class="inner-addon left-addon">
                    <i class="glyphicon glyphicon-lock outline"></i>
                    <input type="password" class="form-control" name="pass" placeholder="Contraseña" />
                </div>
            </div>    
            
			<div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1" name="recordar">
                    Recordar mis datos
                  </label>
                </div>
            </div>

			<div class="form-group">
				<button type="submit" class="btn btn-lg btn-block btn-verde">Ingresar</button>
            </div>
            
            <div class="text-right">
            	<a class="pull-left" href="<?php echo site_url();?>
registro/olvidopass">Olvidé mi clave</a><a class="pull-right" href="<?php echo site_url();?>
registro">REGISTRARME</a>
            </div>
        </form>
    </div>
</div><?php }} ?>
