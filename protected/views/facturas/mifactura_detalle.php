<?php
/* @var $this FacturasController */
/* @var $model Facturas */
$this->pageTitle="Factura - ".$model->numero;

$this->breadcrumbs=array(
	'Facturas'=>array('mifactura'),
	$model->numero,
);

$this->menu=array(
	array('label'=>'Mis Facturas', 'url'=>array('mifactura')),
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
     	array(
     		'name'=>'monto',
             'header'=>'monto',
             'value'=>$model->monto.' Bs. ',
          ),
		
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
