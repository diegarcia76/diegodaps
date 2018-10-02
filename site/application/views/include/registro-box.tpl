<div class="login-box">
	<div class="inner text-center">
    	<form action="{site_url()}registro/registrar" method="post" id="frmRegistro" class="frmRegistro">
        	<h3>¡Creá tu cuenta gratis!</h3>
			<hr/>
			<a href="{$facebool_login_url}" class="btn btn-face btn-block ">REGISTRATE CON FACEBOOK</a>
			<hr/>

            <h5 class="text-left">O ingresá tus datos</h5>
			<div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="text" class="form-control" name="nombre" placeholder="NOMBRE" required="required" />
                </div>
            </div>
            <div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="email" class="form-control" name="email" placeholder="EMAIL" required="required" />
                </div>
            </div>
            <div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="text" class="form-control" name="telefono" placeholder="TELEFONO" required="required" />
                </div>
            </div>
            <div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="text" class="form-control" data-mask="99-99-9999" name="fecha_nacimiento" placeholder="FECHA DE NACIMIENTO" >
                </div>
            </div>
      		<div class="form-group">
               	<select class="form-control" name="sexo">
				  <option value="0">Hombre</option>
				  <option value="1">Mujer</option>
				  <option value="2">No quiero decirte</option>
				</select>
            </div>
            <div class="form-group">
                <div class="inner-addon left-addon">
                    <select class="form-control" name="profesion" id="profesion">
                        <option value="">Selecciones Profesión</option>
                        {if $profesiones}
                            {foreach $profesiones as $sub}
                                <option value="{$sub->id}">{$sub->nombre} </option>
                            {/foreach}
                        {/if}
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="password" class="form-control " placeholder="CONTRASEÃ‘A" name="password" id="password" required="required">
                </div>
            </div>

            <div class="form-group">
                <div class="inner-addon left-addon">
                    <input type="password" class="form-control " placeholder="REPETIR CONTRASEÃ‘A" name="password2" id="password2" required="required">
                </div>
            </div>

			<div class="form-group">
				<button type="submit" class="btn btn-block btn-primary">Registrarme</button>
            </div>

            <!--<div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1" name="recordar">
                     Recordar mis datos
                  </label>
                </div>
            </div>-->
        </form>
    </div>
</div>
