<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-21 12:14:40
         compiled from "/var/www/daps/site/application/views/admin/include/dialogs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21272109385829a98f6abf93-02373263%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6ad02cf7a10dd3d951aa718317090b278e411ca' => 
    array (
      0 => '/var/www/daps/site/application/views/admin/include/dialogs.tpl',
      1 => 1519219732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21272109385829a98f6abf93-02373263',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5829a98f6aec52_44151318',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5829a98f6aec52_44151318')) {function content_5829a98f6aec52_44151318($_smarty_tpl) {?><div id="WebDialogs_alert" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-backdrop='static'>
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


<div id="WebDialogsCli_alert" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-backdrop='static'>
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


<div id="WebDialogs_alertError" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-backdrop='static'>
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


<div id="WebDialogs_confirm" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-backdrop='static'>

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



<div id="WebDialogs_loading" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-backdrop='static'>

    <div class="modal-dialog">
        <div class="modal-content modal-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4>Aguarde por favor...</h4>
            </div>
            <div class="modal-body">
              <p>Estamos procesando...</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="WebDialogs_confirmSecond" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-backdrop='static'>

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


</div><?php }} ?>
