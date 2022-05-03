<?php
include('conexion.php');
$RecuperadosF_query='';
$RecuperadosR_query=''; 
$R_Edad_query=''; 
$sql = "SELECT * FROM RyF_Edad";
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
    $RecuperadosF_query=$RecuperadosF_query.'"'. $row["Fallecidos"].'",';
    $RecuperadosR_query=$RecuperadosR_query.'"'. $row["Recuperados"].'",';
    $R_Edad_query=$R_Edad_query.'"'. $row["Edad"].'",';
}
sqlsrv_free_stmt($stmt);  
sqlsrv_close($conn);  
?>