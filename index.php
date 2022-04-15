<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Charts</title>
    <link rel="icon" href="sources/covidFavicon.png"><!--https://cdn-icons-png.flaticon.com/512/2913/2913465.png-->
    <!--Estilos CSS-->
    <link rel="stylesheet" href="style.css">
    <!--Se llama a la librería Chart.Js-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    
<?php //Se llama a la conexión con el servidor 
    include('conexion.php');
?>
    <p></p>
    <div class="row">
        <div class="bigColumn">
            <canvas class="graficaCovid" id="graficaCovid"><!--La grafica-->
        </div>
        <div class="column">
            <h1>Gráficas Covid-19 Colombia </h1>
            <!--Botones para cambiar el tipo de grafica-->
            <h3>Opciones de Ordenado</h3>
            <button class="bt" onclick="ordenAlfa()">Alfabético</button>
            <button class="bt" onclick="ordenMin_Max()">Menor a Mayor</button><br>
            <h3>Opciones de Gráfica</h3>
            <button class="bt" onclick="chartType('bar')">Bar Chart</button>
            <button class="bt" onclick="chartType('line')">Line Chart</button>
            <button class="bt" onclick="chartType('polarArea')">Polar Chart</button>
            <button class="bt" onclick="chartType('pie')">Pie Chart</button>
            <h3>Opciones de Datos</h3>
            <button class="bt" onclick="chartType('bar')">Bar Chart</button>
            <button class="bt" onclick="chartType('line')">Line Chart</button>
        </div>
    </div>
    <!--script de JS que genera la grafica-->
    <script>
        var ctx = document.getElementById('graficaCovid').getContext('2d');

        //Funcion para el query (No es necesaria del todo necesaria, permite organizar código)
        function sqlQuery() {
            var value = [
                <?php
                $sql = "SELECT Departamento, SUM(Total_Procesadas) AS Total FROM Pruebas_PCR_Colombia GROUP BY Departamento ORDER BY Total";
                $result = sqlsrv_query($conn, $sql);
                while ($registros = sqlsrv_fetch_array($result)) {
                ?> '<?php echo $registros["Departamento"] ?>',
                <?php
                }
                ?>
            ];
            return value;
        }

        const etiquetas = sqlQuery();//Se ejecuta la funcion del Query

        const datosTotal = {
            label: "Pruebas PCR por Departamento",
            data: [
                <?php
                $sql = "SELECT Departamento, SUM(Total_Procesadas) AS Total FROM Pruebas_PCR_Colombia GROUP BY Departamento ORDER BY Total";
                $result = sqlsrv_query($conn, $sql);
                while ($registros = sqlsrv_fetch_array($result)) {
                ?> '<?php echo $registros["Total"] ?>',
                <?php
                }
                ?>
            ],

            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 0.5,
        };
        const config = {
            data: {
                labels: etiquetas,
                datasets: [datosTotal]
            },
            type: 'line',
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }

        const config2 = {
            data: {
                labels: etiquetas,
                datasets: [datosTotal]
            },
            type: 'polarArea',
            options: {}
        }

        const config3 = {
            data: {
                labels: etiquetas,
                datasets: [datosTotal]
            },
            type: 'bar',
            options: {}
        }

        const config4 = {
            data: {
                labels: etiquetas,
                datasets: [datosTotal]
            },
            type: 'pie',
            options: {}
        }
        //se grafica 
        let chart = new Chart(ctx, config);


        function ordenAlfa() {//Actualiza la grafica con información nueva
            //Orden Alfabetico
            chart.data.datasets[0].data = [
                <?php
                $sql = "SELECT Departamento, SUM(Total_Procesadas) AS Total FROM Pruebas_PCR_Colombia GROUP BY Departamento ORDER BY Departamento";
                $result = sqlsrv_query($conn, $sql);
                while ($registros = sqlsrv_fetch_array($result)) {
                ?> '<?php echo $registros["Total"] ?>',
                <?php
                }
                ?>
            ];
            chart.data.labels = [
                <?php
                $sql = "SELECT Departamento, SUM(Total_Procesadas) AS Total FROM Pruebas_PCR_Colombia GROUP BY Departamento ORDER BY Departamento";
                $result = sqlsrv_query($conn, $sql);
                while ($registros = sqlsrv_fetch_array($result)) {
                ?> '<?php echo $registros["Departamento"] ?>',
                <?php
                }
                ?>
            ];
            chart.update();
        };

        function ordenMin_Max() {
            //Menor a Mayor
            chart.data.datasets[0].data = [
                <?php
                $sql = "SELECT Departamento, SUM(Total_Procesadas) AS Total FROM Pruebas_PCR_Colombia GROUP BY Departamento ORDER BY Total";
                $result = sqlsrv_query($conn, $sql);
                while ($registros = sqlsrv_fetch_array($result)) {
                ?> '<?php echo $registros["Total"] ?>',
                <?php
                }
                ?>
            ];
            chart.data.labels = [
                <?php
                $sql = "SELECT Departamento, SUM(Total_Procesadas) AS Total FROM Pruebas_PCR_Colombia GROUP BY Departamento ORDER BY Total";
                $result = sqlsrv_query($conn, $sql);
                while ($registros = sqlsrv_fetch_array($result)) {
                ?> '<?php echo $registros["Departamento"] ?>',
                <?php
                }
                ?>
            ];
            chart.update();
        };

        function chartType(type) {//Actualiza el tipo de grafico
            chart.destroy();//Es necesario destruir el grafico que haya para que no se solape
            if (type == 'line') {//Dependiendo del tipo de dato que venga de type se llama a una config diferente
                chart = new Chart(ctx, config);
            }
            if (type == 'polarArea') {
                chart = new Chart(ctx, config2);
            }
            if (type == 'bar') {
                chart = new Chart(ctx, config3);
            }
            if (type == 'pie') {
                chart = new Chart(ctx, config4);
            }
            chart.config.type = type;
            chart.update();
        };
    </script>

<!--ATRIBUCIONES PENDIENTES
ICONO <a href="https://www.flaticon.es/iconos-gratis/virus" title="virus iconos">Virus iconos creados por Freepik - Flaticon</a>
    -->
        
        <p>b1.0</p>        
</body>

</html>
