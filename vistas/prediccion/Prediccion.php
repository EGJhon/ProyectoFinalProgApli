<?php 
  session_start();
  $data=$_SESSION['data'];
  $fecha = $_SESSION['fecha'];
  $arr = explode('-', $fecha);
  $fechaIni=intval($arr[0]);
  $fechaFin=intval($arr[1]);
  $nombreDistrito = $_SESSION['distrito'][0]["distrito"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Equipo 1</title>
    <script src="../js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>   

    <script>
    $(document).ready(function() {
      $("#distrito").change(function() {
        var selectedValue = $(this).val();
        $("#imagenDistrito").attr("src", selectedValue);
      });
      $("#menu").click(function(){
        $("#form").attr('action','../../controlador/controlador.php');
        $("#form").attr('method','POST');
        $('input[name=op]').val('5');
        $("#form").submit();
      });
      $("#predic").click(function(){
        $("#form").attr('action','../../controlador/controlador.php');
        $("#form").attr('method','POST');
        $('input[name=op]').val('3');
        $("#form").submit();
      });
      $("#btn-salir").click(function(){
          location.href="../../index.php";
        });
    });


    </script>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>

<body>
<form id="form">
  <input type="hidden" name="op">
</form>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div id="btn-salir"class="position-fixed" style="top: 10px; right: 10px;">
    <button class="btn btn-primary" >Cerrar Sesión</button>
</div>
  <a class="navbar-brand" href="index.php">
    <img src="../../images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    SmartWastePerú
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../nosotros/nosotros.php">Sobre nosotros</a>
      </li>
    </ul>
  </div>
</nav>

<section class="rojo">
        <div class="titulo">
          <div class="container">
            <center>
              <h1>Predicion del Distrito de <?php echo $nombreDistrito?> del año <?php echo $fechaIni ?> - <?php echo  $fechaFin ?></h1>
            </center>
          </div>
        </div>
        </section>  
          <canvas class="container center py-4" id="myChart" style="width:100%;max-width:700px"></canvas>
    <!--ChartJS-->
    <?php 
        echo '
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
                label: "Predicion "+ '.$fechaIni.' + " - " + '.$fechaFin.',
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

        <div class="container py-5">
          <center>
          <button type="button" id="menu" class="btn btn-primary mx-2">Regresar a Menu</button>
          <button type="button" id="predic" class="btn btn-success mx-2">Nueva predicción</button>  
          </center>
        </div>
<!--FOOTER-->
<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
    <div class="container text-center">
      <small>Creado por el equipo 01 - </small>
      <small>Universidad nacional Federico Villarreal</small>
    </div>
</footer>
</body>
</html>