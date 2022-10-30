<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Lista de productos.</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/01b75cf0b9.js" crossorigin="anonymous"></script>
 
</head>
<body>
		<h1 align="center">LISTADO DE PRODUCTOS EN EXISTENCIAS.</h1>
	<center>
		<table border="0" class="table">
			<thead>	
				<tr>
					<td colspan="12"><a href="productosadmin.php" type="button" class="btn btn-primary btn-lg btn-block">INGRESAR NUEVO PRODUCTO</a></td>
					<br>
				</tr>		
				<tr align="center"  class="info"  border="1">
					<td>Producto</td>
					<td colspan="2">Precio</td>
					<td colspan="2" align="center"> Cantidad </td>
					<td>Provedor</td>
					<td>Imagen</td>
					<td>Descripcion</td>
					<td>Categoria</td>
					<td colspan="2"> Modificar / Eliminar</td>
					
				</tr>
				<tbody>
					<?php include ('conexion.php');
					$query = "SELECT * FROM producto";
					$resultado = $conexion-> query($query);
					while ($row=$resultado->fetch_assoc()) {
						?>
						<tr class="success">
							<td><?php echo $row['nombre']; ?></td>
							<td colspan="2" align="center">$ <?php echo $row['precio']; ?></td>
							<td colspan="2" align="center"><?php echo $row['cantidad']; ?></td>
							<td align="center"><?php echo $row['provedor']; ?></td>
							<td>
								<?php  echo "<img width='90' height='48' src=data:image/png;base64," . (base64_encode(($row['imagen']))) . " >"; ?>
							</td>
							<td align="center"><?php echo $row['descripcion']; ?></td>
							<td align="center"><?php echo $row['categoria']; ?></td>
							<td align="center"><a type="button" class="btn btn-warning" onclick="mostrarModal('<?= $row['nombre']?>','<?= $row['categoria']?>','<?= $row['cantidad']?>','<?= $row['precio']?>','<?= $row['provedor']?>','<?= $row['descripcion']?>','<?= $row['id']?>',)" ><i class="fas fa-edit"></i> Modificar </a></button></td>


							<td align="center"><a  class="btn btn-danger" href="eliminar.php?idElemento=<?= $row['id']?>&otra=cosa&omaewa=noshideru" >Eliminar <i class="fas fa-trash-alt"></i></a></td>
							
						</tr>
					<?php 
					}
					?>

				</tbody>
			</thead>
		</table>
	</center>
<!-- Este el model para editar productos...-->
 <div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">EDITAR PRODUCTO</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="EditPro" id="edipro" method="post" enctype="multipart/form-data" action="actualizar.php">
          <table border="0" id="azul">
					<tr height="50">
						<td height="50">Ingrese Nombre del Producto<span lang="en-us">:</span> </td>
						<td><input type="text" name="Nombre" id="Nombre" class="selection"  required placeholder="Escriba un nombre"  ></td>
					</tr>	
					<tr height="50">
						<td>Categoria:</td>
						<td>
							<select name="Categoria" id="categoria">
								<option value="1">Herramientas</option>
								<option value="2">Decoracion</option>
								<option value="3">Plantas</option>
								<option value="4">Otra</option>
							</select>
						</td>
					</tr>	
					<tr height="50">
						<td>Ingrese Cantidad:</td>
						<td><input type="text" name="Cantidad" id="Cantidad" pattern="^\d+$" placeholder="Ingrese solo numeros" required="Solo puede ingresar numeros"></td>
					</tr>	
					<tr height="50">
						<td>Precio Unitario</td>
						<td><input type="text" name="Precio" id="precio" pattern="^[0-9]{1,3}([\\,][0-9]{3})*[\\.][0-9]{2}$" placeholder="0.00 " required></td>
					</tr>
					<tr height="50">
						<td>Provedor</td>
						<td><input type="text" name="Provedor" id="provedor" placeholder="Nombre de provedor" required></td>
					</tr>	
					<tr height="50">
						<td>Imagen del Producto: </td>
						<td>
							<input type="file" id="archivoInput" name="Imagen" placeholder="Seleccione Archivo" required />
						</td>
					</tr -->
					<tr height="50">
						<td>Descripcion: </td>
						<td><textarea name="Comentario" id="comentario" rows="" cols="40" maxlength="40"> </textarea></td>
					</tr>	
					<tr height="50">
						<input type="hidden" name="id" id="id" value="">
					</tr>	

			</table>
       
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
     </form>
  </div>
</div>
<!-- aqui finaliza el model...-->

<script>
	function mostrarModal(nombre,categoria,cantidad,precio,proveedor,comentario,id){
		$('#Nombre').val(nombre);
		$('#categoria').val(categoria);
		$('#Cantidad').val(cantidad);
		$('#precio').val(precio);
		$('#provedor').val(proveedor);
		$('#comentario').val(comentario);
		$('#id').val(id);
		$('#modal_editar').modal();
	}	

	function elimina(id){

		$('#id').val(id);
	}
</script>
</body>
</html>