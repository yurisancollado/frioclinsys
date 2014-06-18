<?php
/* @var $this ClienteController */
/* @var $model Cliente */
$this->pageTitle="Administrar Cliente";
$this->breadcrumbs=array(
	'Clientes'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Crear Cliente', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cliente-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h5>Administar Clientes</h5>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cliente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'codigo',
		
		'razon_social',
		'rif',				
		'direccion',
		array(
		'name'=>'estado',
		'header'=>'Estado',
		'value'=>'$data->Estado',
		'filter'=>Cliente::model()->getListaEstado(),
		),
		/*
		'telefono',
		'representante',
		'estado',
		'username',
		'password',
		'created_at',
		'last_login',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
