

<?php
session_start();
    if(!isset($_SESSION['usuario']))
{
    header ('location:login.php');
}
//Forma contractada del IF se usa cuando las intrucciones son UNA SOLA en ambas respuestas
if(isset($_SESSION['carro']))
    $carro=$_SESSION['carro'];else $carro=false;
?>
<!doctype html>
<html>
<head>
    <title>Carrito de Productos</title>
    <meta charset="utf-8">
  <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
<link rel="stylesheet" href="assets/css/nice-select.css">
    <!-- JS here -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
   
</head>
<body>

<h1 align="center">Productos Agregados al Carrito</h1>
<center>
    <?php
    if($carro)
    {
    ?>
        <table width="800" border="0">
        	<tr>
					<td colspan="12"><a href="productos.php" type="button" class="btn btn-primary btn-lg btn-block">SEGUIR COMPRANDO</a></td>
					<br>
				</tr>
            <tr>
                <td>Producto</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>SubTotal</td>
                <td>Borrar</td>
                <td>Actualizar</td>
            </tr>
            <tr>
                <td colspan="6">
                    <hr>
                </td>
            </tr>
            <?php
            $suma=0;
            $subtotal=0;
         
            foreach ($carro as $indice => $items)
            {
                $subtotal=$items['cantidad']*$items['precio'];
                $suma=$suma+$subtotal;
                 $_SESSION['totalapagar']=$suma;
                 echo '<form name="'.$items['identificador'].'" method="POST" action="addcarrito.php?acc=v&id='.$items['id'].'">';
                echo '<tr>';
                echo '<td>'.$items['nombre'].'</td>';
                echo '<td>$'.number_format($items['precio'],2).'</td>';
                echo '<td><input type="number" name="cantidad" size="6" maxlength="6" value="'.$items['cantidad'].'" ></td>';
                echo '<td>$'.number_format($subtotal,2).'</td>';
                echo '<td><a href="borrarcarrito.php?acc=v&id='.$items['id'].'"><img src="img/br.png" width="24" height="28" border="0" title="Borrar del Carrito"/></a></td>';
                echo '<td><input type ="image" src="img/f.png" width="24" height="28" border="0" title="Actualizar"/></td></form>';
            }
            ?>
        </table>
        <div>Total Articulos: <?php echo count($carro); ?></div>
        <div>Total a Pagar: $<?php echo number_format($suma,2); ?></div>
		<div align="center">
			<a href="#" onclick="mostrarModal()"><img src="img\C.png" height="70" width="180"></a>
		</div>

		<!-- Este el model para editar productos...-->
 <div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">PAGAR PRODUCTOS</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="frmAutorizar" action="guardarcompra.php" method="post">
<table>
<tbody>
<tr>
<td>
<div align="center">
<table >
<tr>
<td align="center">
<font color="#0255A4" size="3"><b> <h2>TOTAL A PAGAR</h2> </font>
<font color="#0255A4" size="4"><h2>$<?php echo $_SESSION['totalapagar']; ?></h2></b></font>
</td>
</tr>
</table>
</div>


<table >
<tr>
<td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF"  >
<span class="no-style-override-12a"><p>Nombre de Tarjeta: </p></span>
</td>
<td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="73%">
<input type=text name="nombre" size="40" maxlength="50">
</td>
</tr>
<tr>
<td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF">
<span class="no-style-override-12a"><p>Banco Emisor : </p></span>
</td>
<td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="73%">
<input type=text name="emisor" size="40" maxlength="35"></td>
</tr>
<tr>
<td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" >
<span class="no-style-override-12a"  ><b>Numero : </b></span>
</td>
<td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="73%">
<input type="text" name="numero" id="numero" size="20" maxlength="16" autocomplete="off"  ></td><br>
</tr>
<tr>
<td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" >
<span class="no-style-override-12a"><br><p>Tipo : </p></span>
</td>
<td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="73%" >
<select  name="tipo" >
<option selected>Visa</option>
<option>Mastercard</option>
</select>

</td>
</tr>
<tr>
<td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" >
<span class="no-style-override-12a"><p>Fecha Vencimiento : </p></span>
</td>
<td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" >
<select size="1" name="mesv" >
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
</select> //
<select size="1" name="aniov">
<option><?php echo date('Y');?></option>
<?php
for ($j=1;$j<=10;$j++)
{
$anio=date('Y')+$j;
echo '<option>'.$anio.'</option>';
}
?>
</select>
</td>
</tr>
<tr>
<td colspan=2 bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF">
&nbsp;
</td>
</tr>
<tr>
<td colspan=2 bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF">
&nbsp;
</td>
</tr>
<tr>
<td colspan=2 bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF">
<p class="basic-paragraph basic-paragraph-override-2">
<span class="no-style-override-12">Valores reflejados no incluyen IVA.</span></p>
<input type="hidden" name="idcliente" value='0'>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="4" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" align="right">
<table>
<tr>
<td align="right">
<input type="submit" name="btnComprar" Value="Ejecutar Compra" />
</td>
<td>
&nbsp;
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</form>

  </div>
</div>
<!-- aqui finaliza el model...-->
<script>
	function mostrarModal(){
		
		$('#modal_editar').modal();
	}	

	   function valtarjeta(){

       }
</script>

    <?php
    }else{
        echo 'No hay productos en el carrito de compras<br>
        <a type="button" href="productos.php"><img src="img/continuar.png"></a>';

        
        
        
    }
    ?>
</center>
</body>
</html>    
<?php  include 'pie.php'; ?>