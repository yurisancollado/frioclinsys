<?php
/* @var $this ProductoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Productos',
);

$this->menu=array(
	array('label'=>'Administrar Producto', 'url'=>array('admin')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
);
?>

<h1>Productos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
