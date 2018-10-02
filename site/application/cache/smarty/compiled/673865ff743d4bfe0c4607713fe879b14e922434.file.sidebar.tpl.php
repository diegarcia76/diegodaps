<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-01 08:50:02
         compiled from "/var/www/daps/site/application/views/themes/default/include/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2118442605818816ad13f13-49659137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '673865ff743d4bfe0c4607713fe879b14e922434' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/include/sidebar.tpl',
      1 => 1478000989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2118442605818816ad13f13-49659137',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'editionInSidebar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5818816ad1b788_68714007',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5818816ad1b788_68714007')) {function content_5818816ad1b788_68714007($_smarty_tpl) {?><div id="sidebar" class="hidden-md col-lg-3 p-t-1 text-center">
    
    <div class="group" style="position: relative;">
        <div class="perfil"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGsXLpmPkw1S6R16JzcigXin8sesOBhp45oA3xS5MRUk0QoM_1cQ" alt="..." width="180" height="180" class="img-circle"></div>
		<?php if ($_smarty_tpl->tpl_vars['editionInSidebar']->value==true) {?>
        <a href="#" class="btn-circle btn bg-primary edit-image">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </a>
        <?php } else { ?>
        <h4 class="m-b-0">¡Hola Rocio!</h4>
        <p class="p-b-0 m-b-0">¿Qué te querés hacer hoy?</p>
        <?php }?>
    </div>
    <div class="group">
        <h6 class="text-primary">PUNTOS ACUMULADOS</h6>

        <div class="lead text-primary points">
            <strong>50</strong>
        </div><a href="" class="btn btn-primary btn-sm m-t-0">CANJEALOS</a>
    </div>
    <div class="group">
    	<a href="" class="btn btn-warning">+ NUEVO TURNO</a>
    </div>
</div>
<?php }} ?>
