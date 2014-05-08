<?php /* @var $this Controller */ 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/print.css" media="print" />
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

					<h1><a href="index.php"> <img src="<?php echo Yii::app() -> request -> baseUrl; ?>/images/logo.png" alt="INVERSIONES FRIOCLIN C.A"> </a></h1>
				</div>
				<div class="menu_block ">

					<nav class="horizontal-nav full-width horizontalNav-notprocessed">
						<ul class="sf-menu sf-js-enabled sf-arrows">
							<li <?php if($_SESSION['pag']=="index"){ ?> class='current'  <?php } ?> >
								<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/index">Home</a>
							</li>
							<li <?php if($_SESSION['pag']=="empresa"){ ?> class='current'  <?php } ?>>
								<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/empresa" class="sf-with-ul">Empresa</a>
							</li>
							<li <?php if($_SESSION['pag']=="servicios"){ ?> class='current'  <?php } ?>>
								<a href="servicios.php">Servicios</a>
							</li>
							<!-- <li><a href="noticias.html">Noticias</a></li> -->
							<li >
								<a href="contacto.php">Contacto</a>
							</li>
							<li>
								<a href="#" onclick="alert('Esta sección se encuentra en desarrollo para ofrecerle un mejor servicio')">Intranet</a>
							</li>
						</ul>
					</nav>

					<div class="clear"></div>

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
<?php if($pag="empresa") 
echo $_SESSION['pag'];?>
<?php
 if($pag="empresa"){
	echo $content; ?>
<?php }else{?>
<div class="bottom_block1">
    <div class="container_12">
<?php	echo $content; ?>
      </div>
</div>
	
<?php } ?>

 
 <!--==============================Footer=================================-->
<footer>
	<div class="container_12">
		<div class="grid_6 maxheight1" style="height: 259px;">
			<div class="box_inner">
				<h4></h4>

				<nav>
					<ul>
						<?php if(!Yii::app()->user->isGuest){?>
						<li>
							<a href="empresa.php">Usuarios</a>
						</li>
						<li>
							<a href="servicios.php">Clientes</a>
						</li>
						<li>
							<a href="servicios.php">Facturas</a>
						</li>
						<li>
							<a href="servicios.php">Proyectos</a>
						</li>
						<li>
							<a href="servicios.php">Productos</a>
						</li>
						<?php }else{ ?>
							<li class='current' >
							<a href="index.php">Home</a>
						</li>
						<li >
							<a  href="empresa.php">Empresa</a>
						</li>
						<li >
							<a  href="servicios.php">Servicios</a>
						</li>
						<!-- <li><a href="noticias.html">Noticias</a></li> -->
						<li >
							<a  href="contacto.php">Contacto</a>
						</li>
						<li>
								<a href="#" onclick="alert('Esta sección se encuentra en desarrollo para ofrecerle un mejor servicio')">Intranet</a>
						</li>
						<?php } ?>
					</ul>
				</nav>
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
</footer>

</body>	
</html>
