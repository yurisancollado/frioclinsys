<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/source/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/source/jquery.fancybox.css" type="text/css" media="screen" />

<?php

$this->pageTitle="Proyecto Imagenes- ".$producto->nombre;
$pag="img";
$this->menu=array(
	array('label'=>'Administrar Proyectos', 'url'=>array('admin')),
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
	);
$this->bolmenu2=true;
$this->nombreCliente=$producto->nombre;
$this->menu2=array(
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Ver Producto', 'url'=>array('view', 'id'=>$model->id)),		
	array('label'=>'Modificar Producto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de eliminar el producto?')),
	array('label'=>'<hr>'),
	array('label'=>'Imagenes', 'url'=>'#', 'url'=>array('imagenes', 'id'=>$model->id)),
		
);
?>

<h5>Imagenes: <?php echo $producto->nombre; ?></h5>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'imagenproyecto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'method'=>'post',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>false,
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'
		)
)); 


?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>



	<div class="row">
		<?php echo $form->labelEx($model,'binaryFile'); ?>
		<?php echo $form->fileField($model,'binaryFile'); ?>

	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Subir' : 'Guardar Modificacion'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<div>
	<?php foreach($producto->imagenes as $imagen){
?>
		<div style="margin:2px; border:solid 1px #666; width:100px; height:100px; float:left;">
		<a href='#' onclick='modal("<?php echo Yii::app()->request->baseUrl.'/producto/loadImage/'.$imagen->id.'","'.Yii::app()->request->baseUrl.'/producto/descarga/'.$imagen->id.'","'.Yii::app()->request->baseUrl.'/producto/eliminar/'.$imagen->id; ?>")'>
			<img  src="<?php echo Yii::app()->request->baseUrl.'/producto/loadImage/'.$imagen->id ?>" alt="alt"height="100" width="100"/>
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
		$('#myModal').html('<img  src="'+img+'" alt="alt"/><br/><a href="'+download+'">Descargar</a>   <a style="color:red" href="'+eliminar+'">Eliminar</a>');
		$('#myModal').dialog('open');
	}
	
</script>
