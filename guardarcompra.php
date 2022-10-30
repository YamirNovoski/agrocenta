<?php
session_start();
require("conexion.php");

$carro=$_SESSION['carro'];
$valorcompra=$_SESSION['totalapagar'];
$id = $_SESSION['id'];
 
 
extract($_REQUEST); //Capturamos los datos del formulario
$fecha=date("Y-m-d H:i:s");
//Guardar los datos generales de la compra
$sql="INSERT INTO compra (idcliente, fecha, valorcompra,
estado, nombretc, numerotc, bancotc, tipotc, mestc, aniotc) values ('$id','$fecha',$valorcompra,'0','$nombre','$emisor','$numero','$tipo','$mesv','$aniov')";

$compra=mysqli_query($conexion,$sql);
$idcompra=mysqli_insert_id($conexion); //Devuelve el ultimo PK autoincremental; sino existe PK AI devolvera 0
//mysqli_close($conexion);
if($idcompra>0)
{
    //Guardar los items o productos
    foreach ($carro as $indice => $items)
    {
        require("conexion.php");
        $idproducto=$items['id'];
        $nomproducto=$items['nombre'];
        $precio=$items['precio'];
        $cantidad=$items['cantidad'];
        $sqlitem="insert into detallecompra (idcompra,producto,precio,cantidad)
        values ($idcompra,'$nomproducto',$precio,$cantidad)";
        //echo $sqlitem;
        $producto=mysqli_query($conexion,$sqlitem);
        mysqli_close($conexion);
    }
    //Y vaciamos el carrito
    //Esta linea borra el contenido del carrito
    $carro=false; //unset($carro);
    $_SESSION['carro']=$carro;

    //include('cabeza.php');
    echo '<div align="center"><span class="prod">
    Compra procesada con exito...</span>';
    echo '<br><a href="productos.php">Volver al Catalogo</a></div>';
    echo '<div align="center"><a href="imprimir.php?idc='.$idcompra.'">Imprimir Compra</a>';
}
else
{
    echo "No se pudo efectuar la compra....";
    echo '<br><a href="vercarrito.php">Volver al Carrito</a>';
}
?>