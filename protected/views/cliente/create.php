<?php
/* @var $this ClienteController */
/* @var $model Cliente */
$this->pageTitle="Crear Cliente";
$this->breadcrumbs=array(
	'Clientes'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrar Cliente', 'url'=>array('admin')),
);
?>

<h5>Crear Cliente</h5>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>