<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-29 10:47:49
         compiled from "/var/www/daps/site/application/views/themes/default/include/dialogs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176963531057ed1b8517d382-93047860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '778861421a9afe737cb134d4c8dc68bb652e85b3' => 
    array (
      0 => '/var/www/daps/site/application/views/themes/default/include/dialogs.tpl',
      1 => 1475100779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176963531057ed1b8517d382-93047860',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ed1b85195200_15365549',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ed1b85195200_15365549')) {function content_57ed1b85195200_15365549($_smarty_tpl) {?><div id="WebDialogs_alert" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="red">Modal Header</h4>
            </div>
            <div class="modal-body">
	            <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
              	<button class="btn btn-success btn-aceptar" data-dismiss="modal"><i class="fa fa-ok"></i> Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="WebDialogsCli_alert" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="red">Modal Header</h4>
   </div>
   <div class="modal-body">
      <p>Body goes here...</p>
   </div>
   <div class="modal-footer">
      <button class="btn btn-success btn-aceptar aceptar" id="aceptar" data-dismiss="modal" aria-hidden="true"><i class="fa fa-ok"></i> Aceptar</button>
   </div>
</div>


<div id="WebDialogs_alertError" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-danger text-danger">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4><i class="fa fa-warning"></i> <span>Modal Header</span></h4>
            </div>
            <div class="modal-body">
	            <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
              	<button class="btn btn-warning btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-exclamation-circle"></i> Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="WebDialogs_confirm" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content modal-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4>Modal Header</h4>
            </div>
            <div class="modal-body">
	            <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
              	<button class="btn btn-default btn-cancelar" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
              	<button class="btn btn-success green btn-confirm"><i class="fa fa-check"></i> Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->


</div>


<?php }} ?>
