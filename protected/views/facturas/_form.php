<?php
/* @var $this FacturasController */
/* @var $model Facturas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-form',
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
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero'); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Usuario_id'); ?>
		<?php echo $form->textField($model,'Usuario_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cliente_id'); ?>
		<?php echo $form->textField($model,'Cliente_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Cliente_id'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'monto'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'binaryfile'); ?>
		<?php echo $form->fileField($model,'binaryfile'); ?>
		<?php echo $form->error($model,'binaryfile'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar Modificacion'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->