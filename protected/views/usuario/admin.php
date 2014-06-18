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

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
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
            'name'=>'Estado',
            'value'=>'$data->Estado',
        ),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
