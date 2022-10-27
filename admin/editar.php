<?php include ("vista/cabecera.php"); ?>

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
    
    
$registros = mysqli_query($conexion, "select id,username,email,password,role  from mainlogin where id='$_REQUEST[id]'") or
die("Problemas en el select:" . mysqli_error($conexion));
 
?>
      
        <center>
          <div class="card" style=" width: 500px; height: 80 0px; border-radius: 10px; border: solid 1px black; margin-top: 30px;">
            
            <div class="card-body">
            <form action="editar2.php" method="post" >
            <div class="card-header"><h2>Panel de Usuario</h2></div><br>
            <div class="row">
            <?php
            if ($reg = mysqli_fetch_array($registros)) { ?>
        
              <div class="form-group col">
                <label>Id</label>
                <input type="text" required readonly class="form-control" placeholder="" name="id" value="<?php echo $reg['id']; ?> ">
              </div>
        
              <div class="form-group col">
                <label  >Usuario</label>
                <input type="text" class="form-control" placeholder="Usuario" name="username"  value="<?php echo $reg['username'] ; ?> ">
              </div> 
            </div>

              <div class=" form-group col">
                <label  >Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email"  value="<?php echo $reg['email'] ; ?> ">
              </div>
              
            <div class="form-group col">
              <label > Contraseña</label>
                <input type="password" class="form-control" placeholder="Ingresa contraseña" name="password"  value="<?php echo $reg['password'] ; ?> ">
            </div>
            

            <div class="form-group " >
                <label required readonly >Seleccione tipo</label>
                <div class="col-sm-12">
                <select class="form-control" name="role">
                    <option value=""   selected="selected" name="role" value="<?php echo $reg['role'] ; ?>"> - seleccione rol - </option>
                    <!--<option value="admin">Admin</option>-->
                    <option value="admin">Admin</option>
                    <option value="personal">Personal</option>
                    <option value="usuarios">Usuarios</option>
                </select>
                </div>
                </div>
            
                <br>
            <div class="card-footer">
               <button type="submit" class="btn btn-success" value="editar">Guardar</button>
               <a href="admin_portada.php"><button type="submit" class="btn btn-danger" name="accion">Atras</button>
            </div>

          </div>
          </div>
          <?php   }  ?>
          </form>
          </center>
          </div>
          </div>
          <br><br>
       
     