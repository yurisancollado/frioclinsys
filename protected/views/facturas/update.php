<?php
/* @var $this FacturasController */
/* @var $model Facturas */
$this->pageTitle="Modificar Factura - ".$model->numero;
$this->breadcrumbs=array(
	'Facturas'=>array('admin'),
	$model->numero=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Administrar Facturas', 'url'=>array('admin')),
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
	);
$this->bolmenu2=true;
$cliente=Cliente::model()->findByPk($model->Cliente_id);
$this->nombreCliente=$cliente->razon_social;

$this->menu2=array(
	array('label'=>'Ver Cliente', 'url'=>array('cliente/view','id'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Facturas', 'url'=>array('facturas/listafactura','cliente'=>$cliente->id)),
	array('label'=>'Ver Factura', 'url'=>array('facturas/view','id'=>$model->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/listaproyecto','cliente'=>$cliente->id)),
	array('label'=>'Crear Proyectos', 'url'=>array('proyecto/create','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Productos', 'url'=>array('producto/listaproducto','cliente'=>$cliente->id)),
	array('label'=>'Asociar Productos', 'url'=>array('producto/create','cliente'=>$cliente->id)),
	
);
?>

<h5>Modificar Facturas <?php echo $model->numero; ?></h5>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>