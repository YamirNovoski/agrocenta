<?php  include ('cabeza.php') ?>

<div class="container">

<style type="text/css">
#brown{
	color:brown;
	text-align: center;
}

#azul{
	color:blue;
}	

</style>

	<div align="center">
		<h1 id="brown">INGRESAR NUEVO PRODUCTO</h1>
	</div>
	<div align="center"  >
		<form name="Producto" id="prod" method="post" enctype="multipart/form-data" action="guardar.php">
			<table border="0" id="azul" align="center">
				<tr height="50">
					<td height="50">Ingrese Nombre del Producto<span lang="en-us">:</span> </td>
					<td><input type="text" name="Nombre" id="Nombre" class="selection"  required placeholder="Escriba un nombre" onpaste="return false" ></td>
				</tr>	
				<tr height="50">
					<td>Categoria:</td>
					<td>
						<select name="Categoria" id="categoria">
							<option value="1">Herramientas</option>
							<option value="2">Decoracion</option>
							<option value="3">Plantas</option>
							<option value="4">Otra</option>
						</select>
					</td>
				</tr>	
				<tr height="50">
					<td>Ingrese Cantidad:</td>
					<td><input type="text" name="Cantidad" id="Cantidad" pattern="^\d+$" placeholder="Ingrese solo numeros" required="Solo puede ingresar numeros" onpaste="return false"></td>
				</tr>	
				<tr height="50">
					<td>Precio Unitario</td>
					<td><input type="text" name="Precio" id="precio" pattern="^[0-9]{1,3}([\\,][0-9]{3})*[\\.][0-9]{2}$" placeholder="0.00 " required onpaste="return false"></td>
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

<script src="assets/js/ValSur.js"></script>

<?php include 'pie.php'; ?>