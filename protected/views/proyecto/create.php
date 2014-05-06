<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */

$this->breadcrumbs=array(
	'Proyectos'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrar Proyecto', 'url'=>array('admin')),
);
?>

<h1>Crear Proyecto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>