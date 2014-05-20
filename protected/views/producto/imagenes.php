<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */


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
	<?php foreach($producto->imagenes as $imagen){
		echo $imagen->imagen."  ";
		
	}
	
	?>
<div>
	
	
	
</div>
