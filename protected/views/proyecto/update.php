<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Admnistrar Proyecto', 'url'=>array('admin')),
	array('label'=>'Crear Proyecto', 'url'=>array('create')),
	array('label'=>'Ver Proyecto', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<h1>Modificar Proyecto <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>