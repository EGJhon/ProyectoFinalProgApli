<?php 
  session_start();
  $data=$_SESSION['data'];
  $fechaIni=2023;/*$_SESSION['fechaini'];*/
  $fechaFin=2029;/*$_SESSION['fechafin'];*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>   
</head>
<body>
    <!--ChartJS-->
<?php 
echo '

  <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
  <script>
    years =new Array();
    for (i =parseInt('.$fechaIni.') ; i <= parseInt('.$fechaFin.'); i++) {
      years[i- parseInt('.$fechaIni.')] = i;
  }
      const year = years;

  new Chart("myChart", {
    type: "line",
    data: {
      labels: year,
      datasets: [{
        data: '.$data.',
        borderColor: "red",
        fill: false
      }]
    },
    options: {
      legend: {display: true}
    }
  });
  </script>'
?>

<!--FOOTER-->
<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
    <div class="container text-center">
      <small>Creado por el equipo 01</small>
      <small>Universidad nacional Federico Villarreal</small>
    </div>
</footer>
</body>
</html>