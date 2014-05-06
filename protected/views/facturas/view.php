<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Facturases'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Administrar Facturas', 'url'=>array('admin')),
	array('label'=>'Crear Facturas', 'url'=>array('create')),
	array('label'=>'Modificar Facturas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Facturas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Facturas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'numero',
		'fecha',
		'Usuario_id',
		'cliente.NombreCompleto',
		
		'monto',
		'binaryFile',
		'fileType',
		'fileName',
		
	),
)); ?>
