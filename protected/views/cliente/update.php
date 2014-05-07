<?php
/* @var $this ClienteController */
/* @var $model Cliente */
$this->pageTitle="Modificar Cliente - ".$model->razon_social;
$this->breadcrumbs=array(
	'Clientes'=>array('admin'),
	$model->razon_social=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Administrar Cliente', 'url'=>array('admin')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),	
);
$this->bolmenu2=true;
$this->nombreCliente=$model->razon_social;
$this->menu2=array(
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Facturas', 'url'=>array('facturas/listafactura','cliente'=>$model->id)),
	array('label'=>'Crear Factura', 'url'=>array('facturas/create','cliente'=>$model->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/listaproyecto','cliente'=>$model->id)),
	array('label'=>'Crear Proyectos', 'url'=>array('proyecto/create','cliente'=>$model->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Productos', 'url'=>array('productos/listaproducto','cliente'=>$model->id)),
	array('label'=>'Asociar Proyectos', 'url'=>array('proyectos/create','cliente'=>$model->id)),
	
);
?>

<h1>Modificar Cliente <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>