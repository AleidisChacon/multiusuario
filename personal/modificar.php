    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="https://kit.fontawesome.com/1a3d6caaee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="estilos/style.css">
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/e1187442ed.js" crossorigin="anonymous"></script>



<?php

$conexion = mysqli_connect("broyoiqme71mn4yyurpz-mysql.services.clever-cloud.com", "u87hu0u2migrl8yy", "EB3pfSrh4BgIv35VRtBO", "broyoiqme71mn4yyurpz") or
die("Problemas con la conexión");
    
    
$registros = mysqli_query($conexion, "select numsituacion,nombre,apellido,area,tipo,nivelgravedad,fecha,hora,observacion  from reportes where numsituacion='$_REQUEST[numsituacion]'") or
die("Problemas en el select:" . mysqli_error($conexion));
 
?>

        <center>
          <div class="card" style=" width: 1200px; height: 80 0px; border-radius: 10px; border: solid 1px black; margin-top: 30px;">
            <div class="card-header"><h1>REGISTRO DE SITUACIÓN</h1></div>
            <div class="card-body">
            <form action="modificar2.php" method="post" >
            <div class="row">
            <?php
            if ($reg = mysqli_fetch_array($registros)) { ?>
              <div class="col">
                <label for="">Nº Situacion</label>
                <input type="text" required readonly class="form-control" placeholder="" name="numsituacion" value="<?php echo $reg['numsituacion'] ; ?> ">
              </div>
              <div class="col">
                <label for="" >Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nombre"  value="<?php echo $reg['nombre'] ; ?> ">
              </div>
              <div class="col">
                <label for="" >Apellido</label>
                <input type="text" class="form-control" placeholder="Apellidos" name="apellido"  value="<?php echo $reg['apellido'] ; ?> ">
              </div>
            </div>
            <br>
            <div class="form-group col">
              <label for=""> Area accidente</label>
                <input type="text" class="form-control" placeholder="ingresa el area del accidente" name="area"  value="<?php echo $reg['area'] ; ?> ">
            </div>
            
            <div class="col">
                <label for="" >Tipo de gravedad</label>
                <input type="text" class="form-control" placeholder="escribe el tipo de gravedad" name="tipo"  value="<?php echo $reg['tipo'] ; ?> ">
              </div>
            </div>
  
            <div class="form-group col">
              <label for="">Nivel de gravedad</label>
                <select id="disabledSelect" class="form-control" name="nivelgravedad"  value="<?php echo $reg['nivelgravedad'] ; ?> ">
                  <option disabled selected>Seleccione el nivel de gravedad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
            </div>
            
            <div class="form-group col">
              <label for="">Fecha</label>
                <input type="date" class="form-control" placeholder="ingresa la fecha" name="fecha"  value="<?php echo $reg['fecha'] ; ?> ">
            </div>
            <div class="form-group col">
              <label for="">Hora</label>
                <input type="datetime" class="form-control" placeholder="ingresa la hora" name="hora"  value="<?php echo $reg['hora'] ; ?> ">
            </div>
            <div class="form-group col">
              <label for="">Observaciones</label>
              <textarea class="form-control" name="observacion" id="" cols="30" rows="10" placeholder="escribe la observacion"  value="<?php echo $reg['observacion'] ; ?> "></textarea>
            </div>
            <div class="card-footer">
               <button type="submit" class="btn btn-primary" value="editar">Guardar</button>
            </div>
          </div>
          </div>
          <?php   }  ?>
          </form>
          </center>
<br><br>

     