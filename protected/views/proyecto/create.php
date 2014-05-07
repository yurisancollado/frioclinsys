<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
$this->pageTitle="Crear Proyecto";
$this->breadcrumbs=array(
	'Proyectos'=>array('admin'),
	'Crear',
);


$this->menu=array(
	array('label'=>'Administrar Proyectos', 'url'=>array('admin')),
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
	);
$this->bolmenu2=true;
$cliente=Cliente::model()->findByPk($_GET['cliente']);
$this->nombreCliente=$cliente->razon_social;

$this->menu2=array(
	array('label'=>'Ver Cliente', 'url'=>array('cliente/view','id'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Facturas', 'url'=>array('facturas/listafactura','cliente'=>$cliente->id)),
	array('label'=>'Crear Factura', 'url'=>array('facturas/create','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/listaproyecto','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Productos', 'url'=>array('productos/listaproducto','cliente'=>$cliente->id)),
	array('label'=>'Asociar Proyectos', 'url'=>array('proyectos/create','cliente'=>$cliente->id)),
	
);
?>

<h1>Crear Proyecto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>