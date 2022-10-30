<?php 
include ('conexion.php');
	
	$id = $_POST['id'];
 	$nombre = $_POST['Nombre'];
 	$categoria = $_POST['Categoria'];
 	$cantidad = $_POST['Cantidad'];
	$precio = $_POST['Precio']; 
	$provedor = $_POST['Provedor'];
	$imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
	$comentario = $_POST['Comentario'];


	
	$query = "UPDATE producto set nombre='$nombre',precio='$precio',cantidad ='$cantidad',provedor ='$provedor',imagen='$imagen',descripcion='$comentario',categoria='$categoria' WHERE id = '$id'";

	$resultado = $conexion->query($query);
		if ($resultado) {
			header("location: mostrarproduc.php");
		}else{

			echo "Error no se actualizo: ".$conexion->error;

		}


 ?>

