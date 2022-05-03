<?php
include('conexion.php');
$pcr_dep_query='';
$pcr_total_query='';
$sql = "SELECT * FROM pcrDepartamento ORDER BY Departamento";
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
    $pcr_dep_query=$pcr_dep_query.'"'. $row["Departamento"].'",';
    $pcr_total_query=$pcr_total_query.'"'. $row["PCR"].'",';
}
sqlsrv_free_stmt($stmt);  
sqlsrv_close($conn);  
?>