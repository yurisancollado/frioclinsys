<?php
/* @var $this ProductoController */
/* @var $model Producto */
$this->pageTitle="Producto - ".$model->nombre;

$this->breadcrumbs=array(
	'Productos'=>array('admin'),
	$model->nombre,
);
$this->menu=array(
	array('label'=>'Administrar Producto', 'url'=>array('admin')),
	array('label'=>'Administrar Facturas', 'url'=>array('admin')),
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
	);
$this->bolmenu2=true;
$this->nombreCliente=$model->nombre;
$this->menu2=array(
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Modificar Producto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de eliminar el producto?')),
	array('label'=>'<hr>'),
	array('label'=>'Imagenes', 'url'=>'#', 'url'=>array('imagenes', 'id'=>$model->id)),
	
);
?>

<h5>Producto <?php echo $model->nombre; ?></h5>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		'modelo',
		'marca.Nombre',
		'tipo.nombre',
		'especificacion',
		'costo',
	
	),
)); ?>
