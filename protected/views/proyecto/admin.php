<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
$this->pageTitle="Administrar Proyectos";
$this->breadcrumbs=array(
	'Proyectos'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#proyecto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administar Proyectos</h1>

<p>
Puede escribir un operador de comparación  (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al inicio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proyecto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'clientes.razon_social',
		'nombre',
		'tipoproyectos.nombre',
		'porcentaje',
		 array(            
        'name'=>'fecha_inicio',
        'value'=>'date("d-m-Y", strtotime($data->fecha_inicio))',
    	),
    	 array(            
        'name'=>'fecha_fin',
        'value'=>'date("d-m-Y", strtotime($data->fecha_fin))',
    	),
		/*
		'porcentaje',
		'descripcion',
		'fecha_inicio',
		'fecha_fin',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
