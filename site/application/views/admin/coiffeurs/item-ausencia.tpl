{if !$ha} <table style="display: none;" id="ausencia-layout" >{/if}
    <tr class="tr-ausencia" >
        <td>
            <div class="input-group bootstrap-datetimepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input id="ausencia-inicio-{$ha->id}" name="fecha_inicio[]" class="form-control datepicker" value="{if $ha}{$ha->fecha_inicio|date_format:'Y-m-d'}{/if}" required class="required" type="text" style="z-index: 2 !important;">
            </div>
        </td>
        <td>
            <div class="input-group bootstrap-datetimepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input id="ausencia-fin-{$ha->id}" name="fecha_fin[]" class="form-control datepicker" value="{if $ha}{$ha->fecha_fin|date_format:'Y-m-d'}{/if}" required class="required" type="text" style="z-index: 2 !important;">
            </div>
        </td>
        <td>
            <input type="text" class="form-control" name="motivo[]" value="{if $ha}{$ha->motivo}{/if}" />
        </td>

        <td>
            <div class="acctions text-right">
                <a href="#" class="btnEliminar btn btn-default"><i class="icon icon-trash"></i></a>
                <a href="#" class="btnAgregar btn btn-default"><i class="icon icon-plus"></i></a>
            </div>
        </td>
    </tr>
{if !$ha} </table>{/if}
