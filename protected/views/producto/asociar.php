<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('admin'),
	'Asociar',
);
/*
$this->menu=array(
	array('label'=>'Administrar Producto', 'url'=>array('admin')),
);*/
?>

<h5>Asociar Producto</h5>
Puedes 
<a href="#" onclick="toCreate()">Crear un nuevo producto</a> ó 
<a href="#" onclick="toChoose()">Elegir un Producto</a>
<div id="formulario" style="display:none">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
<div id="listado" style="display:none">
	<div class="row">

		<?php echo CHtml::dropDownList('marcas','', CHtml::listData(Marca::model()->findAll(),'id','Nombre'), array('empty' => 'Elige una marca')); ?>
		<div id="productos">
			
		</div>
	</div>
	
</div>
<script>
	function toChoose(){
		$('#listado').show();
		$('#formulario').hide();
	}
	function toCreate(){
		$('#listado').hide();
		$('#formulario').show();
	}
	$('#marcas').change(function(){
		if($('#marcas').val()!=''){
			var marca=$('#marcas').val();		
			$.ajax({
					      url: "cargaxMarca",
					      type: "post",
					      data: {
					      	marca:marca,
					      	cliente:'<?php echo $cliente;?>'},
					      success: function(data){
					           $('#productos').html(data);																	           
					      },
					      error:function(){
					  			$('#productos').html('No fué posible cargar los productos');	
					      }
				});
			}
		});
	
</script>
