<?php
/* @var $this ProductoController */
/* @var $model Producto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'producto-form',
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
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'modelo'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Marca_id'); ?>
		<?php echo $form->dropDownList($model,'Marca_id', CHtml::listData(Marca::model()->findAll(),'id','nombre'), array('empty' => 'Elige una opción')); ?>

		<?php echo $form->error($model,'Marca_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'TipoProducto_id'); ?>
		<?php echo $form->dropDownList($model,'TipoProducto_id', CHtml::listData(Tipoproducto::model()->findAll(),'id','nombre'), array('empty' => 'Elige una opción')); ?>

		<?php echo $form->error($model,'TipoProducto_id'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'especificacion'); ?>
		<?php echo $form->textArea($model,'especificacion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'especificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'costo'); ?>
		<?php echo $form->textField($model,'costo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'costo'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar Modificacion'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
