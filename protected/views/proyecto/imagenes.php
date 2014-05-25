<?php

$proyecto=Proyecto::model()->findByPk($model->Proyectos_id);

$this->pageTitle="Proyecto Imagenes- ".$proyecto->nombre;
$pag="img";


$this->menu=array(
	array('label'=>'Administrar Proyectos', 'url'=>array('admin')),
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
	);
$this->bolmenu2=true;
$cliente=Cliente::model()->findByPk($proyecto->Cliente_id);
$this->nombreCliente=$cliente->razon_social;

$this->menu2=array(
	array('label'=>'Ver Cliente', 'url'=>array('cliente/view','id'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/listaproyecto','cliente'=>$cliente->id)),
	array('label'=>'Crear Proyecto', 'url'=>array('create','cliente'=>$cliente->id)),
	array('label'=>'Ver Proyecto', 'url'=>array('view', 'id'=>$proyecto->id)),
	array('label'=>'Modificar Proyecto', 'url'=>array('update', 'id'=>$proyecto->id)),
	array('label'=>'Eliminar Proyecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$proyecto->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<hr>'),
	array('label'=>'Documentos', 'url'=>array('documentos', 'id'=>$proyecto->id)),
	array('label'=>'Imagenes', 'url'=>array('imagenes', 'id'=>$proyecto->id)),

	array('label'=>'<hr>'),
	array('label'=>'Listar Facturas', 'url'=>array('facturas/listafactura','cliente'=>$cliente->id)),
	array('label'=>'Crear Factura', 'url'=>array('facturas/create','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),	
	array('label'=>'Listar Productos', 'url'=>array('producto/listaproducto','cliente'=>$cliente->id)),
	array('label'=>'Asociar Proyectos', 'url'=>array('producto/create','cliente'=>$cliente->id)),
	
);
?>

<h5>Imagenes: <?php echo $proyecto->nombre; ?></h5>
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
	<?php foreach($proyecto->imagenes as $imagen){
		echo $imagen->imagen."  ";
		
	}
	
	?>
	
	
</div>
