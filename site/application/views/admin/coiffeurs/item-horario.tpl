{if !$ha} <table style="display: none;" id="diapositiva-layout" >{/if}
    <tr class="admin-imagen-carrusel" >
        <td>
            <select class="form-control" id="premio-dia-{$ha->id}" name="dia[]">
                {foreach $dias as $dia}
                    <option value="{$dia->id}" {if $dia->id eq $ha->diaSemana->id} selected {/if}>{$dia->nombre}</option>
                {/foreach}
            </select>
        </td>
        <td>

            <div class="input-group bootstrap-timepicker timepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                <!--input id="premio-titulo-{$ha->id}" name="horaDesde[]" class="form-control timepicker" value="{if $ha}{$ha->horaDesde->format('H:i A')}{/if}" required class="required" type="text"-->
                <input id="premio-titulo-{$ha->id}" name="horaDesde[]" class="form-control timepicker" value="{if $ha}{$ha->horaDesde|date_format:'H:i'}{/if}" required class="required" type="text">
            </div>
        </td>
        <td>
            <div class="input-group bootstrap-timepicker timepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                <input id="premio-description-{$ha->id}" name="horaHasta[]" class="form-control timepicker" value="{if $ha}{$ha->horaHasta|date_format:'H:i'}{/if}" required class="required" type="text">
            </div>
        </td>

        <td>
            <div class="acctions text-right">
                <a href="#" class="btnEliminar btn btn-default"><i class="icon icon-trash"></i></a>
                <a href="#" class="btnAgregar btn btn-default"><i class="icon icon-plus"></i></a>
            </div>
        </td>
    </tr>
{if !$ha} </table>{/if}
