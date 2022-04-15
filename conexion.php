<?php
$serverName = "tcp:graficascovidserver.database.windows.net,1433"; //serverName\instanceName
$connectionInfo = array( "Database"=>"graficasCovid","UID"=>"shalem", "PWD"=>"A1b2c3008205135");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
?>
