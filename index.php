<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Multiusuarios PHP MySQL: Niveles de Usuarios</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>


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
	<body class="bbody">
<?php
require_once 'DBconect.php';
session_start();
if(isset($_SESSION["admin_login"]))	//Condicion admin
{
	header("location: admin/admin_portada.php");	
}
if(isset($_SESSION["personal_login"]))	//Condicion personal
{
	header("location: personal/personal_portada.php"); 
}
if(isset($_SESSION["usuarios_login"]))	//Condicion Usuarios
{
	header("location: usuarios/usuarios_portada.php");
}

if(isset($_REQUEST['btn_login']))	
{
	$email		=$_REQUEST["txt_email"];	//textbox nombre "txt_email"
	$password	=$_REQUEST["txt_password"];	//textbox nombre "txt_password"
	$role		=$_REQUEST["txt_role"];		//select opcion nombre "txt_role"
		
	if(empty($email)){						
		$errorMsg[]="Por favor ingrese Email";	//Revisar email
	}
	else if(empty($password)){
		$errorMsg[]="Por favor ingrese Password";	//Revisar password vacio
	}
	else if(empty($role)){
		$errorMsg[]="Por favor seleccione rol ";	//Revisar rol vacio
	}
	else if($email AND $password AND $role)
	{
		try
		{
			$select_stmt=$db->prepare("SELECT email,password,role FROM mainlogin
										WHERE
										email=:uemail AND password=:upassword AND role=:urole"); 
			$select_stmt->bindParam(":uemail",$email);
			$select_stmt->bindParam(":upassword",$password);
			$select_stmt->bindParam(":urole",$role);
			$select_stmt->execute();	//execute query
					
			while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))	
			{
				$dbemail	=$row["email"];
				$dbpassword	=$row["password"];
				$dbrole		=$row["role"];
			}
			if($email!=null AND $password!=null AND $role!=null)	
			{
				if($select_stmt->rowCount()>0)
				{
					if($email==$dbemail and $password==$dbpassword and $role==$dbrole)
					{
						switch($dbrole)		//inicio de sesión de usuario base de roles
						{
							case "admin":
								$_SESSION["admin_login"]=$email;			
								$loginMsg="Admin: Inicio sesión con éxito";	
								header("refresh:3;admin/admin_portada.php");	
								break;
								
							case "personal";
								$_SESSION["personal_login"]=$email;				
								$loginMsg="Personal: Inicio sesión con éxito";		
								header("refresh:3;personal/personal_portada.php");	
								break;
								
							case "usuarios":
								$_SESSION["usuarios_login"]=$email;				
								$loginMsg="Usuario: Inicio sesión con éxito";	
								header("refresh:3;usuarios/usuarios_portada.php");		
								break;
								
							default:
								$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
						}
					}
					else
					{
						$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
					}
				}
				else
				{
					$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
				}
			}
			else
			{
				$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}		
	}
	else
	{
		$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
	}
}
include("header.php");
?>

	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		
		<?php
		if(isset($errorMsg))
		{
			foreach($errorMsg as $error)
			{
			?>
				<div class="alert alert-danger">
					<strong><?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
		if(isset($loginMsg))
		{
		?>
			<div class="alert alert-success">
				<strong>ÉXITO ! <?php echo $loginMsg; ?></strong>
			</div>
        <?php
		}
		?> 


<div class="login-form">
<center><h2>Iniciar sesión</h2></center>
<form method="post" class="form-horizontal">
  <div class="form-group">
  <label class="col-sm-6 text-left">Email</label>
  <div class="col-sm-12">
  <input type="text" name="txt_email" class="form-control" placeholder="Ingrese email" />
  </div>
  </div>
      
  <div class="form-group">
  <label class="col-sm-6 text-left">Password</label>
  <div class="col-sm-12">
  <input type="password" name="txt_password" class="form-control" placeholder="Ingrese passowrd" />
  </div>
  </div>
      
  <div class="form-group">
      <label class="col-sm-6 text-left">Seleccionar rol</label>
      <div class="col-sm-12">
      <select class="form-control" name="txt_role">
          <option value="" selected="selected"> - selecccionar rol - </option>
          <option value="admin">Admin</option>
          <option value="personal">Personal</option>
          <option value="usuarios">Usuarios</option>
      </select>
      </div>
  </div>
  
  <div class="form-group">
  <div class="col-sm-12">
  <input type="submit" name="btn_login" class="btn btn-success btn-block" value="Iniciar Sesion">
  </div>
  </div>
  
  <div class="form-group">
  <div class="col-sm-12">
  ¿No tienes una cuenta? <a href="registro.php"><p class="text-info">Registrar Cuenta</p></a>		
  </div>
  </div>
      
</form>
</div>
<!--Cierra div login-->
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>