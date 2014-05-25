<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
$this->pageTitle="Proyecto - ".$model->nombre;
$this->breadcrumbs=array(
	'Proyectos'=>array('admin'),
	$model->nombre,
);


$this->menu=array(
	array('label'=>'Mis Proyectos', 'url'=>array('miproyecto')),
	array('label'=>'Galeria de Imagen', 'url'=>array('miproyecto_imagen','id'=>$model->id)),
	);

?>

<h5><?php echo $model->nombre; ?></h5>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',		
		'tipoproyectos.nombre',			
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
)); 
?>
<h5>Documentos</h5>
<div>
	
	<?php foreach($proyecto->documentos as $documento){
		echo CHtml::link($documento->fileName,array('descarga','id'=>$documento->id))."<br/>"; 
	}	
	?>
</div>