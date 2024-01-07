<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Equipo 1</title>
    <script src="../../js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!--JQUERY-->
    <script>
    $(document).ready(function() {
      $("#distrito").change(function() {
        var selectedValue = $(this).val();
        $("#imagenDistrito").attr("src", selectedValue);
      });
    });
    </script>

    <script>
      $(document).ready(function(){
        $("#btn_prediccion").click(function(){
          $("#form").attr('action','../../controlador/controlador.php');
          $("#form").attr('method','POST');
          $('input[name=op]').val('3');
          $("#form").submit();
        });
        $("#btn_detector").click(function(){
          $("#form").attr('action','../../controlador/controlador.php');
          $("#form").attr('method','POST');
          $('input[name=op]').val('2');
          $("#form").submit();
        });
        $("#btn-salir").click(function(){
          location.href="../../index.php";
        });
      });
    </script>
    <link rel="stylesheet" href="../../styles/styles.css">
    <script> 
    </script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<!--Pantalla de inicio-->
<section class="cover_home">
<div id="btn-salir"class="position-fixed" style="top: 10px; right: 10px;">
    <button class="btn btn-primary" >Cerrar Sesión</button>
</div>
<div class="container text-center">
<h1 class="titulo">MENÚ PRINCIPAL</h1>
</div>
</section>
<form id="form">
  <input type="hidden" name="op">
</form>
<br>
<div class="container text-center">
<br>
  <button id="btn_prediccion" type="button" class="btn btn-primary btn-lg">Predicción</button>
<br>
<br>
  <button id="btn_detector" type="button" class="btn btn-primary btn-lg">Clasificador </button>
</div>

<!--lOGO UNFV-->
<br>
<br>
<br>
<div class="container">
    <img src="../../images/logo_unfv.jpg" width="20%" height="auto" alt="" style="float: left;">
    <img src="../../images/logo_fiis.jpg" width="30%" height="auto" alt="" style="float: right;">
    <div style="clear: both;"></div>
</div>

<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
    <div class="container text-center">
      <small>Creado por el equipo 01</small>
      <small>Universidad nacional Federico Villarreal</small>
    </div>
</footer>
</body>
</html>