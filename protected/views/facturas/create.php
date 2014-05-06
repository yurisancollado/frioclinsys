<?php
/* @var $this FacturasController */
/* @var $model Facturas */
$this->pageTitle="Crear Factura";

$this->breadcrumbs=array(
	'Facturas'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrar Facturas', 'url'=>array('admin')),
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
	);
$this->bolmenu2=true;
$cliente=Cliente::model()->findByPk($_GET['cliente']);
$this->nombreCliente=$cliente->razon_social;

$this->menu2=array(
	array('label'=>'Ver Cliente', 'url'=>array('cliente/view','id'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Facturas', 'url'=>array('facturas/listafactura','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Proyectos', 'url'=>array('proyectos/listaproyecto','cliente'=>$cliente->id)),
	array('label'=>'Crear Proyectos', 'url'=>array('proyectos/create','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Productos', 'url'=>array('productos/listaproducto','cliente'=>$cliente->id)),
	array('label'=>'Asociar Proyectos', 'url'=>array('proyectos/create','cliente'=>$cliente->id)),
	
);
?>

<h1>Crear Facturas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>