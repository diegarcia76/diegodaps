<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-19 12:36:11
         compiled from "C:\wamp\www\daps\diegodaps\site\application\views\admin\include\dialogs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:309955bc9f9ebf058d9-38074647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84e4ad16acc28ca478d0c93609d955a9d2a3cc59' => 
    array (
      0 => 'C:\\wamp\\www\\daps\\diegodaps\\site\\application\\views\\admin\\include\\dialogs.tpl',
      1 => 1538514863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '309955bc9f9ebf058d9-38074647',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bc9f9ebf0b906_82065963',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc9f9ebf0b906_82065963')) {function content_5bc9f9ebf0b906_82065963($_smarty_tpl) {?><div id="WebDialogs_alert" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-backdrop='static'>
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
