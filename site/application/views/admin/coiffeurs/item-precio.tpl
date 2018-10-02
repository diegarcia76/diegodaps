{if !$ha} <table style="display: none;" id="diapositiva-layout" >{/if}
    <tr class="admin-imagen-carrusel" >
        <td>
            <select class="form-control servicio" id="premio-dia-{$ha->id}" name="servicio[]">
                {foreach $servicios as $serv}
                    <option value="{$serv->id}" {if $serv->id eq $ha->servicio->id} selected {/if} data-precio-efectivo-default="{$serv->precio_efectivo_default}" data-precio-default="{$serv->precio_default}" data-comision-default="{$serv->comision_default}" >{$serv->nombre}</option>
                {/foreach}
            </select>
        </td>
        <td>

            <div class="input-group">
            	<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input id="premio-titulo-{$ha->id}" name="precio[]" class="form-control precio required" required value="{if $ha}{$ha->precio}{/if}" type="text">
            </div>
        </td>
        <td>

            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input id="premio-precio-efectivo-{$ha->id}" name="precio_efectivo[]" class="form-control precio_efectivo required" required value="{if $ha}{$ha->precio_efectivo}{/if}" type="text">
            </div>
        </td>
        <td>
            <div class="input-group">
            	<span class="input-group-addon"><i class="fa fa-percent"></i></span>
                <input id="premio-description-{$ha->id}" name="comision[]" class="form-control comision required" required value="{if $ha}{$ha->comision}{/if}" type="text">
            </div>
        </td>
        <td>
            <div class="input-group">
                {if !$ha->especial}
                    <input type="hidden" name="especial[]" value="0" />
                {/if}
                <input id="premio-especial-{$ha->id}" name="especial[]" class="form-control checks" value="1" {if $ha->especial} checked="checked" {/if} type="checkbox">
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