<?php
/* @var $this FacturasController */
/* @var $model Facturas */
$cliente=Cliente::model()->findByPk(Yii::app()->user->id);

$this->pageTitle=$cliente->razon_social." - Mis Facturas";
$this->breadcrumbs=array(
	'Facturas'=>array('mifactura'),
	'Mis Facturas',
);

$this->menu=array(
	array('label'=>'Mis Facturas', 'url'=>array('mifactura')),
	);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#facturas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h5>Mis Facturas</h5>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		'numero',
		 array(            
        'name'=>'fecha',
        'value'=>'date("d-m-Y", strtotime($data->fecha))',
    	),
			
		'monto',
		/*
		'binaryFile',
		'fileType',
		'fileName',
		'numero',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>
