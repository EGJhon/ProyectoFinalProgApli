<?php 
  session_start();
  $listaDistritos=$_SESSION['listadistritos'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Equipo 1</title>
    <script src="./js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


<!--JQUERY-->
    <script>
      
    $(document).ready(function() {
      $("#distrito").change(function() {
        var selectedValue = $(this).val();
        $("#imagenDistrito").attr("src", selectedValue);
      });
    });
      function predecir(){
        document.form.action="controlador/controlador.php"
        document.form.method="POST";
        document.form.op.value="4";

        document.form.submit();
      }
    </script>
    <script>
      $(function() {
          $("#slider-range").slider({
              range: true,
              min: 2003,
              max: 2050,
              values: [2023, 2029],
              slide: function(event, ui) {
                  $("#amount").val(ui.values[ 0 ] + "-" + ui.values[ 1 ] );
              }
          });

          $( "#amount" ).val($("#slider-range").slider("values", 0) + "-" + $("#slider-range").slider( "values", 1) );
      });
    </script>

<link rel="stylesheet" href="./styles/styles.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>

<!--BARRA DE NAVEGACIÓN-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
    <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="prueba.php">Detector</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nosotros.php">Sobre nosotros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav>

<section class="rojo">
<div class="titulo">
    <div class="container">
    <h1>Sistema de predicción de residuos sólidos</h1>
    </div>

</div>
</section>
<br>
<div class="container">
<h1>Predicción de generación de residuos sólidos por distrito</h1>
</div>

<br>

<!--FORMULARIO-->
<form name = "form">
  <input type="hidden" name="op">
<div class="container">
  <div class="row">
    <div class="col-sm">
    <div class="container p-3 my-3 bg-dark text-white">
        <h1>Datos para la predicción</h1>
        
        <!--COMBOBOX-->
        <div class="container-sm">
        <label for="range1" class="form-label"> Distrito </label>
        <label for="distrito" placeholder="Escoger distrito"></label>

        <select name="coddistrito" id="distrito" class="form-select">
          <option value="0">-Seleccionar Distrito-</option>
          <?php foreach ($listaDistritos as $reg) { ?>

            <option id="coddistrito" value="<?php echo $reg['coddistri'];   ?>"  ><?php echo $reg['distrito'];   ?></option> 

          <?php } ?>
        </select>
        </div>

        <!--RANGO DE AÑOS SLIDER-->
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="m-3">
                        <p>
                        <label for="amount">Rango de Años:</label>
                        <input type="text" name="fecha" id="amount" style="border: 0; color: #f6931f; font-weight: bold;" />
                        </p>
                        <div id="slider-range" style="width:300px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="container">
        <div class="row">
            <input type="button" id="btn_prediccion" class="btn btn-primary" onclick="predecir()" VALUE="LISTO   ">
        </div>
        </div>

        
    </div>
    </div>
    </form>

    <!--SEGUNDA COLUMNA-->
    <div class="col-sm">
        <div class="container p-3 my-3 border">
            <h1>Recuerde</h1>
            <p>El rango máximo de predicción es de 5 años</p>
            <img src="images/logo.png" width="100px" height="auto"  alt="">
        </div>
    </div>
  </div>
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