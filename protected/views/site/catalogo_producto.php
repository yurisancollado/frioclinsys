<?php $producto = Producto::model() -> findByPk($id);
$marcaProducto =Marca::model()->findByPk($producto->Marca_id);
$imagenPrincipal=NULL;
foreach ($producto->imagenprincipal as $imagen) {
	$imagenPrincipal = $imagen;
}

?>

<link rel="stylesheet" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/catalogo.css" type="text/css" />
<body class="page1" id="top">
	<div class="bg1">

		<!--==============================Content=================================-->

		<div class="bottom_block1">
			<div class="container_12">
				<!--==============================INICO=================================-->
				<div class="wrapp">

					<table border="0" cellspacing="0" cellpadding="0" width="100%" id="contentMainWrapper">
						<tbody>
							<tr>
								<td id="column-left" style="width:220px;">
								<div style="width:220px;">

									<div class="box-categoria" id="categories" style="width:220px;">
										<div class="box-head">
											Marca
										</div>
										<div class="box-body">
											<div id="categoriesContent" class="sideBoxContent">
												
												<ul>
													<?php 	foreach(Marca::model()->findAll(array('order'=>'Nombre')) as $marca){?>
													<li class="category-top_un">
														<span class="top-span"><a class="category-top_un" href="../catalogo/id/<?php echo $marca->id; ?>"><?php echo $marca -> Nombre; ?></a></span>
													</li>
												<?php 	} ?>
												</ul>
											</div>
										</div>
									</div>

								</div></td>
								
								<td id="column-center" valign="top">
						
								<div class="column-center-padding">

									<div class="centerColumn" id="indexDefault">

										<div id="indexDefaultMainContent"></div>

										<div class="centerBoxWrapper" id="featuredProducts">
											<div class="centerBoxHeading"> <?php echo $marcaProducto -> Nombre; ?></div>
						<!--==============================Comienza Producto=================================-->	
<div class="tie">
	<div class="tie-indent">
	

<div class="page-content">

<div class="wrapper">



<div id="productMainImage" class="centeredContent back">
<?php if(!is_null($imagenPrincipal)){ ?>
	<span class="image"><img src="<?php echo Yii::app() -> request -> baseUrl . '/' .$imagenPrincipal -> direccion; ?>" alt="" title="" width="204" height="126"></span>
<?php }else{?>
	<span class="image"><img src="http://placehold.it/204x126" alt="" title="" width="204" height="126"></span>
<?php } ?>

	
	
</div>
	<div class="name-type bot-border"><?php echo $producto -> nombre; ?></div>	
	<ul>
	 <li><strong>Modelo: </strong>: <?php echo $producto -> modelo; ?></li>
	  <li> <?php echo $producto -> tipo->nombre; ?></li>
	</ul>
</div>
<br class="clearBoth">
<div id="productDescription" class="description biggerText"><?php echo $producto -> especificacion; ?></div>
<br class="clearBoth">
<div>
	<?php foreach($producto->imagenes as $imagen){
?>
<img src="<?php echo Yii::app() -> request -> baseUrl . '/' .$imagen -> direccion; ?>" alt="" title="" width="100" height="100">
<?php } ?>	
</div>




</div>

</div>
</div>


							<!--==============================Fin Producto=================================-->				
											<br class="clearBoth">
										</div>

									</div>
									<div class="clear"></div>

								</div>

								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<!--==============================Fin=================================-->
			</div>
		</div>
	</div>

	<div class="clear"></div>
	</div>
