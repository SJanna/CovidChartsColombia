<!-- <div class="row">
  <div class="bigColumn">
    <canvas class="graficaCovid" id="graficaCovid3">
  </div>
  <div class="column">
    <h1>Pruebas Covid</h1> -->
    <!--Botones para cambiar el tipo de grafica-->
    <!-- <h3>Opciones de Gráfica</h3>
    <button class="bt" onclick="chartType('line')">Line</button>
    <button class="bt" onclick="chartType('bar')">Bar</button>
    <button class="bt" onclick="chartType('pie')">Pie</button><br>
    <button class="bt" onclick="chartType('doughnut')">doughnut</button><br>
</div> -->
<script>
  const chartLabels = [<?php include('pcr_query.php'); echo $pcr_dep_query ?>];
  const chartData = [<?php include('pcr_query.php'); echo $pcr_total_query ?>];
  var ctx3 = document.getElementById('graficaCovid3').getContext('2d');
  const chartDatasets={
      label: 'Pruebas PCR',
      data: chartData,
      backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
  };


const config ={
    data: {
        labels: chartLabels,
        datasets: [chartDatasets]
      },
        type: 'line',
        options: {
          plugins: {
      legend: {
        display: true,
      }
    },
          // responsive: true,
          // maintainAspectRatio: false,
        scales: {
            y: {
              beginAtZero: true
            }
        }
    }
}

const config2 = {
  data: {
      labels: chartLabels,
      datasets: [chartDatasets]
  },
  type: 'bar',
  options: {
    plugins: {
      legend: {
        display: true,
      }
    },
        // responsive: true,
        // maintainAspectRatio: false,
        scales: {
            y: {
              beginAtZero: true
            }
        }
    }
}

const config3 = {
  data: {
      labels: chartLabels,
      datasets: [chartDatasets]
  },
  type: 'pie',
  options: {
    plugins: {
      legend: {
        display: false,
      }
    },
    // responsive: true,
    // maintainAspectRatio: false,
        scales: {
            y: {
              beginAtZero: true
            }
        }
    }
}

const config4 = {
  data: {
      labels: chartLabels,
      datasets: [chartDatasets]
  },
  type: 'doughnut',
  options: {
    plugins: {
      legend: {
        display: false,
      }
    },
          // responsive: true,
          // maintainAspectRatio: false,
        scales: {
            y: {
              beginAtZero: true
            }
        }
    }
}

let myChart3 = new Chart(ctx3, config4); 

function chartType(type) { //Actualiza el tipo de grafico
  myChart3.destroy(); //Es necesario destruir el grafico que haya para que no se solape
  if (type == 'line') { //Dependiendo del tipo de dato que venga de type se llama a una config diferente
    myChart3 = new Chart(ctx3, config);
  }
  if (type == 'bar') {
    myChart3 = new Chart(ctx3, config2);
  }
  if (type == 'pie') {
    myChart3 = new Chart(ctx3, config3);
  }
  if (type == 'doughnut') {
    myChart3 = new Chart(ctx3, config4);
  }
  myChart3.config.type = type;
  myChart3.update();
};
</script>