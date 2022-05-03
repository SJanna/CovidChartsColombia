<?php
$serverName = "SHALEM_JANNA";//"tcp:graficascovidserver.database.windows.net"; //serverName\instanceName
$connectionInfo = array( "Database"=>"graficasCovid", "UID"=>"sa", "PWD"=>"123456789");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn ) {
     //echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>