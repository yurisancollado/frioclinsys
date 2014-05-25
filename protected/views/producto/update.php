<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('admin'),
	$model->nombre=>array('view','id'=>$model->id),
	'Modificar',
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
	array('label'=>'Ver Producto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Eliminar Producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de eliminar el producto?')),
);
?>

<h5>Modificar Producto <?php echo $model->nombre; ?></h5>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>