<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */
/* @var $form CActiveForm */
?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proyecto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'method'=>'post',	
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'
		),
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,)
		
));
if(isset($_GET['cliente'])){
	$cliente=Cliente::model()->findByPk($_GET['cliente']);
	$id_cliente=$_GET['cliente'];
}
else{
	$cliente=Cliente::model()->findByPk($model->Cliente_id);
	$id_cliente=$model->Cliente_id;
} ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'Cliente_id'); ?>
		<?php echo $form->hiddenField($model, 'Cliente_id',array('value'=>$id_cliente)); ?>
		<?php echo "<input type='text' disabled='disabled' value='".$cliente->razon_social."'/>"; ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>
	
	
	
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'TipoProyecto_id'); ?>
		<?php echo $form->dropDownList($model,'TipoProyecto_id', CHtml::listData(Tipoproyecto::model()->findAll(),'id','nombre'), array('empty' => 'Elige una opción')); ?>

		<?php echo $form->error($model,'TipoProyecto_id'); ?>
	</div>




	<div class="row">
		<?php echo $form->labelEx($model,'porcentaje'); ?>
		<?php echo $form->textField($model,'porcentaje',array('size'=>10,'maxlength'=>10,'type'=>'number')); ?>
		<?php echo $form->error($model,'porcentaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_inicio'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
				'model'=>$model,
				'attribute'=>'fecha_inicio',
				'language'=>'es',
				'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					'constrainInput'=>'false',
					'duration'=>'fast',
					'showAnim'=>'slide',
				),
			)
		);?>
		<?php echo $form->error($model,'fecha_inicio'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'fecha_fin'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
				'model'=>$model,
				'attribute'=>'fecha_fin',
				'language'=>'es',
				'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					'constrainInput'=>'false',
					'duration'=>'fast',
					'showAnim'=>'slide',
				),
			)
		);?>
		<?php echo $form->error($model,'fecha_fin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar Modificacion'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->