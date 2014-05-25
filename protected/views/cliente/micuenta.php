<?php
/* @var $this ClienteController */
/* @var $model Cliente */
$this->pageTitle=$model->razon_social;
$this->breadcrumbs=array(
	'Clientes'=>array('micuenta'),
	$model->razon_social,
);

$this->menu=array(
	array('label'=>'Modificar Contraseña', 'url'=>array('micuentacontrasena','id'=>$model->id)),
	
);

?>

<h5><?php echo $model->razon_social; ?></h5>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'razon_social',
		'rif',
		'nit',		
		'direccion',
		'telefono',
		'representante',
		'username',
		array(
			'name'=>'last_login',
			'type'=>'text',
			'value'=>date_format(new DateTime($model->last_login), 'd-m-Y'),
		),
	),
)); ?>
