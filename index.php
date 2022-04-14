<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Charts</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <p></p>
    <div class="row">
        <div class="bigColumn">
            <canvas class="graficaCovid" id="graficaCovid">
        </div>
        <div class="column">
            <h1>Gráficas Covid-19 Colombia </h1>
            <!--Botones para cambiar el tipo de grafica-->
            <h3>Opciones de Ordenado</h3>
            <button class="bt" onclick="updateChart()">Alfabético</button>
            <button class="bt" onclick="updateChart2()">Menor a Mayor</button><br>
            <h3>Opciones de Gráfica</h3>
            <button class="bt" onclick="chartType('bar')">Bar Chart</button>
            <button class="bt" onclick="chartType('line')">Line Chart</button>
            <button class="bt" onclick="chartType('polarArea')">Polar Chart</button>
            <button class="bt" onclick="chartType('pie')">Pie Chart</button>
        </div>
    </div>


    <?php
    include('conexion.php');
    ?>

    <script>
        var ctx = document.getElementById('graficaCovid').getContext('2d');

        //Funcion para el query
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

        const etiquetas = sqlQuery();

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


        function updateChart() {
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

        function updateChart2() {
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

        function chartType(type) {
            chart.destroy();
            if (type == 'line') {
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
    <script>

    </script>
    <!--Se cambian la grafica según el tipo (radio, barras, linea)-->

</body>

</html>