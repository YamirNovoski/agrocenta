<?php 
include ('../conexion.php');
	
	
	$nombre = $_POST['Nombre'];
 	$categoria = $_POST['Categoria'];
 	$cantidad = $_POST['Cantidad'];
	$precio = $_POST['Precio']; 
	$provedor = $_POST['Provedor'];
	$imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
	$comentario = $_POST['Comentario'];

	$query = "INSERT INTO producto(nombre,precio,cantidad,provedor,imagen,descripcion,categoria)values('$nombre','$precio','$cantidad','$provedor','$imagen','$comentario','$categoria')";

	$resultado = $conexion->query($query);
		if ($resultado) {
			header("location: agregar_productos.php?mensaje=Productos Ingresados");
		}else{
			echo "Error no se guardo";

		}



 ?>