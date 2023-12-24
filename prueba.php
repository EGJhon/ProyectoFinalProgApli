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

<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
<script type="text/javascript">
    // More API functions here:
    // https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/image

    // the link to your model provided by Teachable Machine export panel
    const URL = "RedNeuronal/ModeloClasificador/my_model/";

    let model, webcam, labelContainer, maxPredictions;

    // Load the image model and setup the webcam
    async function iniciar() {
        const modelURL = URL + "model.json";
        const metadataURL = URL + "metadata.json";

        // load the model and metadata
        // Refer to tmImage.loadFromFiles() in the API to support files from a file picker
        // or files from your local hard drive
        // Note: the pose library adds "tmImage" object to your window (window.tmImage)
        model = await tmImage.load(modelURL, metadataURL);
        maxPredictions = model.getTotalClasses();

        // Convenience function to setup a webcam
        const flip = true; // whether to flip the webcam
        webcam = new tmImage.Webcam(400, 400, flip); // width, height, flip
        await webcam.setup(); // request access to the webcam
        await webcam.play();
        window.requestAnimationFrame(loop);

        // append elements to the DOM
        document.getElementById("webcam-container").appendChild(webcam.canvas);
        labelContainer = document.getElementById("label-container");
        for (let i = 0; i < maxPredictions; i++) { // and class labels
            labelContainer.appendChild(document.createElement("div"));
        }
    }

    async function loop() {
        webcam.update(); // update the webcam frame
        await predict();
        window.requestAnimationFrame(loop);
    }

    // run the webcam image through the image model
    async function predict() {
        // predict can take in an image, video or canvas html element
        const prediction = await model.predict(webcam.canvas);
        let classPrediction='<table class="table-primary table-bordered"><thead><tr><th scope="col">Tipo</th><th scope="col">Porcentaje</th></tr></thead><tbody>';
        for (let i = 0; i < maxPredictions; i++) {
            classPrediction = classPrediction + "<tr><th>"+prediction[i].className+ "</th><td>" + (prediction[i].probability.toFixed(1) *100 )+"%  </td></tr>";
        }
        classPrediction = classPrediction +'</tbody></table>';
        labelContainer.innerHTML = classPrediction  ;
        
    }
</script>


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
<input type="button" class="btn btn-primary" onclick="iniciar()" VALUE="Comenzar">
<!--<input type="text" placeholder="Ingresar distrito">-->
</div>
<br>

<!--UPLOAD IMAGE-->
<div class="container-sm">
  <!--
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Cargar una imágen</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
    </form>
    <!--<img id="previewImage" src="#" alt="Preview Image" style="display:none;">-->
    <!--<div id="texto"></div>-->
    <div class="d-flex justify-content-center">
      <div id="webcam-container"></div>
    </div>
    <div class="d-flex justify-content-center">
      <div id="label-container"></div>
    </div>
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
<!--CAMPO INFORMACIÓN
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
            
    </div>-->
</body>
</html>