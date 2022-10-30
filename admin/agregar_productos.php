<?php require 'header.php'; ?>
<?php if (!isset($_SESSION['id']) || $_SESSION['rol']!=1) {header('location: logout.php');}
include ('../conexion.php');
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="header">
			<h2>
				Productos
			</h2>			
		</div>
		<div class="body">


			<style type="text/css">
				#brown{
					color:brown;
					text-align: center;
				}

				#azul{
					color:blue;
				}	

			</style>


<?php if (isset($_GET['mensaje'])): ?>
	<h4 style="color: red" class="animated flash">*<?= $_GET['mensaje']?></h4>
<?php endif ?>


			<div align="center">
				<h1 id="brown">INGRESAR NUEVO PRODUCTO</h1>
			</div>
			<div align="center"  >
				<form name="Producto" id="prod" method="post" enctype="multipart/form-data" action="guardar_productos.php">
					<table border="0" id="azul" align="center">
						<tr height="50">
							<td height="50">Ingrese Nombre del Producto<span lang="en-us">:</span> </td>
							<td><input type="text" name="Nombre" id="Nombre" class="selection"  required placeholder="Escriba un nombre" onpaste="return false" ></td>
						</tr>	
						<tr height="50">
							<td>Categoria:</td>
							<td>
								<select name="Categoria" id="categoria">
									<?php 
									include '../conexion.php';
									$consulta = "SELECT * FROM categorias";
									$ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
									?>

									<?php foreach ($ejecutar as $opciones): ?>

										<option value="<?php echo $opciones['id']?>">
											<?php echo $opciones['nombre']?>
										</option>

									<?php endforeach ?>
								</select>
							</td>
						</tr>	
						<tr height="50">
							<td>Ingrese Cantidad:</td>
							<td><input type="text" name="Cantidad" id="Cantidad" pattern="^\d+$" placeholder="Ingrese solo numeros" required="Solo puede ingresar numeros" onpaste="return false"></td>
						</tr>	
						<tr height="50">
							<td>Precio Unitario</td>
							<td><input type="text" name="Precio" id="precio"  required onpaste="return false"></td>
						</tr>
						<tr height="50">
							<td>Provedor</td>
							<td><input type="text" name="Provedor" id="provedor" placeholder="Nombre de provedor" required onpaste="return false" onkeypress="return SoloLetras(event);"></td>
						</tr>	
						<tr height="50">
							<td>Imagen del Producto: </td>
							<td>
								<input type="file" id="archivoInput" name="Imagen" placeholder="Seleccione Archivo" required />
							</td>
						</tr -->
						<tr height="50">
							<td>Descripcion: </td>
							<td><textarea name="Comentario" id="comentario" rows="2" cols="40" maxlength="40" onpaste="return false"> </textarea></td>
						</tr>	
						<tr height="50">
							<td colspan="2" align="center"><br>
								<button type="submit" name="btn" value="Guardar" class="btn btn-succes" heigth="50">Guardar<i class="fas fa-save"></i></button>

							</td>
						</tr>
					</table>

				</form>
			</div>
		</div>
	</div>
</div>


<?php require 'footer.php'; ?>