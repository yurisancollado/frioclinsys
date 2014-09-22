<script type="text/javascript" language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.js"></script> 
<script type="text/javascript" charset="utf-8"> 
			$(document).ready(function() {
				$('#catalogo').dataTable();
			} );
</script>

<table id="catalogo">
	<thead>
		<tr>
			
			<th>
				Imagen
			</th>
			<th>
				Nombre
			</th>
			<th>
				Especificacion
			</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($dataProvider as $data){ ?>
		<tr>
			<td>
			<?php echo $data->id ?>
			</td>
			<td>
			<?php echo $data->nombre ?>
			</td>
			<td>
			<?php echo $data->especificacion ?>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	
	
	
</table>




