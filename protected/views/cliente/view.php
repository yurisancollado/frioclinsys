<?php
/* @var $this ClienteController */
/* @var $model Cliente */
$this->pageTitle="Cliente - ".$model->razon_social;
$this->breadcrumbs=array(
	'Clientes'=>array('admin'),
	$model->razon_social,
);
if($model->estado==1)
	$accionActivo=array('label'=>'Desactivar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('desactivar','id'=>$model->id),'confirm'=>'Esta seguro que desea desactivar el cliente?'));
else {
	$accionActivo=array('label'=>'Activar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('activar','id'=>$model->id),'confirm'=>'Esta seguro que desea activar el cliente?'));
}
$this->menu=array(
	array('label'=>'Administrar Cliente', 'url'=>array('admin')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),	
);
$this->bolmenu2=true;
$this->nombreCliente=$model->razon_social;
$this->menu2=array(
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->id)),
	$accionActivo,	
	array('label'=>'<hr>'),
	array('label'=>'Listar Facturas', 'url'=>array('facturas/listafactura','cliente'=>$model->id)),
	array('label'=>'Crear Factura', 'url'=>array('facturas/create','cliente'=>$model->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Proyectos', 'url'=>array('proyecto/listaproyecto','cliente'=>$model->id)),
	array('label'=>'Crear Proyectos', 'url'=>array('proyecto/create','cliente'=>$model->id)),
	array('label'=>'<hr>'),
	array('label'=>'Listar Productos', 'url'=>array('productos/listaproducto','cliente'=>$model->id)),
	array('label'=>'Asociar Proyectos', 'url'=>array('proyectos/create','cliente'=>$model->id)),
	
);
?>

<h1>Cliente <?php echo $model->razon_social; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codigo',
		'razon_social',
		'rif',
		'nit',		
		'direccion',
		'telefono',
		'representante',
		'Estado',
		'username',
		array(
			'name'=>'created_at',
			'type'=>'text',
			'value'=>date_format(new DateTime($model->created_at), 'd-m-Y'),
		),
		array(
			'name'=>'last_login',
			'type'=>'text',
			'value'=>date_format(new DateTime($model->last_login), 'd-m-Y'),
		),
	),
)); ?>
