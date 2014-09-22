<?php

$proyecto=Proyecto::model()->findByPk($model->Proyectos_id);

$this->pageTitle="Proyecto Imagenes- ".$proyecto->nombre;

$this->menu=array(
	array('label'=>'Mis Proyectos', 'url'=>array('miproyecto')),
	array('label'=>'Ver Proyecto', 'url'=>array('view', 'id'=>$proyecto->id)),
	);

?>

<h5>Galeria de Imagenes: <?php echo $proyecto->nombre; ?></h5>



<div>
	<?php foreach($proyecto->imagenes as $imagen){
?>
		<div style="margin:2px; border:solid 1px #666; width:100px; height:100px; float:left;">
			
		<?php  //echo CHtml::image($imagen->direccion, "Imagen",array()); ?>
		<a href='#' onclick='modal("<?php echo Yii::app()->request->baseUrl.'//'.$imagen->direccion.'","'.Yii::app()->request->baseUrl.'/proyecto/descarga/'.$imagen->id.'","'.Yii::app()->request->baseUrl.'/proyecto/eliminar/'.$imagen->id; ?>")'>
			<img  src="<?php echo Yii::app()->request->baseUrl.'/'.$imagen->direccion ?>" alt="alt"height="100" width="100"/>
		</a>
		</div>
		
		<?php
		
	}

	?>
	<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
		'id'=>'myModal',
		
		'options'=>array(
			

			'autoOpen'=>false,
			'resizable'=>false,
			'modal'=>true,
			'overlay'=>array(
				'backgroundColor'=>'#000',
				'opacity'=>'0.8'
			),
		),
	));
	$this->endWidget('zii.widgets.jui.CJuiDialog');
	
	?>
	
</div>
<script>
	
	$('#myModal').attr('align','center');
	function modal( img,download,eliminar){
		$('#myModal').html('<img  src="'+img+'" alt="alt"/><br/><a href="'+download+'">Descargar</a>');
		$('#myModal').dialog('open');
	}
	
	
</script>
