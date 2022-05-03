<?php
require('vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable('./');
$dotenv->load();
$SNAME=$_ENV['SNAME'];
$DB=$_ENV['DB'];
$UID=$_ENV['UID'];
$PWD=$_ENV['PWD'];
$serverName = $SNAME; //serverName\instanceName
$connectionInfo = array( "Database"=>$DB, "UID"=>$UID, "PWD"=>$PWD);
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn ) {
     //echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>