<?php 
include ('conexion.php');

// Variables
$Nom = $_POST['Nom'];
$Apel = $_POST['Ape'];
$Genero = $_POST['Sexo'];
$Pais = $_POST['Sel_Pais'];
$Precio = $_POST['Precio'];
$Marca = $_POST['ProCal'];
$FindProdu = $_POST['Produ'];
$Sel_Prod = $_POST['Sel_Prod'];
$ProDif = $_POST['ProDif'];
$Compete = $_POST['Sel_Pre'];
$Visita = $_POST['Visita'];
$Recom = $_POST['Recom'];
$Ext_com = $_POST['Ext_com'];

// SQL Query
$consulta = "INSERT INTO encuestas VALUES('','$Nom','$Apel','$Genero','$Pais','$Precio','$Marca','$FindProdu','$Sel_Prod','$ProDif','$Compete','$Visita','$Recom','$Ext_com')";

// Ejecutar SQL Query
$ejecutar = mysqli_query($conexion, $consulta);

// Validacion
if (!$ejecutar) {
	header("location:encuesta.php?error=no Se pudo ingresar su encuesta");
} else {
	header("location:index.php?mensaje=Encuesta ingresada con exito");
}

?>