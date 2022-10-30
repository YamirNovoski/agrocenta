<?php 
include ('conexion.php');
	
	$id = $_GET['idElemento'];


	
 	$query = "DELETE  FROM producto WHERE id = $id";

	$resultado = $conexion->query($query);
		if ($resultado) {
			echo "se elimino";
			header("location: mostrarproduc.php");
		}else{

			echo "Error no se actualizo: ".$conexion->error;

		}


 ?>
