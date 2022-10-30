<?php require 'header.php'; ?>
<?php if (!isset($_SESSION['id']) || $_SESSION['rol']!=1) {header('location: logout.php');}
include ('../conexion.php');
?>
<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="header">
			<h2>
				Productos
			</h2>			
		</div>
		<div class="body">

			




			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover tablita dataTable">
					<thead>
						<tr>
							<th>nombre</th>
							<th>precio</th>
							<th>cantidad</th>
							<th>provedor</th>
							<th>imagen</th>
							<th>descripcion</th>
							<th>categoria</th>

						</tr>
					</thead>
					<tbody>
						<?php 
						$conexion->query("SET NAMES 'utf8'");
						$query = "SELECT p.id, p.nombre, precio, cantidad, provedor, imagen, descripcion, c.nombre as categoria FROM producto p left join categorias c on p.categoria = c.id";
						$resultado = $conexion->query($query);
						if($resultado)
							while ($row=$resultado->fetch_assoc()) { ?>
								<tr>									
									<td><?= $row['nombre']?></td>
									<td><?= $row['precio']?></td>
									<td><?= $row['cantidad']?></td>
									<td><?= $row['provedor']?></td>
									<td><?= "<img style='height:150px;	' class='card-img-top' src=data:image/png;base64," . (base64_encode(($row['imagen']))) . " >"; ?></td>
									<td><?= $row['descripcion']?></td>
									<td><?= $row['categoria']?></td>

								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script>

		$(function () {


    //Exportable table
    $('.tablita').DataTable({
    	"language":{
    		"sProcessing":     "Procesando...",
    		"sLengthMenu":     "Mostrar _MENU_ registros",
    		"sZeroRecords":    "No se encontraron resultados",
    		"sEmptyTable":     "Ningún dato disponible en esta tabla =(",
    		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    		"sInfoPostFix":    "",
    		"sSearch":         "Buscar:",
    		"sUrl":            "",
    		"sInfoThousands":  ",",
    		"sLoadingRecords": "Cargando...",
    		"oPaginate": {
    			"sFirst":    "Primero",
    			"sLast":     "Último",
    			"sNext":     "Siguiente",
    			"sPrevious": "Anterior"
    		},
    		"oAria": {
    			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
    			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
    		},
    		"buttons": {
    			"copy": "Copiar",
    			"colvis": "Visibilidad"
    		}
    	},
    	dom: 'Bfrtip',
    	responsive: true,
    	buttons: [
    	'copy', 'csv', 'excel', 'pdf', 'print'
    	]
    });
});

</script>
<?php require 'footer.php'; ?>