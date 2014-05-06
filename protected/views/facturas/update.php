<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Facturases'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Admnistrar Facturas', 'url'=>array('admin')),
	array('label'=>'Crear Facturas', 'url'=>array('create')),
	array('label'=>'Ver Facturas', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<h1>Modificar Facturas <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>