<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
$cliente=Cliente::model()->findByPk($_GET['cliente']);
$this->breadcrumbs=array(
	'Clientes'=>array('admin'),
	$cliente->razon_social=>array('view','id'=>$cliente->id),
	'Asociar Producto',
);
$this->pageTitle="Lista de  Producto - ".$cliente->razon_social;
$this->menu=array(
	array('label'=>'Administrar Proyectos', 'url'=>array('admin')),
	array('label'=>'Administrar Facturas', 'url'=>array('facturas/admin')),
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
	);
$this->bolmenu2=true;
$this->nombreCliente=$cliente->razon_social;

$this->menu2=array(
	array('label'=>'Ver Cliente', 'url'=>array('cliente/view','id'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Facturas', 'url'=>array('facturas/listafactura','cliente'=>$cliente->id)),
	array('label'=>'Crear Factura', 'url'=>array('facturas/create','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Crear Proyectos', 'url'=>array('proyecto/create','cliente'=>$cliente->id)),
	array('label'=>'Listar Productos', 'url'=>array('producto/listaproyecto','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Productos', 'url'=>array('producto/listaproducto','cliente'=>$cliente->id)),
	array('label'=>'Asociar Productos', 'url'=>array('producto/asociarproducto','cliente'=>$cliente->id)),
	
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

<h5>Administar Proyectos</h5>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proyecto-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
                'name'=>'Productos_id', 
                'header'=>'Imagen',
                'type'=>'html',
            	'value'=>'(!empty($data->producto->principalImagen()))?CHtml::image(Yii::app()->assetManager->publish($data->producto->principalImagen()),"",array("style"=>"width:100px;height:100px;")):"Sin imagen"',
                ),
		array(
			'name'=>'Productos_id',
			'header'=>'Producto',
			'value'=>'$data->producto->nombre',
		),
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'',
		),
	),
)); ?>
