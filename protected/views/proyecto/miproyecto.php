<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
$cliente=Cliente::model()->findByPk(Yii::app()->user->id);
$this->pageTitle="Mis Proyectos";
$this->breadcrumbs=array(
	'Proyectos'=>array('miproyecto'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Mis Proyectos', 'url'=>array('miproyecto')),
	);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#proyecto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h5>Mis Proyectos</h5>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proyecto-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'tipoproyectos.nombre',
		'porcentaje',
		 array(            
        'name'=>'fecha_inicio',
        'value'=>'date("d-m-Y", strtotime($data->fecha_inicio))',
    	),
    	 array(            
        'name'=>'fecha_fin',
        'value'=>'date("d-m-Y", strtotime($data->fecha_fin))',
    	),
		/*
		'porcentaje',
		'descripcion',
		'fecha_inicio',
		'fecha_fin',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>
