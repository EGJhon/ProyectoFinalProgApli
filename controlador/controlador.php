<?php
    session_start();
    require_once '../Modelo/Bean.php';
    require_once '../Modelo/Dao.php';
    require_once '../Modelo/BeanPersonas.php';
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
            unset($_SESSION['usr']);
            $obj = new ClaseDao;
            $pass=$_POST['pass'];
            $usr=$_POST['correo'];
            $res=$obj->existe_usr($usr,$pass);
            if ($res!= NULL) {
                $obj->sesion($usr);
                $_SESSION['usr']=$res;
                header("Location: ../vistas/menu/menu.php");
            }
            else{
                echo "<script>Window.alert('la contaseña o el correo es incorrecto');</script>";
                header("Location: ../index.php");
            }
            break;
        }

        case 2:{
            header("Location: ../vistas/clasificador/clasificador.php");
            break;
        }
    /*----------------------------------Prediciones---------------------------------------------*/    
        case 3:{
            unset($_SESSION['listadistritos']);
            $obj = new ClaseDao();
            $lista = $obj->ListarDistritos();
            $_SESSION['listadistritos'] = $lista;
            header("Location: ../vistas/prediccion/formulario_prediccion.php");
            break;
        }
        /* --------------------------para usar con python------------------------------*/
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
            header("Location: ../vistas/prediccion/Prediccion.php");
            break;
        }
        case 5:{
            header("Location: ../vistas/menu/menu.php");
            break;
        }
        case 6 :{
            header("Location: ../vistas/seguridad/register.php");
            break;
        }
        case 7 :{
            unset($_SESSION['nombre']);
            unset($_SESSION['apellidos']);
            unset($_SESSION['correo']);
            unset($_SESSION['pass']);
            unset($_SESSION['registro']);
            
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellidos'];
            $correo=$_POST['correo'];
            $pass=$_POST['pass'];

            $objDao = new ClaseDao();
            $obj =new BeanPersonas();
            $obj->setnombre($nombre);
            $obj->setapellido($apellido);
            $obj->setcorreo($correo);
            $obj->setpass($pass);
            $objDao->Registrar_usr($obj);
            header("Location: ../index.php");
            break;
        } 
        case 8: {
            header("Location: ../vistas/seguridad/login.php");
            break;
        }
        /*Distriro*/
        case 9:{
            $cod=$_POST['coddistrito'];
            $distrito = new ClaseDao();
            echo $distrito->distrito($cod)[0]["distrito"];
            break;
        }
        /*Buscar*/ 
        case 10:{
            unset($_SESSION['fecha']);
            $cod=$_POST['coddistrito'];
            $fecha = $_POST['fecha'];
            $objDao = new ClaseDao();
            $datapredicion=$objDao->Buscar($cod,$fecha);
            if( $datapredicion != NULL){
                echo $datapredicion[0]['Prediccion']; 
            } 
            else{
                echo "no";
            }
            break;
        }
        /*Guardar*/
        case 11:{
            $cod=$_POST['coddistrito'];
            $fecha = $_POST['fecha'];
            $usr=$_SESSION["usr"];
            $datapredicion =$_POST['prediccion'];
            $objDao = new ClaseDao();
            $obj = new Bean();
            $obj->setCODDISTRITO($cod);
            $obj->setYEARS($fecha);
            $obj->setPREDICCION($datapredicion);
            $cod=$objDao->InsertarData($obj);
            $arr = [$cod,NULL];
            $objDao->guadarPrediccion($usr,$arr);
            break;
        }
        
        case 12:{
            $clase=$_POST['clase'];
            $usr=$_SESSION["usr"];
            $lista = $_POST['lista'];
            $obj = new BeanClasificador();
            $obj->setprediccion($clase);
            $obj->settextiles($lista[0]);
            $obj->setelectronicos($lista[1]);
            $obj->setvidrios($lista[2]);
            $obj->setmetales($lista[3]);
            $obj->setcartonypapel($lista[4]);
            $obj->setplastico($lista[5]);
            $objDao = new ClaseDao();
            $cod=$objDao->InsertarDataClasificacion($obj);
            $arr = [NULL,$cod];
            $objDao->guadarPrediccion($usr,$arr);
            break;
        }
    }
?>