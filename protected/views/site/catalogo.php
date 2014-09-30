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
													<?php 
													$c_id=0;
													foreach(Marca::model()->findAll(array('order'=>'Nombre')) as $marca){
														$c_id++;?>
													<li class="category-top_un">
														<span class="top-span"><a class="category-top_un" href="#" onclick="show('<?php echo $marca -> id; ?>')" id="m<?php echo $marca -> id; ?>"><?php echo $marca -> Nombre; ?></a></span>
													</li>
												<?php 	} ?>
												</ul>
											</div>
										</div>
									</div>

								</div></td>
								
								<td id="column-center" valign="top">
								<?php 
								$c_id=0;
									foreach(Marca::model()->findAll(array('order'=>'Nombre')) as $marca){
									$c_id++;
									?>
<!--==============================Comienza MARCA=================================-->										
<div class="marcas all" id="c<?php echo $marca -> id; ?>">								
<div class="column-center-padding">

									<div class="centerColumn" id="indexDefault">

										<div id="indexDefaultMainContent"></div>

										<div class="centerBoxWrapper" id="featuredProducts">
											<div class="centerBoxHeading" > <?php echo $marca -> Nombre; ?></div>
						<!--==============================Comienza Producto=================================-->	
						<?php
						
						 $cont=0; 
						 
							$productos=Producto::model()->findAllByAttributes(array('Marca_id'=>$marca->id),array('order'=>'nombre'));
							foreach($productos as $producto){
								$productoCliente=ClienteHasProductos::model()->findByAttributes(array('Cliente_id'=>Yii::app() -> user -> id, 'Productos_id'=>$producto->id));	
								if($productoCliente!=NULL){
								$cont++;
$imagenPrincipal=NULL;
        foreach($producto->imagenprincipal as $imagen){
         $imagenPrincipal=$imagen;
        }
								
								
									
								?>					
											<div class="centerBoxContentsFeatured centeredContent back" style="width:33%;">
												<div class="product-col" style="margin-left:9px;" >
													<div class="img">
											<?php	if(!is_null($imagenPrincipal)){ ?>
														<a href="<?php echo Yii::app() -> request -> baseUrl . '/site/detalle/' . $producto -> id; ?>"><img src="<?php echo Yii::app() -> request -> baseUrl . '/' . $imagenPrincipal -> direccion; ?>" alt="" title="" width="204" height="126"></a>
											<?php } else{ ?>
													<a href="<?php echo Yii::app() -> request -> baseUrl . '/site/detalle/' . $producto -> id; ?>"><img src="http://placehold.it/204x126" alt="" title="" width="204" height="126"/></a>	
											<?php } ?>	</div>
													<div class="prod-info">
														<a class="name" href="<?php echo Yii::app() -> request -> baseUrl . '/site/detalle/' . $producto -> id; ?>"><?php echo $producto -> nombre; ?></a>
														
													</div>
												</div>
											</div>
											
											
						<?php if($cont==3){
							$cont=0;?>
							<br class="clearBoth">
						<?php }
								}
								}
	?>
							<!--==============================Fin Producto=================================-->				
											<br class="clearBoth">
										</div>

									</div>
									<div class="clear"></div>

								</div>
</div>
<!--==============================Fin Producto=================================-->	
								<?php 	} ?>
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
<script>
$('.marcas').hide();
function show(id){
	$('.marcas').hide();
	$('#c'+id).show();
}
$('<?php echo $selector?>').show();</script>