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
				<h1>AREA ADMINISTRATIVA</h1>
				
			<!-- 	<h3>
				<?php
				session_start();

				if(!isset($_SESSION['admin_login']))	
				{
					header("location: ../index.php");  
				}

				if(isset($_SESSION['personal_login']))	
				{
					header("location: ../personal/personal_portada.php");	
				}

				if(isset($_SESSION['usuarios_login']))	
				{
					header("location: ../usuarios/usuarios_portada.php");
				}
				
				if(isset($_SESSION['admin_login']))
				{
				?>
	
				<?php
					
				}
				?>
				</h3> -->
					
				<?php
  $conexion = mysqli_connect("broyoiqme71mn4yyurpz-mysql.services.clever-cloud.com", "u87hu0u2migrl8yy", "EB3pfSrh4BgIv35VRtBO", "broyoiqme71mn4yyurpz") or
  die("Problemas con la conexión");

    if ($_POST){
      $id=$_POST['id'];
      $accion=$_POST['accion'];
  
  switch ($accion) {
   case "Borrar": 
     $registros = mysqli_query($conexion, "delete from mainlogin where id=$id");
    break;

    case "Registrar": 
      mysqli_query($conexion, "insert into mainlogin(username,email,password,role) values 
      ('$_REQUEST[username]','$_REQUEST[email]','$_REQUEST[password]','$_REQUEST[role]')")
      or die("Problemas en el select" . mysqli_error($conexion));
      header("location:admin_portada.php");
      mysqli_close($conexion);
break;
    
   default:
     echo "No existe";
  }
  }
  $registros = mysqli_query($conexion, "select * from mainlogin") or
    die("Problemas en el select:" . mysqli_error($conexion));
   
    ?>

			</center>
			
            <hr>
		</div>
		<br><br><br>
		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Panel de usuarios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tablaregistro">
                                    <thead>
                                        <tr>
                                            <th width="4%">ID</th>
                                            <th width="18%">Usuario</th>
                                            <th width="24%">Email</th>
                                            <th width="19%">Rol</th>
                                            <th width="24%">Password</th>
											<th colspan="2">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
								/* 	require_once '../DBconect.php';
									$select_stmt=$db->prepare("SELECT id,username,email,role FROM mainlogin");
									$select_stmt->execute(); */
									
									while ($reg = mysqli_fetch_array($registros)) 
									{
									?>
                                        <tr>
                                            <td><?php echo $reg["id"]; ?></td>
                                            <td><?php echo $reg["username"]; ?></td>
                                            <td><?php echo $reg["email"]; ?></td>
                                            <td><?php echo $reg["role"]; ?></td>
                                            <td>*******</td>
											<td> <form action="editar.php" method="post"> 
											<input type="hidden" name="id" value="<?php echo $reg['id'] ; ?>">
											<button type="submit" class="btn btn-success">Editar</button> </form></td>
										
											<td><form action="" method="post">
											<input type="hidden" name="id" value="<?php echo $reg['id'] ; ?>">
											<button type="submit" class="btn btn-danger" name="accion" value="Borrar">Borrar</button></form></td> 
                                        </tr>
									<?php 
									}
									?>
                                    </tbody>
                                </table>
                                <a href="../cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
            
			                    <a href="registro.php" ><button class="btn btn-success text-right"><span  aria-hidden="true"></span>Crear Rol</button></a>
                            </div>
                        </div>
                    </div>
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
    
    <br><br>
	</body>
</html>

<?php include ("vista/pie.php"); ?>