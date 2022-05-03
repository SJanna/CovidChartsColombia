<!-- <div class="row">
  <div class="bigColumn">
    <canvas class="graficaCovid" id="graficaCovid2">
  </div>
  <div class="column">
    <h1>Gráficas Covid-19 Colombia </h1> -->
    <!--Botones para cambiar el tipo de grafica-->
    <!-- <h3>Opciones de Gráfica</h3>
    <button class="bt" onclick="genero2('Hombres')">Hombres</button>
    <button class="bt" onclick="genero2('Mujeres')">Mujeres</button>
    <button class="bt" onclick="genero2('Ambos')">Ambos</button><br>
</div> -->
<script>
  const ctx2 = document.getElementById('graficaCovid2').getContext('2d');
  const myChart2 = new Chart(ctx2, {
    data: {
        labels: [<?php include('recuperados_query.php'); echo $R_Edad_query ?>],
        datasets: [{
            type: 'line',
            label: 'Recuperados',
            data: [<?php include('recuperados_query.php'); echo $RecuperadosR_query ?>],
            backgroundColor: [
                'rgba(10, 220, 30, 0.2)'
            ],
            borderColor: [
                'rgba(10, 220, 30, 1)'
            ],
            borderWidth: 1
        },
      {
        type: 'line',
        label: 'Recuperados',
            data: [<?php include('recuperados_query.php'); echo $RecuperadosR_query ?>],
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
      // responsive: true,
      // maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function genero2(str) {
    if(str=='Recuperados'){
    myChart2.data.datasets[0].data = [<?php include('recuperados_query.php'); echo $RecuperadosR_query ?>];
    myChart2.data.datasets[0].label='Recuperados';
    myChart2.data.datasets[1].data = [<?php include('recuperados_query.php'); echo $RecuperadosR_query ?>];
    myChart2.data.datasets[1].label='Recuperados';
  }else if(str=='Fallecidos'){
    myChart2.data.datasets[0].data = [<?php include('recuperados_query.php'); echo $RecuperadosF_query ?>];
    myChart2.data.datasets[0].label='Fallecidos';
    myChart2.data.datasets[1].data = [<?php include('recuperados_query.php'); echo $RecuperadosF_query ?>];
    myChart2.data.datasets[1].label='Fallecidos';
  }else if (str=='Ambos'){
    myChart2.data.datasets[1].data = [<?php include('recuperados_query.php'); echo $RecuperadosR_query ?>];
    myChart2.data.datasets[1].label='Recuperados';
    myChart2.data.datasets[0].data = [<?php include('recuperados_query.php'); echo $RecuperadosF_query ?>];
    myChart2.data.datasets[0].label='Fallecidos';
  }
  myChart2.data.labels =
  [<?php include('recuperados_query.php'); echo $R_Edad_query ?>];     
  myChart2.update();
}
</script>