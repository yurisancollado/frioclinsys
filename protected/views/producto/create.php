<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrar Producto', 'url'=>array('admin')),
);
?>

<h5>Crear Producto</h5>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>