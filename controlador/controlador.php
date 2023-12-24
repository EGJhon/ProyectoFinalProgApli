<?php
    session_start();
    require_once '../Modelo/Bean.php';
    require_once '../Modelo/Dao.php';
    require_once '../util/ConexionBD.php';
    $op=$_POST['op'];
        
    function prediccion($year,$dist){
        $pythonScript = 'C:\Users\JHON\Documents\GitHub\ProyectoFinalProgApli\RedNeuronal\Prediccion.py';
        $command = "python $pythonScript $year $dist";
        $residuo = shell_exec($command);

        return floatval($residuo);
    }

    switch ($op){
        case 1:{
            $obj = new ClaseDao;
            $pass=$_POST['pass'];
            $usr=$_POST['usr'];
            if ($obj->existe_usr($usr,$pass)!= NULL) {

                header("Location: ../menu.php");
            }
            else{
                header("Location: ../index.php");
            }
            break;
        }

        case 2:{
            header("Location: ../prueba.php");
            break;
        }
    /*----------------------------------Prediciones---------------------------------------------*/    
        case 3:{
            unset($_SESSION['listadistritos']);
            $obj = new ClaseDao();
            $lista = $obj->ListarDistritos();
            $_SESSION['listadistritos'] = $lista;
            header("Location: ../formulario_prediccion.php");
            break;
        }
        
        case 4:{
            unset($_SESSION['fecha']);
            unset($_SESSION['data']);
            unset($_SESSION['distrito']);
            $cod=$_POST['coddistrito'];
            $fecha = $_POST['fecha'];
            $arr = explode('-', $fecha);
            $fechaIni=$arr[0];
            $fechaFin=$arr[1];
            $lista = array();
            $objDao = new ClaseDao();
            for ($i=intval($fechaIni); $i<=intval($fechaFin)  ; $i++) {
                $datapredicion=$objDao->Buscar($cod,$i);
                if( $datapredicion != NULL){
                    array_push($lista,$datapredicion[0]['Prediccion']); 
                } 
                else{
                    
                    $datapredicion=prediccion($i,$cod);
                    $obj = new Bean();
                    $obj->setCODDISTRITO($cod);
                    $obj->setYEARS($i);
                    $obj->setPREDICCION($datapredicion);
                    $objDao->InsertarData($obj);
                    array_push($lista,$datapredicion);
                }
            }
            $distrito = new ClaseDao();
            $_SESSION['distrito'] = $distrito->distrito($cod);
            $_SESSION['fecha'] = $fecha;
            $_SESSION['data'] = json_encode($lista);
            header("Location: ../Prediccion.php");
            break;
        }
        case 5:{
            header("Location: ../index.php");
            break;
        }
        case 6 :{
            echo "<!-- Section: Design Block -->
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
                        <h2 class='fw-bold mb-5'>Sign up now</h2>
                        <form id='form2'>
                          <!-- 2 column grid layout with text inputs for the first and last names -->
                          <div class='row'>
                            <div class='col-md-6 mb-4'>
                              <div class='form-outline'>
                                <input type='text' id='form3Example1' class='form-control' />
                                <label class='form-label' for='form3Example1'>First name</label>
                              </div>
                            </div>
                            <div class='col-md-6 mb-4'>
                              <div class='form-outline'>
                                <input type='text' id='form3Example2' class='form-control' />
                                <label class='form-label' for='form3Example2'>Last name</label>
                              </div>
                            </div>
                          </div>
            
                          <!-- Email input -->
                          <div class='form-outline mb-4'>
                            <input type='email' id='form3Example3' class='form-control' />
                            <label class='form-label' for='form3Example3'>Email address</label>
                          </div>
            
                          <!-- Password input -->
                          <div class='form-outline mb-4'>
                            <input type='password' id='form3Example4' class='form-control' />
                            <label class='form-label' for='form3Example4'>Password</label>
                          </div>
            
                          <!-- Checkbox -->
                          <div class='form-check d-flex justify-content-center mb-4'>
                            <input class='form-check-input me-2' type='checkbox' value='' id='form2Example33' checked />
                            <label class='form-check-label' for='form2Example33'>
                              Subscribe to our newsletter
                            </label>
                          </div>
            
                          <!-- Submit button -->
                          <button type='submit' class='btn btn-primary btn-block mb-4'>
                            Sign up
                          </button>
            
                          <!-- Register buttons -->
                          <div class='text-center'>
                            <p>or sign up with:</p>
                            <button type='button' class='btn btn-link btn-floating mx-1'>
                              <i class='fab fa-facebook-f'></i>
                            </button>
            
                            <button type='button' class='btn btn-link btn-floating mx-1'>
                              <i class='fab fa-google'></i>
                            </button>
            
                            <button type='button' class='btn btn-link btn-floating mx-1'>
                              <i class='fab fa-twitter'></i>
                            </button>
            
                            <button type='button' class='btn btn-link btn-floating mx-1'>
                              <i class='fab fa-github'></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
            
                  <div class='col-lg-6 mb-5 mb-lg-0'>
                    <img src='https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg' class='w-100 rounded-4 shadow-4'
                      alt='' />
                  </div>
                </div>
              </div>
              <!-- Jumbotron -->
            </section>
            <!-- Section: Design Block -->";
            break;
        } 
    }


?>