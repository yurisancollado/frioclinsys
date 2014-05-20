<?php
/* @var $this FacturasController */
/* @var $model Facturas */
$this->pageTitle="Factura - ".$model->numero;

$this->breadcrumbs=array(
	'Facturas'=>array('admin'),
	$model->numero,
);

$this->menu=array(
	array('label'=>'Administrar Facturas', 'url'=>array('admin')),
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
	);
$this->bolmenu2=true;
$cliente=Cliente::model()->findByPk($model->Cliente_id);
$this->nombreCliente=$cliente->razon_social;

$this->menu2=array(
	array('label'=>'Ver Cliente', 'url'=>array('cliente/view','id'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Facturas', 'url'=>array('facturas/listafactura','cliente'=>$cliente->id)),
	array('label'=>'Crear Factura', 'url'=>array('facturas/create','cliente'=>$cliente->id)),
	array('label'=>'Modificar Facturas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Facturas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea eliminar la factura?')),
	array('label'=>'<hr>'),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/listaproyecto','cliente'=>$cliente->id)),
	array('label'=>'Crear Proyectos', 'url'=>array('proyecto/create','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Productos', 'url'=>array('producto/listaproducto','cliente'=>$cliente->id)),
	array('label'=>'Asociar Productos', 'url'=>array('producto/create','cliente'=>$cliente->id)),
	
);
?>

<h5>Factura #<?php echo $model->numero; ?></h5>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'numero',
		array(
       	'name'=>'fecha',
       	'value'=>Yii::app()->dateFormatter->format('dd-MM-yyyy',$model->fecha) ,  
     	),
		'clientes.razon_social',		
		'monto',
		array(
	       'name'=>'Imagen',
		   'type'=>'raw',
	       'value'=>$model->getImagen(200),
         ),
         array(
	       'name'=>'Descargar',
	          'type'=>'raw',
	         'value'=>CHtml::link('Factura'.$model->numero,array('facturas/descarga','id'=>$model->id))
         ),
	),
)); ?>
