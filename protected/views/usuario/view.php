<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->pageTitle="Usuario - ".$model->NombreCompleto;
$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	$model->NombreCompleto,
);

if($model->estado==1)
	$accionActivo=array('label'=>'Desactivar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('desactivar','id'=>$model->id),'confirm'=>'Esta seguro que desea desactivar el usuario?'));
else {
	$accionActivo=array('label'=>'Activar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('activar','id'=>$model->id),'confirm'=>'Esta seguro que desea activar el usuario?'));
}
$this->menu=array(
	array('label'=>'Administrar Usuario', 'url'=>array('admin')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),	
);
$this->bolmenu2=true;
$this->nombreCliente=$model->NombreCompleto;
$this->menu2=array(
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->id)),
	$accionActivo,	
);
?>

<h5>Usuario: <?php echo $model->nombre.' '.$model->apellido; ?></h5>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		'apellido',
		'username',
		'Estado',
		array(
			'name'=>'created_at',
			'type'=>'text',
			'value'=>date_format(new DateTime($model->created_at), 'd-m-Y'),
		),
		array(
			'name'=>'last_login',
			'type'=>'text',
			'value'=>date_format(new DateTime($model->last_login), 'd-m-Y'),
		),
	),
)); ?>
