<?php
/* @var $this FacturasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Facturases',
);

$this->menu=array(
	array('label'=>'Administrar Facturas', 'url'=>array('admin')),
	array('label'=>'Crear Facturas', 'url'=>array('create')),
);
?>

<h1>Facturases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
