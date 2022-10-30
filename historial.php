<?php include('cabeza.php'); ?>
<?php 
	include('conexion.php');

	echo '<h2 align="center">Historial de compras de '.$_SESSION['nombre'].' </h2><br><hr>';
	$id=$_SESSION['id'];
	$query="SELECT id,fecha,valorcompra from compra where idcliente =  '$id'";
	
	$resultado = mysqli_query($conexion,$query); 
?>
	<table  align="CENTER" border="">
		<tr>
			<th ><label>N° COMPRA </label></th>
			<th ><label>FECHA DE COMPRA </label></th>
			<th ><label>TOTAL PAGADO </label></th>
			<th ><label>DETALLE </label></th>
		</tr>
		<?php
		echo '<TR>';

			while ($row=mysqli_fetch_array($resultado)){

			echo '<td><label>'.$row['id'].'</label></td>';
			echo '<td><label>'.$row['fecha'].'</label></td>';
			echo '<td><label>'.$row['valorcompra'].'</label></td>';
			echo '<td><a href="#"><img src="img/h.png" width="70" height="70" onclick="mostrarModal()"></a></td>';
		
		echo '</TR>';
		?>
	<?php }?>
	</table>

<?php include('pie.php'); ?>