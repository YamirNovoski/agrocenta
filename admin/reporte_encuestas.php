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
				Encuestas
			</h2>			
		</div>
		<div class="body">

			




			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover tablita dataTable">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Genero</th>
							<th>Pais</th>
							<th>Satisfaccion</th>
							<th>Marca Prod.</th>
							<th>Encontro Prod.</th>
							<th>Categegoria</th>
							<th>Facil</th>
							<th>Precio</th>
							<th>Visita</th>
							<th>Recom.</th>
							<th>Comentario</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$query = "SELECT 
						ID_encuesta, EncNombre, EncApellido, EncGenero, EncPais, EncSat, EncMarcaProd, EncFindProd, EncCateg, EncEasy, EncPrecio, EncVisita, EncRecom, ExtraComment, nombre as categoria
						 FROM encuestas e left join categorias c on e.EncCateg = c.id";
						$resultado = $conexion-> query($query);
						if($resultado)

						while ($row=$resultado->fetch_assoc()) { ?>
						<tr>
							<td><?= $row['EncNombre'] ?></td>
							<td><?= $row['EncApellido'] ?></td>
							<td><?= $row['EncGenero'] ?></td>
							<td><?= $row['EncPais'] ?></td>
							<td><?= $row['EncSat'] ?></td>
							<td><?= $row['EncMarcaProd'] ?></td>
							<td><?= $row['EncFindProd'] ?></td>
							<td><?= $row['categoria'] ?></td>
							<td><?= $row['EncEasy'] ?></td>
							<td><?= $row['EncPrecio'] ?></td>
							<td><?= $row['EncVisita'] ?></td>
							<td><?= $row['EncRecom'] ?></td>
							<td><?= $row['ExtraComment'] ?></td>
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