<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../../js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--JQUERY-->
    <script>
    $(document).ready(function() {
      $("#distrito").change(function() {
        var selectedValue = $(this).val();
        $("#imagenDistrito").attr("src", selectedValue);
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

<!--BARRA DE NAVEGACIÓN-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div id="btn-salir"class="position-fixed" style="top: 10px; right: 10px;">
    <button class="btn btn-primary" >Cerrar Sesión</button>
</div>
  <a class="navbar-brand" href="../../index.php">
    <img src="../../images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    SmartWastePerú
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="menu.php">Menu</a>
      </li>
      </li>
    </ul>
  </div>
</nav>

<section class="cover_nosotros">    
    <div class="titulo">
    <h1>Sobre nosotros</h1>
    </div>
</section>
<br><br>




<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Creado por el equipo 01</small>
            <small>Universidad nacional Federico Villarreal</small>
        </div>
</footer>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="container">
        <h1>El equipo 1</h1>
        <p>El equipo 1 está conformado por:</p>
        <ul>
            <li>Christian Manuel Rodriguez Chilet</li>
            <li>John Estrada Gutierrez</li>
            <li>Adrian Olulo Veramendi</li>
        </ul>
        <p>Se está desarrollando un artículo científico sobre la aplicación de la IA para predecir y clasificar la cantidad y tipos de residuos sólidos</p>
        <a href="https://www.overleaf.com/read/vtsgdfbmdnvm#7ac491" class="link-primary">Avance del artículo</a>
</div>
        </div>
        <div class="col-md-6">
            
                        <img src="../../images/logo_unfv.jpg" alt="logo_unfv.jpg" style="width:60%; height:auto;">
                        
                    </div>
                </div>
            </div>

            </body>
            </html>
