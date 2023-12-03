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


    <link rel="stylesheet" href="./styles/styles.css">
    <script>
    </script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
    <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Bootstrap
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



<section class="cover_detector">
<div class="titulo">
    <div class="container">
    <h1>Detector y clasificador de residuos sólidos</h1>
<p>Creado por</p>
    <ul>
        <li>Christian ManuelRodriguez Chilet</li>
        <li>Jhon Estrada Gutierrez</li>
        <li>Adrian Rllueña Olulo Veramendi</li>
    </ul>
    </div>

</div>
</section>


<br>


<!--BOTÓN-->
<div class="container-sm">
<input type="button" class="btn btn-primary" onclick="mensaje()" VALUE="PRESIONAR">
<input type="text" placeholder="Ingresar distrito">
</div>
<br>

<!--UPLOAD IMAGE-->
<div class="container-sm">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Cargar una imágen</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
    </form>
    <img id="previewImage" src="#" alt="Preview Image" style="display:none;">
    <div id="texto"></div>
</div>

<script>
    function mostrarTexto(){
        document.getElementById('helloWorldText').style.display = 'block';
  }
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('previewImage');
            preview.src = reader.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
        document.getElementById('texto').write("<input type='button' name='fileText' id='fileText' value='mostrar información' onclick='mostrarTexto()'>")
         
    }
    document.getElementById('fileToUpload').addEventListener('change', previewImage);


</script>


<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
    <div class="container text-center">
      <small>Creado por el equipo 01</small>
      <small>Universidad nacional Federico Villarreal</small>
    </div>
</footer>

<br><br><br>
<!--CAMPO INFORMACIÓN-->
<div class="container">
    <input type="button" name="fileText" id="fileText" value="mostrar información" onclick="mostrarTexto()">
        <div id="helloWorldText" style="display: none;">
            <br>
            <div class="d-flex justify-content-center">
            <h2>Resultados</h2>
            <br><br>
            </div>
            <div class="d-flex justify-content-center">
                <table class="table-primary table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Tipo</th>
                            <th scope="col">Porcentaje</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <th scope="row">Cartón</th>
                    <td>24%</td>
                    </tr>
                    <tr>
                    <th scope="row">Plástico</th>
                    <td>15%</td>
                    </tr>
                    <tr>
                    <th scope="row">Bolsas plásticas</th>
                    <td>12%</td>
                    </tr>
                    <tr>
                    <th scope="row">Botellas</th>
                    <td>17%</td>
                    </tr>
                    <tr>
                    <th scope="row">Papel</th>
                    <td>15%</td>
                    </tr>
                    </tbody>
                    </tr>
                    <tr>
                    <th scope="row">Desperdicios orgánicos</th>
                    <td>17%</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            </div>
            
    </div>
</body>
</html>