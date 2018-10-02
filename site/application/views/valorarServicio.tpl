{extends file='base/base.tpl'}

{block name='custom_css'}

<!--link rel="stylesheet" type="text/css" href="{site_url()}assets/common/plugins/gjunge.rateit/scripts/rateit.css"/-->

{/block}

{block name='custom_js'}
    <!--script type="text/javascript" src="{site_url()}assets/common/plugins/gjunge.rateit/scripts/jquery.rateit.js"></script-->
    <script src="{site_url()}assets/js/registro.js"></script>

    <script type="text/javascript">
        $(function(){
            Registro.initValoracion();
        });
    </script>

{/block}

{block name='custom_init'}
{/block}

{block name='body_classes'}class="login valorar"{/block}

{block name='header-container'}
{/block}


{block name='content'}

<div class="row" id="valoracion_servicio">
 <div class="col-md-12">
   <div class="logo text-center" style="margin-bottom: -65px; z-index: 1; position: relative;">
     <a href="{site_url()}"><img src="{site_url()}assets/images/isologo_4.svg" width="230" height="auto"/></a>
   </div>
 </div>

  <div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default p-t-3" style="border: 4px solid #be9e54;">

          <div class="panel-body dejar-valoracion">
            <h5 class="title">y vos... ¿qué opinas?</h5>
            <h5 class="title">Servicio {$servicio}</h5>
              <h5> 
                  <!--span class="badge puntuacion_sitio">0.0</span>
                  <div class="rateit" id="rate_service"></div-->
                  <select id="puntuacion_sitio" class="form-control">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                  </select>
              </h5>
              <div class="row">
                  <div class="col-md-12">
                      <textarea type="text" class="form-control" rows="3" id="comentario_sitio" placeholder="Escribinos tu opinion sobre el servicio de Diego Dap's"></textarea>
                          <!--input type="hidden" id="puntuacion_sitio" value="0"-->
                          <input type="hidden" id="turnoid" value="{$turnoid}">

                          <button class="btn btn-default btn-verde bt-add-comen margin-top-15" type="button">Enviar</button>

                  </div>
              </div>
          </div>

  </div>
  </div>
</div>




<!--<div class="background">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-1 margin-top-40 bkg-white padding-30 animated bounceInRight login-box">
        <h2>¿Olvidaste tu clave?</h2>
        <h4>Ingresá tu correo electrónico</h4>
        <form action="{site_url()}registro/olvidopass" method="post" id='form_forgot' >
          <div class="form-group">
            <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-lock outline"></i>
              <input type="text" class="form-control" name="email" id="email" placeholder="Email" />
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-verde btn-block btn-lg">Recuperar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>-->

<!-- MODAL PASS -->
<div class="modal fade modal-verde modal-viaturno" id="modal-olvido-pass">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span></button>
      <div class="text-center">
        <h1 class="modal-title color-verde">Recuperar Contraseña</h1>
        <p>Te hemos enviado un mail a tu correo electrónico para recuperar tu contraseña.</p>
        <div class="form-group text-danger wpr-error-message hidden">
          <ul class="fa-ul">
            <li><i class="fa fa-li fa-exclamation"></i> <span class="error-message"></span></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade modal-verde modal-viaturno" id="modal-olvido-pass-error">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span></button>
      <div class="text-center">
        <h1 class="modal-title">Recuperar Contraseña</h1>
        <p>El correo no existe en nuestra base de datos.</p>
        <div class="form-group text-danger wpr-error-message hidden">
          <ul class="fa-ul">
            <li><i class="fa fa-li fa-exclamation"></i> <span class="error-message"></span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

<!-- /.modal -->

{/block}
