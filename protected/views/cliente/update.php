<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Admnistrar Cliente', 'url'=>array('admin')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Ver Cliente', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<h1>Modificar Cliente <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>