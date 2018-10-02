<div id="modal-agregar-comentario" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-comentario-label" aria-hidden="true" data-backdrop='static'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Agregar Comentario a Pago</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="turno_id_modal" id="turno_id_modal">
                <div class="form-group">
                    <label class="control-label">Comentario</label>
                    <textarea class="form-control" name="comentario" id="comentario" required="required"></textarea>
                </div>

            </div>
            <div class="modal-footer">
              	<button class="btn btn-default btn-cancelar" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
              	<button type="button" class="btn btn-success btn-aceptar-comentario"><i class="fa fa-check"></i> Terminar Servicio</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->