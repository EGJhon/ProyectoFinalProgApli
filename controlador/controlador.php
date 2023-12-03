<?php
    session_start();
    require_once '../Modelo/Bean.php';
    require_once '../Modelo/Dao.php';
    require_once '../util/ConexionBD.php';
    $op=$_POST['op'];

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
            unset($_SESSION['data']);
            $cod=$_POST['coddistrito'];
            $fechaIni=2023;/*$_POST['fechaini'];*/
            $fechaFin=2029;/*$_POST['fechafin'];*/
            $lista = array();
            $objDao = new ClaseDao();
            for ($i=intval($fechaIni); $i<=intval($fechaFin)  ; $i++) {
                $datapredicion=$objDao->Buscar($cod,$i)[0]['Prediccion'];
                if( $datapredicion != NULL){
                    array_push($lista,$datapredicion); 
                } 
                else{
                    /*
                    $datapredicion=funcionpredicion($cod,$i);
                    $obj = new Bean();
                    $obj->getCODDISTRITO($cod);
                    $obj->setYEARS($i);
                    $obj->setPREDICCION($datapredicion);
                    $obj->InsertarData($obj);
                    array_push($lista,$datapredicion);*/
                }
            }
            //para el tamaño de un array sizeof(array());
            $_SESSION['data'] = json_encode($lista);
            header("Location: ../Prediccion.php");
            break;
        }
    /*------------------------------------Modelo Detector--------------------------------------------------------*/
        case 5:{
            
            break;
        }
    }


?>