<?php include ("vista/cabecera.php"); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Multiusuarios PHP MySQL: Niveles de Usuarios</title>

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

		
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../js/jquery-1.12.4-jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 20px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
	<body>

	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		 
			<center>
				<h1>AREA USUARIO</h1>
				<h3>
				<!-- <?php
				session_start();

				if(!isset($_SESSION['usuarios_login']))	
				{
					header("location: ../index.php");
				}

				if(isset($_SESSION['admin_login']))	
				{
					header("location: ../admin/admin_portada.php");
				}

				if(isset($_SESSION['personal_login']))	
				{
					header("location: ../personal/personal_portada.php");
				}

				if(isset($_SESSION['user_login']))
				{
				?>

				<?php
						echo $_SESSION['usuarios_login'];
				}
				?> -->
				</h3>
			</center>
			
		</div>
	
	
   
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
     <div class="card-header"><h3>Tabla de Usuarios</h3 ></div>
         <div class="card-body">
<table class="table  table-striped table-bordered table-hover display " id="tablaregistro">
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
    <tbody >
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
		</tr>
            
        <?php
      }
      ?>
    </tbody>
</table>
       
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
<br><br><br>
	
	</body>
</html>

<?php include ("vista/pie.php"); ?>