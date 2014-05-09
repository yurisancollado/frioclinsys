<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('admin'),
	$model->nombre=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Admnistrar Producto', 'url'=>array('admin')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Ver Producto', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<h5>Modificar Producto <?php echo $model->nombre; ?></h5>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>