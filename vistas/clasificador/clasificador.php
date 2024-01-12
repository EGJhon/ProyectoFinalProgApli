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

<!--TEACHABLE MACHINE-->
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>

<script type="text/javascript">

    const URL = "../../RedNeuronal/ModeloClasificador/my_model/";

    let model, webcam, labelContainer, maxPredictions;
    let limite = 90;
    let contador = 0;
    // Load the image model and setup the webcam
    async function iniciar() {
        const modelURL = URL + "model.json";
        const metadataURL = URL + "metadata.json";

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
    async function guardar(clase, lista){
      $.ajax({
        url: "../../controlador/controlador.php",
        type: "POST",
        data: { op: "12", clase: clase, lista: lista },
        success: function (data) {
        }
      })
    }
    
    async function loop() {
        webcam.update(); // update the webcam frame
        await predict();
        window.requestAnimationFrame(loop);
        contador++;
    }

    // run the webcam image through the image model
    async function predict() {
        // predict can take in an image, video or canvas html element
        const prediction = await model.predict(webcam.canvas);
        let classPrediction='<table class="table-primary table-bordered"><thead><tr><th scope="col">Tipo</th><th scope="col">Porcentaje</th></tr></thead><tbody>';
        let objetopredict = null;
        let lista = new Array();
        for (let i = 0; i < maxPredictions; i++) {
          let name = prediction[i].className;
          let porcentage= prediction[i].probability.toFixed(1);
          lista.push(porcentage);
            classPrediction = classPrediction + "<tr><th>"+name+ "</th><td>" + (porcentage * 100 )+"%  </td></tr>";
            if (porcentage >=  0.9) {
              objetopredict = name;
            }
        }
        if(objetopredict != null && contador >= limite){
          contador=0;
          console.log(objetopredict);
          await guardar(objetopredict,lista);
        }

        classPrediction = classPrediction +'</tbody></table>';
        labelContainer.innerHTML = classPrediction  ;
        predic.innerHTML= "<p>"+objetopredict+"</p>"

    }
</script>
<!--TEACHABLE MACHINE-->

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div id="btn-salir"class="position-fixed" style="top: 10px; right: 10px;">
    <button class="btn btn-primary" >Cerrar Sesión</button>
</div>
  <a class="navbar-brand" href="../menu/menu.php">
    <img src="../../images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    SmartWastePerú
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../menu/menu.php">Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../nosotros/nosotros.php">Sobre nosotros</a>
      </li>
    </ul>
  </div>
</nav>



<section class="cover_detector">
<div class="titulo-2">
    <div class="container">
    <h1>Clasificador de residuos sólidos</h1>
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
<!--INSTRUCTIVO--->
<div class="container">

    <!-- Primera Fila -->
    <div class="row">

        <!-- Primera Columna (Izquierda) -->
        <div class="col-md-6">
          <div class="container p-3 my-3 bg-dark text-white">
            <h2>¿Cómo se usa?</h2>
            <p>Dar click en el botón comenza para activar la cámara</p>
            <p>Recuerde dar perisos al navegador para usar la cámara</p>

            
            <!--BOTÓN-->
              <input type="button" class="btn btn-primary" onclick="iniciar()" VALUE="Comenzar">
              <!--<input type="text" placeholder="Ingresar distrito">-->
          </div>
            
        </div>
        <!-- Fin de Primera Columna (Izquierda) -->

        <!-- Segunda Columna (Derecha) -->
        <div class="col-md-6">
            <div class="container p-3 my-3 border">
            <h2>Tip</h2>
            <p>Se recomienda que la cámara esté conectado via USB a la computadora que se usará para la clasificación de residuos sólidos</p>
            <img src="../../images/camera.png" width="20%" height="auto" alt="" style="float: center;">
            </div>
            
        </div>
        <!-- Fin de Segunda Columna (Derecha) -->

    </div>
    <!-- Fin de Primera Fila -->

</div>
<!-- Fin de Contenedor -->


<br>

<div class="container-sm">
    <div class="d-flex justify-content-center">
      <div id="webcam-container"></div>
    </div>
    <div class="d-flex justify-content-center">
      <div id="predic"></div>
    </div>
    <div class="d-flex justify-content-center">
      <div id="label-container"></div>
    </div>
</div>

<!--MOSTRAR WEBCAM-->
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
</body>
</html>