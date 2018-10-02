{* Extend our master template *}
{extends file="admin/base/base_login.tpl"}
{block name='custom_js'}
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/localization/messages_es.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery-validation/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/jquery.form.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript" src="{site_url()}assets/common/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

    <script type="text/javascript" src="{site_url()}assets/common/plugins/spinner.min.js"></script>

    <script type="text/javascript" src="{site_url()}assets/admin/js/configuracion.js"></script>

    <script type="text/javascript">
        $(function(){
            Configuracion.initForm();

        });
    </script>

{/block}

{block name='custom_css'}
    <link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
    <link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css"/>

    <style type="text/css">
        #tblHorariosEspeciales tr.ui-sortable-placeholder{
            height: 40px;
            background: #f5f5f5;
            border: 2px dashed #999;
        }

        #tblHorariosEspeciales tr.ui-sortable-helper{
            height: 40px;
            background: #f5f5f5;
            border: 1px dashed #f0f0f0;
        }

        input.timepicker{
            width: 100px !important;
        }

        .input-group-addon{
            width: 0% !important;
        }

    </style>
{/block}

{block name='content'}
<div class="row">
    <div class="col-md-10">
                            <!--<div class="portlet light">-->
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-pencil font-green-sharp"></i>
                                            <span class="caption-subject font-green-sharp bold uppercase">Configuración</span>
                                        </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <form action="{site_url()}admin/configuracion/save" id="frmSaveConfiguracion" method="post">
                                            <input type="hidden" name="user_id" value="{$editUser->id}" />
                                            <div class="form-body">

                                                <div class="form-group">
                                                    <label class="control-label">% de Descuento en Efectivo</label>
                                                        <input type="text" class="form-control" name="descuento_efectivo" placeholder="% de Descuento en Efectivo" value="{$editUser->descuento_efectivo}" required="required">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">% de Comisión de Productos</label>
                                                        <input type="text" class="form-control" name="comision_productos" placeholder="% de Comisión de Productos" value="{$editUser->comision_productos}" required="required">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">% de Descuento en Efectivo para Productos</label>
                                                        <input type="text" class="form-control" name="descuento_efectivo_productos" placeholder="% de Descuento en Efectivo para Productos" value="{$editUser->descuento_efectivo_productos}" required="required">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Cantidad de minutos que con anterioridad se puede cancelar un turno </label>
                                                        <input type="text" class="form-control" name="cancelar_antes" placeholder="Cantidad de minutos que con anterioridad se puede cancelar un turno" value="{$editUser->cancelar_antes}" required="required">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Cantidad de Días que permanecerá bloqueado el usuario por ausencia de turno</label>
                                                        <input type="text" class="form-control" name="dias_bloqueado" placeholder="Cantidad de Días que permanecerá bloqueado el usuario por ausencia de turno" value="{$editUser->dias_bloqueado}" required="required">
                                                </div>

                                                <div class="form-group row">
                                                        <div class="col-md-3">
                                                            <label class="control-label"><strong>Horarios Especiales</strong></label>
                                                            <div class="alert alert-info">
                                                                Aquí puedes cargar los horarios especiales para un rango de fechas. Es necesario que cargues primero los datos de las fechas de inicio y de fin del horario especial y luego asignes para cada coiffeur el horario de trabajo para cada día. Este horario remplaza el horario habitual del coiffeur.<br/>
                                                                Es necesario que se carguen los horarios para todos los días de trabajo, un día no cargado, significa un día que no se trabaja.
                                                            </div>                                                        
                                                        </div>
                                                        
                                                        <div class="col-md-9">



                                                            <table id="tblHorariosEspeciales" class="table table-stripped table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th width="5%"></th>
                                                                    <th>Fecha Desde</th>
                                                                    <th>Fecha Hasta</th>    
                                                                    <th width="25%">Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="wpr-especial-body">
                                                                {foreach $aHorariosEspeciales as $ha}
                                                                    {include file='admin/configuracion/item-horario-especial.tpl'}
                                                                {/foreach}
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td class="text-right" colspan="6">
                                                                        <div class="text-right">
                                                                            <a href="#" class="btn green btnAddEspecial pull-left"><i class="icon-plus"></i> Agregar Horario Especial</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                            </table>

                                                        </div>                                                
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn green btn-lg">Guardar</button>
                                                <a href="{site_url()}admin/configuracion" class="btn btn-link btn-lg pull-right">Cancelar</a>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
<!--</div>-->
</div>

{assign var=ha value=false}
    {include file='admin/configuracion/item-horario-especial.tpl'}

{/block}

