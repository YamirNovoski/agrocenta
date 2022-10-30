<?php
session_start();
extract($_REQUEST);
 $carro=$_SESSION['carro'];

 unset($carro[md5($id)]);


$_SESSION['carro']= $carro;
//header("location:productos.php");
  if($acc=='v'){
  	header("location:vercarrito.php");
  }else{
  	header("location:productos.php");
  }
  ?>