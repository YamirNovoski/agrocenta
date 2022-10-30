<?php include ('cabeza.php') ?>
<link rel="stylesheet" href="assets/css/nice-select.css">

<div class="container">
	<div class="form">
		<!--Survey form start-->
		<form name="FrmEnc" id="FrmEnc" method="POST" action="enc_envio.php" onsubmit="return ValidSurvey()">
			<table width="100%">
				<tr height="55">
					<td colspan="2" align="Center"><h1>Encuesta al usuario</h1></td>
				</tr>
				<tr height="55">
					<td>&nbsp;&nbsp;1.- Ingresa tu nombre:</td>
					<td>
						&nbsp;<input type="text" name="Nom" id="Nom" onkeypress="return SoloLetras(event);" onpaste="return false" min="2" maxlength="20" placeholder="Ingresa tu nombre">
					</td>
				</tr>
				<tr height="55">
					<td>&nbsp;&nbsp;2.- Ingresa tu apellido:</td>
					<td>
						&nbsp;<input type="text" name="Ape" id="Ape" onkeypress="return SoloLetras(event);" onpaste="return false" min="2" maxlength="20" placeholder="Ingresa tu apellido">
					</td>
				</tr>
				<tr height="55">
					<td>&nbsp;&nbsp;3.- Selecciona tu genero:</td>
					<td>
						&nbsp;<input type="radio" name="Sexo" value="Masculino" id="Sexo[]" /> Masculino &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="Sexo" value="Femenino" id="Sexo[]" /> Femenino &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="Sexo" value="Prefiero no decirlo" id="Sexo[]" /> Prefiero no decirlo
					</td>
				</tr>
				<tr height="55">
					<td>&nbsp;&nbsp;4.- Selecciona tu pais:</td>
					<td>
						&nbsp;<select name="Sel_Pais" id="Sel_Pais">
							<option value="0">Seleccione...</option>
							<option value="Mexico">Mexico</option>
							<option value="Guatemala">Guatemala</option>
							<option value="Belize">Belize</option>
							<option value="Honduras">Honduras</option>
							<option value="El Salvador">El Salvador</option>
							<option value="Nicaragua<">Nicaragua</option>
							<option value="Costa Rica">Costa Rica</option>
							<option value="Panama">Panama</option>
							<option value="Otro">Otro</option>
						</select>
					</td>
				</tr>
				<tr height="55">
					<td>&nbsp;&nbsp;5.- ¿Que te parecio nuestra pagina?</td>
					<td>
						&nbsp;<input type="radio" name="Precio" value="Muy Mala" id="Precio[]" /> Muy Mala &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="Precio" value="Mala" id="Precio[]" /> Mala &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="Precio" value="Regular" id="Precio[]" /> Regular &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="Precio" value="Buena" id="Precio[]" /> Buena &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="Precio" value="Muy Buena" id="Precio[]" /> Muy Buena &nbsp;&nbsp;&nbsp;
					</td>
				</tr>
				<tr height="55">
					<td>&nbsp;&nbsp;6.- ¿Que te parecieron las marcas de nuestros productos?</td>
					<td>
						&nbsp;<input type="radio" name="ProCal" value="Muy Malas" id="ProCal[]" /> Muy Malas &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="ProCal" value="Malas" id="ProCal[]" /> Malas &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="ProCal" value="Regular" id="ProCal[]" /> Regular &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="ProCal" value="Buenas" id="ProCal[]" /> Buenas &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="ProCal" value="Muy Buena" id="ProCal[]" /> Muy Buenas &nbsp;&nbsp;&nbsp;
					</td>
				</tr>
				<tr height="55">
					<td>&nbsp;&nbsp;7.- ¿Encontraste el producto que buscabas?</td>
					<td>
						&nbsp;<input type="radio" name="Produ" value="Si" id="Produ[]" /> Si &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="Produ" value="Si, pero de otra marca" id="Produ[]" /> Si, pero de otra marca &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="Produ" value="No" id="Produ[]" /> No 
					</td>
				</tr>
				<tr height="55">
					<td>&nbsp;&nbsp;8.- ¿Que tipo de categoria de productos te llamo mas la atencion?</td>
					<td>
						&nbsp;
							<select id="Sel_Prod" name="Sel_Prod">

	                              <?php 
	                                  include 'conexion.php';
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
				<tr height="55">
					<td>&nbsp;&nbsp;9.- ¿Fue facil para ti navegar en la seccion de productos?</td>
					<td>
						&nbsp;<input type="radio" name="ProDif" value="Si, bastante" id="ProDif[]" /> Si, bastante &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="ProDif" value="Si, un poco" id="ProDif[]" /> Si, un poco &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="ProDif" value="No, para nada" id="ProDif[]" /> No, para nada &nbsp;&nbsp;&nbsp;

					</td>
				</tr>
				<tr height="55">
					<td>&nbsp;&nbsp;10.- ¿Que te parecieron los precios a comparacion de la competencia?</td>
					<td>
						&nbsp;
						<select name="Sel_Pre" id="Sel_Pre">
							<option value="0"> Seleccione... </option>
							<option value="Son mucho mejor"> Son mucho mejor </option>
							<option value="Los precios se mantienen"> Los precios se mantienen </option>
							<option value="Es mas barato en otro website"> Es mas barato en otro website </option>
						</select>
					</td>
				</tr>
				<tr height="55">
					<td>&nbsp;&nbsp;11.- ¿Que tan frecuente visitas nuestra pagina?</td>
					<td>
						&nbsp;
						<select name="Visita" id="Visita">
							<option value="0"> Seleccione... </option>
							<option value="Todos los dias"> Todos los dias </option>
							<option value="Dos o mas veces a la semana"> Dos o mas veces a la semana </option>
							<option value="Una vez a la semana"> Una vez a la semana </option>
							<option value="Dos o mas veces al mes"> Dos o mas veces al mes </option>
							<option value="Una vez al mes"> Una vez al mes </option>
							<option value="De vez en cuando"> De vez en cuando </option>
							<option value="Casi nunca"> Casi nunca </option>
						</select>
					</td>
				</tr>
				<tr height="55">
					<td>&nbsp;&nbsp;12.- ¿Recomendarias esta pagina a tus familiares o amigos?</td>
					<td>
						&nbsp;<input type="radio" name="Recom" value="Si" id="Recom[]" /> Si &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="Recom" value="Talvez" id="Recom[]" /> Talvez &nbsp;&nbsp;&nbsp;
						&nbsp;<input type="radio" name="Recom" value="No" id="Recom[]" /> No 
					</td>
				</tr>
				<tr height="55">
					<td>&nbsp;&nbsp;13.- Enviamos tu comentario extra, si no tienes puedes digitar N/A</td>
					<td>
						<br> &nbsp;
						<textarea name="Ext_com" rows="6" cols="44" id="Ext_com" onpaste="return false" min="3" maxlength="150" required> </textarea>
						<br> &nbsp;
					</td>
				</tr>
				<tr height="55">
					<td colspan="2" align="Center">
						
						<button type="submit" class="btn btn-dark">Completar Encuesta</button>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="reset" class="btn btn-danger">Cancelar y Borrar</button>

					</td>
				</tr>
			</table>
		</form>
		<!--Survey form end-->
	</div>
</div> 

<!--Survey js here-->
<script src="assets/js/ValSur.js"></script>
<script>
    
<?php 

if (isset($_GET['mensaje'])) {
    echo "Swal.fire(
                        'Mensaje',
                        '".$_GET['mensaje']."',
                        'success'
                        );";
}

if (isset($_GET['error'])) {
   echo "Swal.fire({
                    icon: 'error',
                    title: 'Problemas',
                    text: '".$_GET['error']."'
                });";
}

 ?> 
</script>
<?php include 'pie.php'; ?>

