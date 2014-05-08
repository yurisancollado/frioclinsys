<?php /* @var $this Controller */ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/form.css" />
	<title><?php echo CHtml::encode($this -> pageTitle); ?></title>
</head>
<body class="page1" id="top">
 <!--==============================header=================================-->
<div class="bg1"> 
<header>
	<div>
		<div class="container_12">
			<div class="grid_12">
				<div class="links">

					<h1><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/index"> <img src="<?php echo Yii::app() -> request -> baseUrl; ?>/images/logo.png" alt="INVERSIONES FRIOCLIN C.A"> </a></h1>
				</div>
			
	<div id="mainmenu">
<?php #Menu General
		if(Yii::app()->user->isGuest){
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Empresa', 'url'=>array('/site/empresa')),
				array('label'=>'Servicios', 'url'=>array('/site/servicio')),
				array('label'=>'Contacto', 'url'=>array('/site/contacto')),
				array('label'=>'Login', 'url'=>array('/site/login')),
				
			),
		));			
		}
	# Menu Administrador
		else{

		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Usuarios', 'url'=>array('/usuario/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Clientes', 'url'=>array('/cliente/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Facturas', 'url'=>array('/facturas/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Proyectos', 'url'=>array('/proyecto/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Productos', 'url'=>array('/producto/admin'),'visible'=>!Yii::app()->user->isGuest),

				
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),

		));
		}
	# Menu Cliente
 ?>
	</div>		
			<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</header>
<div  style="height:45px; background-color:#FC6; text-align:center; vertical-align:middle;  padding-top:11px">
	<b style="font-size:18px;">FRIOCLIN.COM se encuentra en construcción. </b>
	<br/>
	Buscamos prestar el mejor servicio relacionado a la refrigeración, gracias por entendernos.
</div>

<br/>
</div>
 <!--==============================Contenido=================================-->

<?php
# Contenido para Invitado
 if(Yii::app()->user->isGuest){
	echo $content; ?>
<?php }else{
# Contenido para logueado	
?>
<div class="bottom_block1">
    <div class="container_12">
		<?php echo $content; ?>
    </div>
</div>
	
<?php } ?>

 
 <!--==============================Footer=================================-->
<footer>
	<div class="container_12">
		<div class="grid_6 maxheight1" style="height: 259px;">
			<div class="box_inner">
				<h4></h4>
			<div id="footermenu">
<?php
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Empresa', 'url'=>array('/site/empresa')),
				array('label'=>'Servicios', 'url'=>array('/site/servicio')),
				array('label'=>'Contacto', 'url'=>array('/site/contacto')),
				array('label'=>'Login', 'url'=>array('/site/login')),
				
			),
		));		 ?>	

			</div>
			</div>
		</div>
		<div class="grid_3 maxheight1 ver" style="height: 259px;">
			<div class="box_inner">
				<h4>Siguenos</h4>
				<div class="socials">
					<a href="#"></a>
					<a href="#"></a>
					<a href="#"></a>
				</div>
			</div>
		</div>
		<div class="grid_3 maxheight1 ver" style="height: 259px;">
			<div class="box_inner">
				<h4>copyright</h4>
				<div class="copy">
					<small>Frioclin.com</small>

					© <span id="copyright-year">2014</span> | <a href="">RIF: J-40378560-0</a><!--{%FOOTER_LINK} --><div></div>
				</div>
			</div>
		</div>
	</div>
</footer><!-- page -->

</body>
</html>
