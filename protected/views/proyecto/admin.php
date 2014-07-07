<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
$this->pageTitle="Administrar Proyectos";
$this->breadcrumbs=array(
	'Proyectos'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
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

<h5>Administar Proyectos</h5>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proyecto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'afterAjaxUpdate' => 'reinstallDatePicker',
	'columns'=>array(
		
		 array(
		'name'=>'Cliente_id',
		'header'=>'Razon Social',
		'value'=>'$data->clientes->razon_social',
		'filter'=>CHtml::listData(Cliente::model()->findAll(array('order'=>'razon_social')), 'id', 'razon_social'),
		),
		'nombre',
		 array(
		'name'=>'TipoProyecto_id',
		'header'=>'Tipo',
		'value'=>'$data->tipoproyectos->nombre',
		'filter'=>CHtml::listData(Tipoproyecto::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
		),
		'porcentaje',
		array(
            'name' => 'fecha_inicio',
            'value'=>'$data->fecha_inicio',
             'filter'=>$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model,
                'attribute'=>'fecha_inicio',
                'htmlOptions' => array(
                    'id' => 'event_date_search'
                ), 
                'options' => array(
                    'dateFormat' => 'yy-mm-dd'
                )
            ), true)
			),
			array(
            'name' => 'fecha_fin',
            'value'=>'$data->fecha_fin',
             'filter'=>$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model,
                'attribute'=>'fecha_fin',
                'htmlOptions' => array(
                    'id' => 'event_date_search2'
                ), 
                'options' => array(
                    'dateFormat' => 'yy-mm-dd'
                )
            ), true)
			),
    	/*
		'porcentaje',
		'descripcion',
		'fecha_inicio',
		'fecha_fin',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); 
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#event_date_search').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['es'],{'dateFormat':'yy-mm-dd'}));
}
");
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#event_date_search2').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['es'],{'dateFormat':'yy-mm-dd'}));
}
"); ?>
