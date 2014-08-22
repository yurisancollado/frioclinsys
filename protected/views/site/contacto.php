		<link href="css/bvalidator.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/jquery.bvalidator.js"></script>
		<script type="text/javascript" src="js/bvalidator.lang.esp.js"></script>
		<link rel="stylesheet" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/contacts.css">

	<body class="page1" id="top">
		<div class="bg1">
<!--==============================Content=================================-->
				<div class="content">
					<div class="container_12" style="text-align:left">
						<div class="grid_6">
			<h3 >Consiguenos</h3>
			<div class="map">
				<figure class=" ">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63251.32090753978!2d-72.22452879999996!3d7.767801449999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e666ca49582d39f%3A0xe35525b271c7ef85!2sSan+Crist%C3%B3bal!5e0!3m2!1ses!2sve!4v1396813206308" width="600" height="450" frameborder="0" style="border:0"></iframe>
				</figure>

				<address class="mb0">
					<dl>
						<dt>
							<strong>INVERSIONES FRIOCLIN C.A</strong>
							<br>
							 El valle, Municipio Independencia.
							<br>
							 Tachira.
						</dt>
						<dd>
							<span>Telefono 1:</span>+58 416 806 0084
						</dd>
						<dd>
							<span>Telefono 2:</span>+58 424 725 0057
						</dd>
						<dd>
							E-mail: <a href="#" class="col1 c1">info@frioclin.com</a>
						</dd>
					</dl>
				</address>
			</div>
		</div>
		<div class="grid_6">
			<h3>Escríbenos</h3>
			<form id="contact-form" action="sendmail.php" method="post">

				<div class="success_wrapper">
					<div class="success-message">
					</div>
				</div>
				<label class="name">
					<input type="text" placeholder="Nombre" data-bvalidator="alphanum,required" name="nombre">
					<!--<span class="empty-message">*This field is required.</span> <span class="error-message">*This is not a valid name.</span> <span class="_placeholder" style="left: 0px; top: 0px; width: 386px; height: 41px;">Nombre*:</span>
					--></label>
					<br />
				<label class="email">
					<input type="text" placeholder="Correo Electrónico" data-bvalidator="required,email" name="email">
					<!--<span class="empty-message">*This field is required.</span> <span class="error-message">*This is not a valid email.</span> <span class="_placeholder" style="left: 0px; top: 0px; width: 386px; height: 41px;">E-mail*:</span>
					--></label>
					<br />
				<label class="phone">
					<input type="text" placeholder="Teléfono"  data-bvalidator="number,required" name="tlf">
					<!--<span class="empty-message">*This field is required.</span> <span class="error-message">*This is not a valid phone.</span> <span class="_placeholder" style="left: 0px; top: 0px; width: 386px; height: 41px;">Telefono:</span>
					--></label>
					<br />
				<label class="message"> 					
				<textarea placeholder="Mensaje" data-bvalidator="rangelength[1:999],required" name="mens"></textarea> 
				<!--<span class="empty-message">*This field is required.</span> <span class="error-message">*The message is too short.</span> <span class="_placeholder" style="left: 0px; top: 0px; width: 428px; height: 139px;">Mensaje:</span>--></label>
				<div>
					<br />
					<div class="clear"></div>
					<div class="btns"><a href="#" data-type="submit" class="btn" onclick="alert('Gracias por comunicarse con nosotros, su correo será respondido a la brevedad posible.')">Enviar</a>
                      <a href="#" data-type="reset" class="btn">Borrar</a>
                      </div>
				</div>
			</form>
		</div>
					</div>
				</div>
		</div>
<script type="text/javascript">
    $('#form').bValidator({lang:'es'});
</script>