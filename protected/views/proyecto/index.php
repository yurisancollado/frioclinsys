<?php
/* @var $this ProyectoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proyectos',
);

$this->menu=array(
	array('label'=>'Administrar Proyecto', 'url'=>array('admin')),
	array('label'=>'Crear Proyecto', 'url'=>array('create')),
);
?>

<h5>Proyectos</h5>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
