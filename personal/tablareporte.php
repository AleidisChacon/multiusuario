<?php include("vista/cabecera.php");?>

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

   <br><br>
   

<?php
  $conexion = mysqli_connect("broyoiqme71mn4yyurpz-mysql.services.clever-cloud.com", "u87hu0u2migrl8yy", "EB3pfSrh4BgIv35VRtBO", "broyoiqme71mn4yyurpz") or
  die("Problemas con la conexión");

    if ($_POST){
      $numsituacion=$_POST['numsituacion'];
      $accion=$_POST['accion'];
  
  switch ($accion) {
   case "Borrar": 
     $registros = mysqli_query($conexion, "delete from reportes where numsituacion=$numsituacion");
    break;

    case "Registrar": 
      mysqli_query($conexion, "insert into reportes(nombre,apellido,area,tipo,nivelgravedad,fecha,hora,observacion) values 
      ('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[area]','$_REQUEST[tipo]','$_REQUEST[nivelgravedad]','$_REQUEST[fecha]','$_REQUEST[hora]','$_REQUEST[observacion]')")
      or die("Problemas en el select" . mysqli_error($conexion));
      header("location:tablareporte.php");
      mysqli_close($conexion);
break;
    
   default:
     echo "No existe";
  }
  }
  $registros = mysqli_query($conexion, "select * from reportes") or
    die("Problemas en el select:" . mysqli_error($conexion));
   
    ?>

<center>
<div class="card" >
     <div class="card-header"><h3>TABLA DE REGISTRO</h3></div>
         <div class="card-body">
<table class="table  table-striped table-bordered table-hover display"  id="tablaregistro">
    <thead>
    <tr>
        <th> Numerosituacion </th>
        <th> Nombre </th>
        <th> Apellido </th>
        <th> Area </th>
        <th> Tipo Gravedad </th>
        <th> Nivel Gravedad </th>
        <th> Fecha </th>
        <th> Hora </th>
        <th> Observacion </th>
       
    </tr>
    </thead>
    <tbody>
        <tr>
         <?php
        while ($reg = mysqli_fetch_array($registros)) { ?> 
            <td> <?php echo  $reg['numsituacion'] . "<br>"; ?></td>
           <td> <?php echo  $reg['nombre'] . "<br>"; ?></td>
           <td> <?php echo  $reg['apellido'] . "<br>"; ?></td>
           <td> <?php echo $reg['area'] . "<br>"; ?></td>
           <td> <?php echo  $reg['tipo'] . "<br>"; ?></td>
           <td> <?php echo  $reg['nivelgravedad'] . "<br>"; ?></td>
           <td> <?php echo $reg['fecha'] . "<br>"; ?></td>
           <td> <?php  echo $reg['hora'] . "<br>"; ?></td>
           <td> <?php  echo  $reg['observacion'] . "<br>"; ?></td>

            <td> <form action="modificar.php" method="post"> 
            <input type="hidden" name="numsituacion" value="<?php echo $reg['numsituacion'] ; ?>">
            <button type="submit" class="btn btn-success">Editar</button> </form></td>
          
            <td><form action="" method="post">
            <input type="hidden" name="numsituacion" value="<?php echo $reg['numsituacion'] ; ?>">
            <button type="submit" class="btn btn-danger" name="accion" value="Borrar">Borrar</button></form></td> 
            </tr>
        <?php
      }
      ?>
    </tbody>
</table>
          <center>
            <div>
            <a href="personal_portada.php">
            <button type="submit" class="btn btn-primary" name="accion" >Nuevo Registro</button></a>
            </div>
          </center>
</div>
</div>
</div>

<script>
    var tabla=document.querySelector("#tablaregistro");

    var dataTable = new DataTable(tabla,{
      perPage:3,
      perPageSelect:[3,6,9,12]
    });
  </script>
</center>

</div>		
	</div>	
<?php include("vista/pie.php");?>

