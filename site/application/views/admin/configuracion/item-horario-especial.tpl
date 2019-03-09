{if !$ha} <table style="display: none;" id="especial-layout" >{/if}
    <tr class="tr-especial" >
        <td><input type="hidden" class="horario_especial_id" name="horario_especial_id[]" value="{$ha->id}" /></td>
        <td>            
            <div class="input-group bootstrap-datetimepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input id="especial-inicio-{$ha->id}" name="fecha_desdeS[]" class="form-control datepicker fechaInicio" value="{if $ha}{$ha->fecha_desde|date_format:'d-m-Y'}{/if}" required class="required" type="text" style="z-index: 2 !important;">
            </div>
        </td>
        <td>
            <div class="input-group bootstrap-datetimepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input id="especial-fin-{$ha->id}" name="fecha_hastaS[]" class="form-control datepicker fechaFin" value="{if $ha}{$ha->fecha_hasta|date_format:'d-m-Y'}{/if}" required class="required" type="text" style="z-index: 2 !important;">
            </div>
        </td>
        <td>
            <div class="acctions text-right">
                <a href="#" class="btnEliminar btn btn-default"><i class="icon icon-trash"></i></a>
                <a href="{site_url()}admin/coiffeurs/administrar_horarios_especiales/{$ha->id}" class="btnEditar btn btn-default"><i class="icon icon-pencil"></i></a>
            </div>
        </td>
    </tr>
{if !$ha} </table>{/if}
