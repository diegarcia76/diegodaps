<div class="login-box">
	<div class="inner text-center">
    	<form action="{site_url()}registro/checklogin" method="post" id="frmLogin" class="frmLogin">
        	<h3>¡Hola! ¿Cómo estás?</h3>
			<hr/>
			<a href="{$facebool_login_url}" class="btn btn-face btn-block ">INGRESA CON FACEBOOK</a>
			<hr/>
            {if $validado eq 1}
            <H5>Tus Datos ya fueron Validados</H5>
            {/if}

            <h5 class="text-left">O ingresá tus datos</h5>
			<div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="text" class="form-control" name="username" placeholder="EMAIL" />
                </div>
            </div>

			<div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="password" class="form-control" name="pass" placeholder="CLAVE" />
                </div>
            </div>

			<div class="form-group">
				<button type="submit" class="btn btn-block btn-primary">Ingresar</button>
            </div>

            <!--<div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1" name="recordar">
                     Recordar mis datos
                  </label>
                </div>
            </div>-->
            	<a class="text-center" href="{site_url()}registro/olvidopass">No me acuerdo mi clave</a><!--<a class="pull-right" href="{site_url()}registro">REGISTRARME</a>-->
        </form>
    </div>
</div>