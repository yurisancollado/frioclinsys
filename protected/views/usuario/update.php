<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->pageTitle="Modificar Usuario - ".$model->NombreCompleto;
$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	$model->NombreCompleto=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Administrar Usuario', 'url'=>array('admin')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),	
);
$this->bolmenu2=true;
$this->nombreCliente=$model->NombreCompleto;
$this->menu2=array(
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Modificar Usuario <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>