<?php include 'cabeza.php'; ?>
<link rel="stylesheet" href="assets/css/sweetalert2.min.css">
<script src="./assets/js/sweetalert2.all.min.js"></script>
<style>
  * {box-sizing: border-box}

  /* Add padding to containers */
  .container {
    padding: 16px;
  }

  /* Full-width input fields */
  input[type=text], input[type=email], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
  }

  input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }

  /* Overwrite default styles of hr */
  hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
  }

  /* Set a style for the submit/register button */
  .registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }

  .registerbtn:hover {
    opacity:1;
  }

  /* Add a blue text color to links */
  a {
    color: dodgerblue;
  }

  /* Set a grey background color and center the text of the "sign in" section */
  .signin {
    background-color: #f1f1f1;
    text-align: center;
  }
</style>

<div class="container">
<div class="cargando animated infinited flash" style="display: none;"><h2>Procesando <span class="fa fa-spinner fa-spin"></span></h2></div>
  <form action="#" id="formulario" name="formulario">
    <div class="container">

      <h1>¿Eres nuevo? Registrate con nosotros</h1>

      <p>Es muy facil y sencillo, solo tienes que llenar el siguiente formulario.</p>
      <hr>

      <!--Nombre y apellido-->
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="nombre"><b>Nombre</b></label>
            <input type="text" placeholder="Ingrese su nombre" name="nombre" id="nombre" onkeypress="return SoloLetras(event);" onpaste="return false" min="2" maxlength="30" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="apellido"><b>Apellido</b></label>
            <input type="text" placeholder="Ingrese su apellido" name="apellido" id="apellido" onkeypress="return SoloLetras(event);" onpaste="return false" min="2" maxlength="30" required>
          </div>
        </div>
      </div>
      <!--Usuario, Telefono y Correo-->
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="username"><b>Nombre de usuario</b></label>
            <input type="text" placeholder="Ingrese su nombre de usuario" name="username" id="username" required>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Ingrese Email" name="email" id="email" required>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="telefono"><b>Telefono</b></label>
            <input type="text" placeholder="Ingrese su numero telefonico" name="telefono" id="telefono" min="8" maxlength="8" required>
          </div>
        </div>
      </div>
      <!--Departamento y Municipio-->
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="direccion"><b>Dirección</b></label>
            <input type="text" placeholder="Ingrese su dirección" name="direccion" required>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="departamento"><b>Departamento</b></label>
            <br />

            <select id="dptos" name="dptos">

              <?php 
              include 'conexion.php';
              $consulta = "SELECT * FROM departamentos";
              $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
              ?>

              <?php foreach ($ejecutar as $opciones): ?>

                <option value="<?php echo $opciones['cod_dpto']?>">
                  <?php echo $opciones['nom_dpto']?>
                </option>

              <?php endforeach ?>

            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div id="lis_mun" class="form-group">

          </div>
        </div>

      </div>

      <!--Contraseña-->
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="psw"><b>Contraseña</b></label>
            <input type="password" placeholder="Ingrese contraseña" name="psw" id="psw" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="psw-repeat"><b>Confirme su contraseña</b></label>
            <input type="password" placeholder="Repita su contraseña" name="psw-repeat" id="psw-repeat" required>
          </div>
        </div>
      </div>

      <hr>

      <p>Esta de acuerdo con nuestras <a href="#">Politicas de privacidad</a>.</p>
      <button type="submit" class="registerbtn">Registrarme</button>

    </div>

    <div class="container signin">
      <p>Ya tengo cuenta <a href="login.php">Login</a>.</p>
    </div>
  </form>

</div>
<?php include 'pie.php' ?>
<
<script type="text/javascript">
  $(document).ready(function(){
    $('#dptos').val(1);
    recargarLista();

    $('#dptos').change(function(){
      recargarLista();
    });
  })
</script>
<script type="text/javascript">
  function recargarLista(){
    $.ajax({
      type:"POST",
      url:"datamun.php",
      data:"depart=" + $('#dptos').val(),
      success:function(r){
        $('#lis_mun').html(r);
      }
    });
  }

  $('#formulario').submit(function(event) {
    event.preventDefault();


    let nombre = $('#nombre').val();
    let apellido = $('#apellido').val();
    let username = $('#username').val();
    let email = $('#email').val();
    let telefono = $('#telefono').val();
    let dptos = $('#dptos').val();
    let muni = $('#muni').val();
    let psw  = $('#psw').val();
    let pswrepeat = $('#psw-repeat').val();

    if(psw != pswrepeat){
      Swal.fire('Mensaje', "Los password no concuerdan", 'question'); 
    }

    $('.cargando').show();

    



    $.ajax({
        url: 'peticiones.php',
        type: 'POST',
        dataType: 'json',
        data: {registrar: 'asdGsdf/678&/(fbrtyYH$%Efgsdg$', 
        nombre: nombre,
        apellido: apellido,
        username: username,
        email: email,
        telefono: telefono,
        dptos: dptos,
        muni: muni,
        psw: psw,
        pswrepeat: pswrepeat,


      },
      })
      /*$sdf546*/
      .done(function(data) {
        if (data.exito==1) {
          let timerInterval
          Swal.fire({
            title: 'Registrado con exito '+data.nombre,
            html: 'Entrando siendo redirigido',
            timer: 2000,
            timerProgressBar: true,
            onBeforeOpen: () => {
              Swal.showLoading()
              timerInterval = setInterval(() => {
                const content = Swal.getContent()
                if (content) {
                  const b = content.querySelector('b')
                  if (b) {
                    b.textContent = Swal.getTimerLeft()
                  }
                }
              }, 100)
            },
            onClose: () => {
              clearInterval(timerInterval)
            }
          }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
              location.href = data.redireccion;
            }
          })

        }else{
          Swal.fire(
            'Mensaje',
            data.mensaje,
            'question'
            );
        }
        
      })
      .fail(function() {
        Swal.fire({
          icon: 'error',
          title: 'Problemas',
          text: 'No se pudo realizar la petición',
          footer: 'Verifique la conexion a datos'
        });
      })
      .always(function() {
        $('.cargando').hide();
      });
    





  });

</script>

<script src="assets/js/ValSur.js"></script>