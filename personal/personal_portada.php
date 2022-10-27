<?php include("vista/cabecera.php");?>
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
</head>		
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
      <h1>AREA PERSONAL</h1>

			<!-- 	<h3>
				<?php
				
				session_start();

				if(!isset($_SESSION['personal_login']))	
				{
					header("location: ../index.php");
				}

				if(isset($_SESSION['admin_login']))	
				{
					header("location: ../admin/admin_portada.php");
				}

				if(isset($_SESSION['usuarios_login']))	
				{
					header("location: ../usuarios/usuarios_portada.php");
				}
				
				if(isset($_SESSION['personal_login']))
				{
				?> -->
				
				<!-- <?php
					echo $_SESSION['personal_login'];
				}
				?> -->
				</h3>
			</center>
		</div>

           <center>
          <div class="card" style=" width: 1200px; height: 80 0px; border-radius: 10px; border: solid 1px black; margin-top:30px;">
            <div class="card-header"><h1>Registro Situacion</h1></div>
            <div class="card-body">
            <form action="../conexion.php" method="post" >
            <div class="row">
              <div class="col">
                <label for="">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombres" name="nombre">
              </div>
              <div class="col">
                <label for="" >Apellido</label>
                <input type="text" class="form-control" placeholder="Apellidos" name="apellido">
              </div>
            </div>
            <br>
            <div class="form-group col">
              <label for=""> Area accidente</label>
                <input type="text" class="form-control" placeholder="ingresa el area del accidente" name="area">
            </div>
            
            <div class="col">
                <label for="" >Tipo de gravedad</label>
                <input type="text" class="form-control" placeholder="escribe el tipo de gravedad" name="tipo">
              </div>
            </div>
  
            <div class="form-group col">
              <label for="">Nivel de gravedad</label>
                <select id="disabledSelect" class="form-control" name="nivelgravedad">
                  <option disabled selected>Seleccione el nivel de gravedad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                
                </select>
            </div>
            
            <div class="form-group col">
              <label for="">Fecha</label>
                <input type="date" class="form-control" placeholder="ingresa la fecha" name="fecha">
            </div>
            <div class="form-group col">
              <label for="">Hora</label>
                <input type="datetime" class="form-control" placeholder="ingresa la hora" name="hora">
            </div>
            <div class="form-group col">
              <label for="">Observaciones</label>
              <textarea class="form-control" name="observacion" id="" cols="30" rows="10" placeholder="escribe la observacion"></textarea>
            </div>
            <div class="card-footer">
               <button type="submit" class="btn btn-primary" value="Registrar">Guardar</button>
            </div>
          </div>
          </div>

          </form>
          </center>
		
		  </div>	
	</div>
</body>
</html>
<br><br>

