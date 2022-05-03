<script>
  <?php include('genero_query.php');?>
  const dep_query=[ <?php echo $dep_query?> ];
  const generoH_query=[ <?php echo $generoH_query?> ];
  const generoM_query=[ <?php echo $generoM_query?> ];
  const ctx = document.getElementById('graficaCovid').getContext('2d');
  const myChart = new Chart(ctx, {
    data: {
        labels: dep_query,
        datasets: [{
            type: 'bar',
            label: 'Casos de Hombres',
            data: generoH_query,
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
          label: 'Casos de Mujeres',
            data: generoM_query,
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
       responsive: true,
       maintainAspectRatio: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function genero(str) {
  myChart.clear();  
    if(str=='Mujeres'){
    myChart.data.datasets[0].data = generoM_query;
    myChart.data.datasets[0].label='Casos de Mujeres';
    myChart.data.datasets[1].data = generoM_query;
    myChart.data.datasets[1].label='Casos de Mujeres';
  }else if(str=='Hombres'){
    myChart.data.datasets[0].data = generoH_query;
    myChart.data.datasets[0].label='Casos de Hombres';
    myChart.config.type='bar';
    myChart.data.datasets[1].data = generoH_query;
    myChart.data.datasets[1].label='Casos de Hombres';
  }else if (str=='Ambos'){
    myChart.data.datasets[1].data = generoH_query;
    myChart.data.datasets[1].label='Casos de Hombres';
    myChart.data.datasets[0].data = generoM_query;
    myChart.data.datasets[0].label='Casos de Mujeres';
  }
  myChart.data.labels = dep_query;      
  myChart.update();
}
</script>