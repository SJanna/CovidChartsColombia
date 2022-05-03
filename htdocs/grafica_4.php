<script>
  <?php include('sexo_R_F_query.php')?>;
  const genero2_query=[ <?php echo $genero2_query?> ];
  const recuperado_query=[ <?php echo $recuperado_query?> ];
  const fallecido_query=[ <?php echo $fallecido_query?> ];
  const ctx4 = document.getElementById('graficaCovid4').getContext('2d');
  const myChart4 = new Chart(ctx4, {
    data: {
        labels: genero2_query,
        datasets: [{
            type: 'bar',
            label: 'Recuperados',
            data: recuperado_query,
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
            data: fallecido_query,
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
    myChart4.data.datasets[0].data = recuperado_query;
    myChart4.data.datasets[0].label='Recuperados';
    myChart4.data.datasets[1].data = recuperado_query;
    myChart4.data.datasets[1].label='Recuperados';
  }else if(str=='Fallecidos'){
    myChart4.data.datasets[0].data = fallecido_query;
    myChart4.data.datasets[0].label='Fallecidos';
    myChart4.data.datasets[1].data = fallecido_query;
    myChart4.data.datasets[1].label='Fallecidos';
  }else if (str=='Ambos'){
    myChart4.data.datasets[1].data = recuperado_query;
    myChart4.data.datasets[1].label='Recuperados';
    myChart4.data.datasets[0].data = fallecido_query;
    myChart4.data.datasets[0].label='Fallecidos';
  }
  myChart4.data.labels =genero2_query;     
  myChart4.update();
}
</script>