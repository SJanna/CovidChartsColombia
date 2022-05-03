<?php
include('conexion.php');
$generoH_query='';
$generoM_query=''; 
$dep_query='';
$sql = "SELECT* FROM Hombres_y_Mujeres";//Verificar exactamente dónde podemos usar el ? dentro del query
if ($stmt = sqlsrv_prepare($conn, $sql)) {
    //echo "Statement prepared.\n";  
} else {  
    echo "Statement could not be prepared.\n";  
    die(print_r(sqlsrv_errors(), true));  
}  
if (sqlsrv_execute($stmt)) {  
   // echo "Statement executed.\n";  
} else {  
    echo "Statement could not be executed.\n";  
    die(print_r(sqlsrv_errors(), true));  
}  
while ($row=sqlsrv_fetch_array($stmt)) {
    $generoH_query=$generoH_query.'"'. $row["Hombres"].'",';
    $generoM_query=$generoM_query.'"'. $row["Mujeres"].'",';
    $dep_query=$dep_query.'"'. $row['Nombre departamento'].'",';
}
sqlsrv_free_stmt($stmt);  
sqlsrv_close($conn);  
?>