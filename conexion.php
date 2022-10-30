<?php 
	/*
	//Estableciendo la conexion a la BD
	$conexion = new mysqli("localhost", "root", "", "jardineria");
	
	if ($conexion->connect_errno) {
		//die() detiene o termina la ejecucion del codigo php
	    die("Fallo al conectar a MySQL: (".$conexion->connect_errno." ) ".$conexion->connect_error);
	}
	*/
	$conexion = mysqli_connect("localhost", "root", "", "jardineria") or die (mysql_error());
?>