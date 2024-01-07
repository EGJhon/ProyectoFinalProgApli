<?php 
  session_start();
  $codigo=$_POST['coddistrito'];
  $fecha = $_POST['fecha'];
  $arr = explode('-', $fecha);
  $fechaIni=intval($arr[0]);
  $fechaFin=intval($arr[1]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Equipo 1</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script>
      let modelo;
      async function predeccir(cod, fech) {
          // Cargar el modelo si aún no se ha cargado
          if (!modelo) {
              try {
                  let url= "../../RedNeuronal/ModelosDistritos/Modelos/distrito"+cod+"/model.json"
                  modelo = await tf.loadLayersModel(url);
              } catch (error) {
                  console.error("Error al cargar el modelo:", error);
                  return null;
              }
          }
          
          const tensor = tf.tensor1d([fech]);
          const pre = modelo.predict(tensor).dataSync();
          return pre[0];
      }
      var fechaIni=parseInt(<?php echo $fechaIni?>);
      var fechaFin=parseInt(<?php echo $fechaFin?>);
      var codigo = <?php echo $codigo?>;
      var data = [];
      async function manejarPredicciones() {
        for (let i = fechaIni; i <= fechaFin ; i++) {
          let predic = await new Promise((resolve) => {
            $.ajax({
                url: "../../controlador/controlador.php",
                type: "POST",
                data: { op: "10", coddistrito: codigo, fecha: i },
                success: function (prediccion) {
                    resolve(prediccion);
                },
                error: function () {
                    resolve("error"); // O maneja el error de alguna otra manera
                }
            });
        });
          if(predic!="no"){
            data[i-fechaIni]= parseFloat(predic);
          }
          else{
            let prediciones = await predeccir(codigo,i);
            data[i-fechaIni]=prediciones;
            await $.ajax({
            url:"../../controlador/controlador.php",
            type:"POST",
            data:{op:"11",coddistrito:codigo,fecha:i,prediccion:prediciones},
            success:function(res){
              }
            });
          }
        }
        return data;
      }

      $(document).ready(function() {
        $.ajax({
          url:"../../controlador/controlador.php",
          type:"POST",
          data:{op:"9",coddistrito:codigo},
          success:function(distrito){
            $("#distrito").html(distrito);
          }
        });   
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
        })
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
              <h1>Predicion del Distrito de <p id="distrito"></p> del año <?php echo $fechaIni ?> - <?php echo  $fechaFin ?></h1>
            </center>
          </div>
        </div>
        </section>  
          <canvas class="container center py-4" id="myChart" style="width:100%;max-width:700px"></canvas>
          <script>

          years =new Array();
            for (i =fechaIni ; i <= fechaFin; i++) {
              years[i- fechaIni] = i;
          }
          async function grafico(){
            var datos= await manejarPredicciones();
            new Chart("myChart", {
              type: "line",
              data: {
                labels: years,
                datasets: [{
                  label: "Predicion "+ fechaIni + " - " + fechaFin ,
                  data: datos,
                  borderColor: "red",
                  fill: false
                }]
              },
              options: {
                legend: {display: true}
              }
            });
          }
        grafico(); 
    </script>
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