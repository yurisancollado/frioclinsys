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
	array('label'=>'Asociar Productos', 'url'=>array('producto/create','cliente'=>$cliente->id)),
	
);

?>

<h5>Administar Facturas</h5>


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
			'template'=>'{view}{update}',
		),
	),
)); ?>
