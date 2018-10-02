<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-26 18:36:51
         compiled from "/var/www/daps/site/application/views/include/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2848165545819fcfa14e314-73851236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87dcd4b6d28188883fe24b1e52276240d4045b15' => 
    array (
      0 => '/var/www/daps/site/application/views/include/sidebar.tpl',
      1 => 1493242609,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2848165545819fcfa14e314-73851236',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5819fcfa155c24_57650083',
  'variables' => 
  array (
    'usuarioActual' => 0,
    'editionInSidebar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5819fcfa155c24_57650083')) {function content_5819fcfa155c24_57650083($_smarty_tpl) {?><div id="sidebar" class="hidden-md col-lg-3 p-t-1 text-center">
    
    <div class="group" style="position: relative;">
        <div class="perfil">
	        <div class="image">
	            <div class="bg-cover" name="imageThumb" id="imageThumb" style="background-image: url(<?php echo \Managers\ImagenManager::getInstance()->getUrl($_smarty_tpl->tpl_vars['usuarioActual']->value->foto,'');?>
)">

	            </div>
	        </div>
        </div>
		<?php if ($_smarty_tpl->tpl_vars['editionInSidebar']->value==true) {?>
            <form method="post" action="<?php echo site_url();?>
profile/guardar_imagen" enctype="multipart/form-data" id="frmSaveImagenPerfil">
                <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['usuarioActual']->value->id;?>
">
                <input type="file" id="upload" name="upload" style="visibility: hidden; width: 1px; height: 1px"/>
                <a href="#" onclick="document.getElementById('upload').click(); return false" class="btn-circle btn bg-primary edit-image">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            </form>
        <?php } else { ?>
        <h4 class="m-b-0">¡Hola <?php echo $_smarty_tpl->tpl_vars['usuarioActual']->value->nombre;?>
!</h4>
        <p class="p-b-0 m-b-0">¿Qué te gustaría hacerte hoy?</p>
        <?php }?>
    </div>
    <div class="group">
        <h6 class="text-primary">PUNTOS ACUMULADOS</h6>

        <div class="lead text-primary points">
            <strong><?php if ($_smarty_tpl->tpl_vars['usuarioActual']->value->puntos_acumulados>0) {
echo $_smarty_tpl->tpl_vars['usuarioActual']->value->puntos_acumulados;
} else { ?>0<?php }?></strong>
        </div><?php if ($_smarty_tpl->tpl_vars['usuarioActual']->value->puntos_acumulados>0) {?><a href="<?php echo site_url();?>
turnos/nuevo_turno/true" class="btn btn-primary btn-sm m-t-0">CANJEALOS</a><?php }?>
    </div>
    <div class="group">
    	<a href="<?php echo site_url();?>
turnos/nuevo_turno" class="btn btn-warning">+ NUEVO TURNO</a>
    </div>
</div>
<?php }} ?>
