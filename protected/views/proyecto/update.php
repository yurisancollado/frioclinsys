<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
$this->pageTitle="Proyecto - ".$model->nombre;

$this->breadcrumbs=array(
	'Proyectos'=>array('admin'),
	$model->nombre=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Administrar Proyectos', 'url'=>array('admin')),
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
	);
$this->bolmenu2=true;
$cliente=Cliente::model()->findByPk($model->Cliente_id);
$this->nombreCliente=$cliente->razon_social;

$this->menu2=array(
	array('label'=>'Ver Cliente', 'url'=>array('cliente/view','id'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/listaproyecto','cliente'=>$cliente->id)),
	array('label'=>'Crear Proyecto', 'url'=>array('create','cliente'=>$cliente->id)),
	array('label'=>'Ver Proyecto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'<hr>'),
	array('label'=>'Documentos', 'url'=>array('documentos', 'id'=>$model->id)),
	array('label'=>'Imagenes', 'url'=>array('imagenes', 'id'=>$model->id)),

	
	array('label'=>'<hr>'),
	array('label'=>'Listar Facturas', 'url'=>array('facturas/listafactura','cliente'=>$cliente->id)),
	array('label'=>'Crear Factura', 'url'=>array('facturas/create','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),	
	array('label'=>'Listar Productos', 'url'=>array('producto/listaproducto','cliente'=>$cliente->id)),
	array('label'=>'Asociar Productos', 'url'=>array('producto/asociarproducto','cliente'=>$cliente->id)),
	
);
?>

<h5>Modificar Proyecto <?php echo $model->nombre; ?></h5>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>