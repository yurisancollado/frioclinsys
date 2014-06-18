<?php
/* @var $this FacturasController */
/* @var $model Facturas */
$this->pageTitle="Administrar Facturas";
$this->breadcrumbs=array(
	'Facturas'=>array('admin'),
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
	$('#facturas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h5>Administar Facturas</h5>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'afterAjaxUpdate' => 'reinstallDatePicker',
	'columns'=>array(
		'numero',	
    	array(
            'name' => 'fecha',
            'value'=>'$data->fecha',
             'filter'=>$this->widget('zii.widgets.jui.CJuiDatepicker', array(
                'model'=>$model,
                'attribute'=>'fecha',
                'htmlOptions' => array(
                    'id' => 'event_date_search'
                ), 
                'options' => array(
                    'dateFormat' => 'yy-mm-dd'
                )
            ), true)
			),
    	 array(
		'name'=>'Cliente_id',
		'header'=>'Razon Social',
		'value'=>'$data->clientes->razon_social',
		'filter'=>CHtml::listData(Cliente::model()->findAll(array('order'=>'razon_social')), 'id', 'razon_social'),
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
			'template'=>'{view}{update}',
		),
	),
));

Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#event_date_search').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['es'],{'dateFormat':'yy-mm-dd'}));
}
"); ?>
