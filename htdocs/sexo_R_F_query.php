<?php
include('conexion.php');
$genero2_query='';
$recuperado_query='';
$fallecido_query='';
$sql = "SELECT * FROM Sexo_R_F";
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
    $genero2_query=$genero2_query.'"'. $row["Sexo"].'",';
    $recuperado_query=$recuperado_query.'"'. $row["Recuperados"].'",';
    $fallecido_query=$fallecido_query.'"'. $row["Fallecidos"].'",';
}
sqlsrv_free_stmt($stmt);  
sqlsrv_close($conn);  
?>