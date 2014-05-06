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
	array('label'=>'Ver Cliente', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Modificar Cliente <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>