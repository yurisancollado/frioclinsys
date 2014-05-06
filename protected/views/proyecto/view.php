<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Administrar Proyecto', 'url'=>array('admin')),
	array('label'=>'Crear Proyecto', 'url'=>array('create')),
	array('label'=>'Modificar Proyecto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Proyecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Proyecto #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Usuario_id',
		'Cliente_id',
		'TipoProyecto_id',
		'nombre',
		'estado',
		'porcentaje',
		'descripcion',
		'fecha_inicio',
		'fecha_fin',
	),
)); ?>
