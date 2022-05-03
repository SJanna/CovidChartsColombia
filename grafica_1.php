<!-- <div class="row"> -->
  <!-- <div class="bigColumn"> -->
  <!-- <canvas class="graficaCovid" id="graficaCovid"> -->
  <!-- </div> -->
  <!-- <div class="column"> -->
    <!-- <h1>Gráficas Covid-19 Colombia </h1> -->
    <!--Botones para cambiar el tipo de grafica-->
    <!-- <h3>Opciones de Gráfica</h3>
    <button class="bt" onclick="genero('Hombres')">Hombres</button>
    <button class="bt" onclick="genero('Mujeres')">Mujeres</button>
    <button class="bt" onclick="genero('Ambos')">Ambos</button><br> -->
<!-- </div> -->

<script>
  
  const ctx = document.getElementById('graficaCovid').getContext('2d');
  const myChart = new Chart(ctx, {
    data: {
        labels: [<?php include('dep_query.php'); echo $dep_query ?>],
        datasets: [{
            type: 'bar',
            label: 'Casos de Hombres',
            data: [<?php include('genero_query.php'); echo $generoH_query ?>],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        },
      {
        type: 'line',
        label: 'Casos de Hombres',
            data: [<?php include('genero_query.php'); echo $generoH_query ?>],
            backgroundColor: [
                'rgba(100, 50, 150, 0.2)'
            ],
            borderColor: [
                'rgba(100, 50, 150, 1)'
            ],
            borderWidth: 1
      }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function genero(str) {
    if(str=='Mujeres'){
    myChart.data.datasets[0].data = [<?php include('genero_query.php'); echo $generoM_query ?>];
    myChart.data.datasets[0].label='Casos de Mujeres';
    //myChart.datasets[0].config.type='bar';
    myChart.data.datasets[1].data = [<?php include('genero_query.php'); echo $generoM_query ?>];
    myChart.data.datasets[1].label='Casos de Mujeres';
    //myChart.datasets[1].config.type='line';
  }else if(str=='Hombres'){
    myChart.data.datasets[0].data = [<?php include('genero_query.php'); echo $generoH_query ?>];
    myChart.data.datasets[0].label='Casos de Hombres';
    myChart.config.type='bar';
    myChart.data.datasets[1].data = [<?php include('genero_query.php'); echo $generoH_query ?>];
    myChart.data.datasets[1].label='Casos de Hombres';
    myChart.config.type='line';
  }else if (str=='Ambos'){
    myChart.data.datasets[1].data = [<?php include('genero_query.php'); echo $generoH_query ?>];
    myChart.data.datasets[1].label='Casos de Hombres';
    myChart.data.datasets[0].data = [<?php include('genero_query.php'); echo $generoM_query ?>];
    myChart.data.datasets[0].label='Casos de Mujeres';
  }
  myChart.data.labels =
  [<?php include('dep_query.php'); echo $dep_query ?>];       
  myChart.update();
}
</script>