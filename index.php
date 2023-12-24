<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Equipo 1</title>
    <script src="./js/main.js"></script>
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
        $("#btn_iniciar").click(function(){  
            $("#form").attr('action','controlador/controlador.php');
            $("#form").attr('method','POST');
            $('input[name=op]').val('1');
            $("#form").submit();
        });
        $("#crear-usr").click(function(){  
            $.ajax({
              url:"controlador/controlador.php",
              type:"POST",
              data: "op=6",
              success: function(datos){
                $("body").html(datos);
                $("#contenedor1").html("");
              }
            });
        });
        $("#crear-usr").click(function(){  
            $.ajax({
              url:"controlador/controlador.php",
              type:"POST",
              data: "op=6",
              success: function(datos){
                $("body").html(datos);
                $("#contenedor1").html("");
              }
            });
        });
      });
    </script>
    <link rel="stylesheet" href="./styles/styles.css">
    <script>
    </script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<!--Pantalla de inicio-->
<section class="cover_home">

</section>
<br>
<div class="container text-center">
<h1 class="gigante">PREDICCIÓN DE RESIDUOS SÓLIDOS</h1>
</div>
<div id= "contenedor1" class="container text-center">
  <br>
<button id="btn_iniciar" type="button" class="btn btn-primary">iniciar Sesión</button>
<br>
<button id="crear-usr" type="button" class="btn btn-primary my-3">Crear Usuario</button>
<form id=form>
  <input type="hidden" name="op">
</form>
</div>
<div id="contenedor"></div>
<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
    <div class="container text-center">
      <small>Creado por el equipo 01 - </small>
      <small>Universidad nacional Federico Villarreal</small>
    </div>
</footer>
</body>
</html>