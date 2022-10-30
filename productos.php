<?php  include ('cabeza.php') ?>
<?php
//Forma contractada del IF se usa cuando las intrucciones son UNA SOLA en ambas respuestas
if(isset($_SESSION['carro']))
    $carro=$_SESSION['carro'];else $carro=false;
?>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="assets/js/pinterest_grid.js"></script>
	<script src="./assets/js/main.js"></script>

<div class="container">
	<div class="row">
		<?php include ('conexion.php');
		$query = "SELECT * FROM producto";
		$resultado = $conexion-> query($query);
		while ($row=$resultado->fetch_assoc()) {
?>

	<div class="col-lg-4">
					<div class="card" >
					  <?php  echo "<img style='height:150px;	' class='card-img-top' src=data:image/png;base64," . (base64_encode(($row['imagen']))) . " >"; ?>
					  <div class="card-body">
					  <h3 class="card-title"><?php echo $row['nombre']; ?></h3>
					   <p class="card-text"><?php echo $row['descripcion']; ?></p>
					  <a href="#" class="btn-lg btn-success btn-block"> PRECIO: $ <?php echo $row['precio']; ?></a><br>
					  	 <div class="row">
					        <div class="col-lg-6">
					        	<div class="col-lg-6" align="right">

	<?php
		if(!$carro || !isset($carro[md5($row['id'])]['identificador']) || $carro[md5($row['id'])]['identificador']!=md5($row['id'])) {
              echo '<a 	title="Comprar" href="addcarrito.php?id='.$row['id'].'" onclick="a();"><img src="img/add.png" width="200" height="75"  align="center"> </a><br>'; 
               
            }else{
                //Si el producto YA esta en el carrito
                echo    '<a  title="Eliminar"   href="borrarcarrito.php?id='.$row['id'].'" onclick="e();"><img src="img/eli.png" width="200" height="75" align="center"></a>' ;
        }
    ?>
					         	
					        </div>
					         </div>
					       
					    </div>
					  </div>
					</div>
				</div>
			<?php } ?>

	</div>
</div>

<script type="text/javascript">
	
	function a(){

		alert('Producto agregado a carrito');
	}

	function e(){

		alert("Producto  Eliminado de Carrito");
	}
</script>


<?php include 'pie.php'; ?>