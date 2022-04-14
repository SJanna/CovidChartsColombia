<?php
$serverName = "SHALEM_JANNA"; //serverName\instanceName
$connectionInfo = array( "Database"=>"ColombiaCovidData","UID"=>"sa", "PWD"=>"123456789");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
?>