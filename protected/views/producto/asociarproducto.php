<?php
/* @var $this ProductoController */
/* @var $model Producto */
$cliente=Cliente::model()->findByPk($_GET['cliente']);
$this->breadcrumbs=array(
	'Clientes'=>array('admin'),
	$cliente->razon_social=>array('view','id'=>$cliente->id),
	'Asociar Producto',
);
$this->pageTitle="Asociar producto - ".$cliente->razon_social;

$this->menu=array(
	array('label'=>'Administrar Clientes', 'url'=>array('cliente/admin')),
	);
$this->bolmenu2=true;
$this->nombreCliente=$cliente->razon_social;

$this->menu2=array(
	array('label'=>'Ver Cliente', 'url'=>array('cliente/view','id'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Facturas', 'url'=>array('facturas/listafactura','cliente'=>$cliente->id)),
	array('label'=>'Crear Facturas', 'url'=>array('facturas/create','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/listaproyecto','cliente'=>$cliente->id)),
	array('label'=>'Crear Proyectos', 'url'=>array('proyecto/create','cliente'=>$cliente->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Productos', 'url'=>array('producto/listaproducto','cliente'=>$cliente->id)),
	array('label'=>'Asociar Productos', 'url'=>array('producto/asociarproducto','cliente'=>$cliente->id)),
	
);
?>

<h5>Agregar Productos al Cliente <?php echo $cliente->razon_social; ?> </h5>
 
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'producto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	
	'columns'=>array(
	 array(
            'id'=>'autoId',
            'class'=>'CCheckBoxColumn',
            'selectableRows' => '50',
            'checked'=>'$data->check3'                     
        ),
	
		'nombre',
		'modelo',
		 array(
		'name'=>'Marca_id',
		'header'=>'Marca',
		'value'=>'$data->marca->Nombre',
		'filter'=>CHtml::listData(Marca::model()->findAll(array('order'=>'Nombre')), 'id', 'Nombre'),
		),
		array(
            'name'=>'check',
            'header'=>'Agregado',
            'filter'=>array('1'=>'Si','0'=>'No'),
            'value'=>'$data->check2'
        ),
		
		
	),
));  ?>
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('producto-grid');
}
</script>
<?php echo CHtml::ajaxSubmitButton('Agregar',array('ajaxupdate','act'=>'doAdd','cliente'=>$_GET['cliente']), array('success'=>'reloadGrid')); ?>
<?php echo CHtml::ajaxSubmitButton('Eliminar',array('ajaxupdate','act'=>'doDelete','cliente'=>$_GET['cliente']), array('success'=>'reloadGrid')); ?>
<?php echo CHtml::ajaxSubmitButton('Eliminar Todos',array('ajaxupdate','act'=>'doDeleteAll','cliente'=>$_GET['cliente']), array('success'=>'reloadGrid')); ?>
<?php 
if(isset($_GET['cliente']))
	echo CHtml::button('Terminar',array('submit' => array('pedido/listaproducto','cliente'=>$_GET['cliente']))); 
else
	echo CHtml::button('Terminar',array('submit' => array('pedido/admin'))); ?>
	
<?php $this->endWidget(); ?>

