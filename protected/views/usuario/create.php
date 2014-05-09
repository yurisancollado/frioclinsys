<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->pageTitle="Crear Usuario";
$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrar Usuario', 'url'=>array('admin')),
);
?>

<h5>Crear Usuario</h5>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>