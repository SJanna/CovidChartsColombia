<!-- <script> var fecha='2021-07-30'; </script>
<div class="row">
  <div class="bigColumn">
    <canvas class="graficaCovid" id="graficaCovid4">
  </div>
  <div class="column">
    <h1>Recuperados y Fallecidos </h1> -->
    <!--Botones para cambiar el tipo de grafica-->
    <!-- <h3>Opciones de Datos</h3>
    <button class="bt" onclick="Recuperado('Recuperados')">Recuperados</button>
    <button class="bt" onclick="Recuperado('Fallecidos')">Fallecidos</button>
    <button class="bt" onclick="Recuperado('Ambos')">Ambos</button><br>
     -->
<!-- </div> -->
<script>
  const ctx4 = document.getElementById('graficaCovid4').getContext('2d');
  const myChart4 = new Chart(ctx4, {
    data: {
        labels: [<?php include('sexo_R_F_query.php'); echo $genero2_query ?>],
        datasets: [{
            type: 'bar',
            label: 'Recuperados',
            data: [<?php include('sexo_R_F_query.php'); echo $recuperado_query ?>],
            backgroundColor: [
                'rgba(10, 220, 30, 0.2)'
            ],
            borderColor: [
                'rgba(10, 220, 30, 1)'
            ],
            borderWidth: 1
        },
        {
            type: 'bar',
            label: 'Fallecidos',
            data: [<?php include('sexo_R_F_query.php'); echo $fallecido_query ?>],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
    //   responsive: true,
    //   maintainAspectRatio: false,
      scales: {
    }
  }
});

function Recuperado(str) {
    if(str=='Recuperados'){
    myChart4.data.datasets[0].data = [<?php include('sexo_R_F_query.php'); echo $recuperado_query ?>];
    myChart4.data.datasets[0].label='Recuperados';
    myChart4.data.datasets[1].data = [<?php include('sexo_R_F_query.php'); echo $recuperado_query ?>];
    myChart4.data.datasets[1].label='Recuperados';
  }else if(str=='Fallecidos'){
    myChart4.data.datasets[0].data = [<?php include('sexo_R_F_query.php'); echo $fallecido_query ?>];
    myChart4.data.datasets[0].label='Fallecidos';
    myChart4.data.datasets[1].data = [<?php include('sexo_R_F_query.php'); echo $fallecido_query ?>];
    myChart4.data.datasets[1].label='Fallecidos';
  }else if (str=='Ambos'){
    myChart4.data.datasets[1].data = [<?php include('sexo_R_F_query.php'); echo $recuperado_query ?>];
    myChart4.data.datasets[1].label='Recuperados';
    myChart4.data.datasets[0].data = [<?php include('sexo_R_F_query.php'); echo $fallecido_query ?>];
    myChart4.data.datasets[0].label='Fallecidos';
  }
  myChart4.data.labels =
  [<?php include('sexo_R_F_query.php'); echo $genero2_query ?>];     
  myChart4.update();
}
</script>