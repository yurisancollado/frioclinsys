<?php
/* @var $this FacturasController */
/* @var $model Facturas */
$cliente=Cliente::model()->findByPk($_GET['cliente']);

$this->pageTitle=$cliente->razon_social." - Facturas";
$this->breadcrumbs=array(
	'Facturas'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Administrar Facturas', 'url'=>array('admin')),
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
	);
$this->bolmenu2=true;
$this->nombreCliente=$cliente->razon_social;

$this->menu2=array(
	array('label'=>'Ver Cliente', 'url'=>array('cliente/view','id'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Crear Factura', 'url'=>array('facturas/create','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/listaproyecto','cliente'=>$cliente->id)),
	array('label'=>'Crear Proyectos', 'url'=>array('proyecto/create','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Productos', 'url'=>array('producto/listaproducto','cliente'=>$cliente->id)),
	array('label'=>'Asociar Productos', 'url'=>array('producto/asociarproducto','cliente'=>$cliente->id)),
	
);
?>
<h5>Administar Facturas</h5>

<?php

$dataProvider = $model->search();
$dataProvider->criteria->addCondition('Cliente_id='.$cliente->id);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'afterAjaxUpdate' => 'reinstallDatePicker',
	'columns'=>array(
		array(
		    'name'=>'numero',
		    'value'=>'$data->numero',
		    'filter'=>false,
       ),
       array(
		    'name'=>'fecha',
		    'value'=>'$data->fecha',
		    'filter'=>false,
       ),
    	array(
		    'name'=>'monto',
		    'value'=>'$data->monto',
		    'filter'=>false,
       ),
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

