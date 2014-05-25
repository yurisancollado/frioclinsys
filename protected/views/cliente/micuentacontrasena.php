<?php
/* @var $this ClienteController */
/* @var $model Cliente */
$this->pageTitle="Modificar Contraseña - ".$model->razon_social;
$this->breadcrumbs=array(
	'Clientes'=>array('micuenta'),
	$model->razon_social=>array('micuenta','id'=>$model->id),
	'Modificar Contraseña',
);

$this->menu=array(
	array('label'=>'Mi Cuenta', 'url'=>array('micuenta','id'=>$model->id)),
);

?>

<h5>Modificar Contraseña </h5>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cliente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,)
)); ?>
	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
		<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Cambiar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
