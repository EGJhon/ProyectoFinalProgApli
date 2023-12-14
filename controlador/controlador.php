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
            header("Location: ../menu.php");
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
    }


?>