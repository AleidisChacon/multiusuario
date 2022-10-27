<?php
$db_host="broyoiqme71mn4yyurpz-mysql.services.clever-cloud.com"; //localhost server 
$db_user="u87hu0u2migrl8yy";	//database username
$db_password="EB3pfSrh4BgIv35VRtBO";	//database password   
$db_name="broyoiqme71mn4yyurpz";	//database name

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

?>



