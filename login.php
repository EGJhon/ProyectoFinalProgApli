
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./styles/styles.css">
    <script>

        $(document).ready(function(){
            $("#btn-iniciar").click(function(){
                $("#form").attr('action','controlador/controlador.php');
                $("#form").attr('method','POST');
                $('input[name=op]').val('1');
                $("#form").submit();
            });
        });
    </script>
</head>
<body>
    <!-- Section: Design Block -->
    <section class="cover_home">
      <div class="container text-center">
        <h1 class="titulo">SmartWastePerú</h1>
      </div>
    </section>
    <section class='text-center text-lg-start'>
              <style>
                .cascading-right {
                  margin-right: -50px;
                }
            
                @media (max-width: 991.98px) {
                  .cascading-right {
                    margin-right: 0;
                  }
                }
              </style>
            
              <!-- Jumbotron -->
              <div class='container py-4'>
                <div class='row g-0 align-items-center'>
                  <div class='col-lg-6 mb-5 mb-lg-0'>
                    <div class='card cascading-right' style='
                        background: hsla(0, 0%, 100%, 0.55);
                        backdrop-filter: blur(30px);
                        '>
                      <div class='card-body p-5 shadow-5 text-center'>
                        <h2 class='fw-bold mb-5'>Iniciar Sesión</h2>

                        <form id="form">
                            <input type="hidden" name="op" value="7">
            
                          <!-- Email input -->
                          <div class='form-outline mb-4'>
                            <input type='email' name='correo' class='form-control' />
                            <label class='form-label' for='form3Example3'>Correo</label>
                          </div>
            
                          <!-- Password input -->
                          <div class='form-outline mb-4'>
                            <input type='password' name='pass' class='form-control' />
                            <label class='form-label' for='form3Example4'>Contraseña</label>
                          </div>

                          <!-- Submit button -->
                          <input type="button" id="btn-iniciar" class='btn btn-primary btn-block mb-4' value="iniciar">

            
                        </form>
                      </div>
                    </div>
                  </div>
            
                  <div class='col-lg-6 mb-5 mb-lg-0'>
                    <img src='https://www.revistaestilo.net/binrepository/533x400/0c0/0d0/none/179468266/MMPL/fh-planeta-250417_1_.12_ES1065651_MG282204937.jpg' class='w-100 rounded-4 shadow-4'
                      alt='' />
                  </div>
                </div>
              </div>
              <!-- Jumbotron -->
            </section>
            <!-- Section: Design Block -->
  <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
    <div class="container text-center">
      <small>Creado por el equipo 01 - </small>
      <small>Universidad nacional Federico Villarreal</small>
    </div>
  </footer>
</body>
</html>