<?php

$proyecto=Proyecto::model()->findByPk($model->Proyectos_id);

$this->pageTitle="Proyecto Imagenes- ".$proyecto->nombre;

$this->menu=array(
	array('label'=>'Mis Proyectos', 'url'=>array('miproyecto')),
	array('label'=>'Ver Proyecto', 'url'=>array('view', 'id'=>$proyecto->id)),
	);

?>

<h5>Geleria de Imagenes: <?php echo $proyecto->nombre; ?></h5>



<div>
	<?php foreach($proyecto->imagenes as $imagen){
		echo $imagen->imagen."  ";
		
	}
	
	?>
	
	
</div>
