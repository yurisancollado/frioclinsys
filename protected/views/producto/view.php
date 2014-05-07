<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Administrar Producto', 'url'=>array('admin')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Modificar Producto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Producto #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'modelo',
		'marca.nombre',
		'tipo.nombre',
		'especificacion',
		'costo',
	
	),
)); ?>
