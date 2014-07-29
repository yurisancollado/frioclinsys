<?php
/* @var $this ProductoController */
/* @var $model Producto */
$cliente=Cliente::model()->findByPk($_GET['cliente']);
$this->pageTitle=$cliente->razon_social." - Productos";
$this->breadcrumbs=array(
	'Productos'=>array('admin'),
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

<h5>Administar Productos</h5>

<?php 
$dataProvider = $model->search();
$dataProvider->criteria->addCondition('Cliente_id='.$cliente->id);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'producto-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(	
		'Cliente_id',	
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
));
?>


