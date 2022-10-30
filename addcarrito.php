<?php 
session_start();
extract($_REQUEST); //extract: extraer parametros y crear variables locales
// $id=$_GET['id']; y $nom=$_POST['nom']; lo haria extract()
require('conexion.php');
if(!isset($cantidad)){$cantidad=1;}
$sql="SELECT * FROM producto where id='$id'";
$pro=mysqli_query($conexion,$sql);
$fila=mysqli_fetch_array($pro);
//Validar si ya hay items en el carrito
if(isset($_SESSION['carro']))
{
    $carro=$_SESSION['carro'];
}
//Agregamos el nuevo item al carrito
$carro[md5($id)]=array('identificador' =>md5($id),
	'nombre'=>$fila['nombre'],	
    'cantidad'=>$cantidad,    
    'precio'=>$fila['precio'],
    'id'=>$id);

//Guardar el carrito en una sesion
$_SESSION['carro']=$carro;


 if($acc=='v'){
  	header("location:vercarrito.php");
  }else{
  	header("location:productos.php");
  }

 ?>