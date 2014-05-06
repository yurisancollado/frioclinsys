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
	'method'=>'post',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'
		)
)); 
if(isset($_GET['cliente'])){
	$cliente=Cliente::model()->findByPk($_GET['cliente']);
	$id_cliente=$_GET['cliente'];
}
else{
	$cliente=Cliente::model()->findByPk($model->Cliente_id);
	$id_cliente=$model->Cliente_id;
}

?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Cliente_id'); ?>
		<?php echo $form->hiddenField($model, 'Cliente_id',array('value'=>$id_cliente)); ?>
		<?php echo "<input type='text' disabled='disabled' value='".$cliente->razon_social."'/>"; ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero'); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
				'model'=>$model,
				'attribute'=>'fecha',
				'language'=>'es',
				'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					'constrainInput'=>'false',
					'duration'=>'fast',
					'showAnim'=>'slide',
				),
			)
		);?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'monto'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'binaryFile'); ?>
		<?php echo $form->fileField($model,'binaryFile'); ?>
		<?php echo $form->error($model,'binaryFile'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar Modificacion'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->