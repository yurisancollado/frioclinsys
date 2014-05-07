<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
$this->pageTitle="Proyecto - ".$model->nombre;
$this->breadcrumbs=array(
	'Proyectos'=>array('admin'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>'Administrar Proyecto', 'url'=>array('admin')),
	array('label'=>'Crear Proyecto', 'url'=>array('create')),
	array('label'=>'Modificar Proyecto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Proyecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
$this->menu=array(
	array('label'=>'Administrar Proyectos', 'url'=>array('admin')),
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
	);
$this->bolmenu2=true;
$cliente=Cliente::model()->findByPk($model->Cliente_id);
$this->nombreCliente=$cliente->razon_social;

$this->menu2=array(
	array('label'=>'Ver Cliente', 'url'=>array('cliente/view','id'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/listaproyecto','cliente'=>$cliente->id)),
	array('label'=>'Crear Proyecto', 'url'=>array('create','cliente'=>$cliente->id)),
	array('label'=>'Modificar Proyecto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Proyecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<hr>'),
	array('label'=>'Documentos', 'url'=>array('documentos', 'id'=>$model->id)),
	array('label'=>'Imagenes', 'url'=>array('imagenes', 'id'=>$model->id)),

	
	array('label'=>'<hr>'),
	array('label'=>'Listar Facturas', 'url'=>array('facturas/listafactura','cliente'=>$cliente->id)),
	array('label'=>'Crear Factura', 'url'=>array('facturas/create','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),	
	array('label'=>'Listar Productos', 'url'=>array('productos/listaproducto','cliente'=>$cliente->id)),
	array('label'=>'Asociar Proyectos', 'url'=>array('proyectos/create','cliente'=>$cliente->id)),
	
);
?>

<h1>Proyecto: <?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'clientes.razon_social',
		'nombre',		
		'tipoproyectos.nombre',		
		'Estado',
		'porcentaje',
		'descripcion',
		array(
       	'name'=>'fecha_inicio',
       	'value'=>Yii::app()->dateFormatter->format('dd-MM-yyyy',$model->fecha_inicio) ,  
     	),
     	array(
       	'name'=>'fecha_fin',
       	'value'=>Yii::app()->dateFormatter->format('dd-MM-yyyy',$model->fecha_fin) ,  
     	),
	),
)); ?>
