<?php 
session_start();
    require_once '../Modelo/Dao.php';
    unset($_SESSION['data']);
    $cod=1;
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


?>