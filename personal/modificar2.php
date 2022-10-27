
<?php
$numsituacion=(isset($_POST['numsituacion']))?$_POST['numsituacion']:"";
$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
$apellido=(isset($_POST['apellido']))?$_POST['apellido']:"";
$area=(isset($_POST['area']))?$_POST['area']:"";
$tipo=(isset($_POST['tipo']))?$_POST['tipo']:"";
$nivelgravedad=(isset($_POST['nivelgravedad']))?$_POST['nivelgravedad']:"";
$fecha=(isset($_POST['fecha']))?$_POST['fecha']:"";
$hora=(isset($_POST['hora']))?$_POST['hora']:"";
$observacion=(isset($_POST['observacion']))?$_POST['observacion']:"";

$conexion = mysqli_connect("broyoiqme71mn4yyurpz-mysql.services.clever-cloud.com", "u87hu0u2migrl8yy", "EB3pfSrh4BgIv35VRtBO", "broyoiqme71mn4yyurpz") or
die("Problemas con la conexión");
 
    $respuesta =mysqli_query($conexion," UPDATE reportes SET `nombre`='$nombre',`apellido`='$apellido',`area`='$area',`tipo`='$tipo',
    `nivelgravedad`='$nivelgravedad',`fecha`='$fecha',`hora`='$hora',`observacion`='$observacion' WHERE numsituacion=$numsituacion");   

header ("location:tablareporte.php");

?>

