<?php
/* @var $this FacturasController */
/* @var $model Facturas */
$this->pageTitle="Crear Factura";

$this->breadcrumbs=array(
	'Facturases'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrar Facturas', 'url'=>array('admin')),
);
?>

<h1>Crear Facturas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>