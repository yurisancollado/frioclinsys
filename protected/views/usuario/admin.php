<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->pageTitle="Administrar Usuario";
$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Crear Usuario', 'url'=>array('create')),
);

?>

<h5>Administrar Usuarios</h5>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'apellido',
		'username',
		array(
			'name'=>'estado',
			'header'=>'Estado',
			'value'=>'$data->Estado',
			'filter'=>Cliente::model()->getListaEstado(),
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
