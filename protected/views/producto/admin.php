<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Crear Producto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#producto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h5>Administar Productos</h5>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'producto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'nombre',
		'modelo',
		 array(
		'name'=>'Marca_id',
		'header'=>'Marca',
		'value'=>'$data->marca->Nombre',
		'filter'=>CHtml::listData(Marca::model()->findAll(array('order'=>'Nombre')), 'id', 'Nombre'),
		),
		 array(
		'name'=>'TipoProducto_id',
		'header'=>'Tipo',
		'value'=>'$data->tipo->nombre',
		'filter'=>CHtml::listData(TipoProducto::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
		),
	    'costo',
		/*
		'especificacion',
		'costo',
		'estado',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
