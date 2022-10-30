<?php 
include('cabeza.php');
include('conexion.php');
extract($_REQUEST);
$query ="SELECT * FROM detallecompra where idcompra = '$idc' ";
$resultado  = mysqli_query($conexion,$query);
//$row2=mysqli_fetch_array($resultado);?>
<table  width="800" align="center" border="0">
	<thead><H3 align="center" >Factura de compra</H3><br>
		<h3 align="center"><?php echo '<Label>Nombre de Cliente:  '.$_SESSION['nombre'].'</Label>' ?></h3><br>
		<tr>
			<td colspan="12"><hr></td></tr>
		<tr>
			<td colspan="1">cantidad </td>
			<td colspan="6">Descripcion</td>
			<td colspan="2">Precio </td>
			<td colspan="2">Total </td>
		</tr>
		</thead>	
		<?php while ($row=mysqli_fetch_array($resultado)){?>
			<tbody>
			<tr>
			
			<td colspan="1"> <?php echo $row['cantidad'];?></td>
			<td colspan="6"> <?php echo $row['producto'];?></td>
			<td colspan="2"> <?php echo $row['precio'];?></td>
			<td colspan="2"><?php echo $row['cantidad']*$row['precio'];?></td>      
		</tr>	
	</tbody>
	<?php }

	?>
	<?php echo '<div>
		<h3 align="center">Total a Pagar $'.$_SESSION['totalapagar'].'</h3>
	</div>';	
	 ?>
</table>
<div align="center"><br><br><a type="button" href="#" onclick="window.print()" align="center"><img src="img/p.png" width="70" height="70"></a></div>

<?php include('pie.php'); ?>