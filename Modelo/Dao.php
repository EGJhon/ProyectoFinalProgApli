<?php
require_once '../util/ConexionBD.php';
require_once 'Bean.php';

class ClaseDao {

    public function InsertarData(Bean $obj){
        $i = 0;
        try{
            $conexion = new ConexionBD();
            $conn = $conexion->getConexion();
    
            $stmt = $conn->prepare("INSERT INTO `datadistri` (`coddata`, `coddistri`, `years`, `Prediccion`)
            VALUES (NULL, :coddistrito, :years, :prediccion);");
    
            // Asignar valores a las variables
            $coddistrito = $obj->getCODDISTRITO();
            $years = $obj->getYEARS();
            $predicion = $obj->getPREDICION();
    
            $stmt->bindParam(':coddistrito', $coddistrito);
            $stmt->bindParam(':years', $years);
            $stmt->bindParam(':prediccion', $predicion);              
            $i =  $stmt->execute();  
        } catch(Exception $th){
            // Manejar la excepción, por ejemplo:
            echo "Error: " . $th->getMessage();
        } 
        return $i;
    }


    public function ListarDistritos(){
        try { 
            $conexion = new ConexionBD();
            $conn = $conexion->getConexion();
    
            $stmt = $conn->prepare("SELECT * FROM `Distritos` WHERE 1");
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $lista;
        } catch(Exception $th){
            // Manejar la excepción, por ejemplo:
            echo "Error: " . $th->getMessage();
            return array();
        } 
    }



    public function Buscar($coddistri, $years) {
        try {
            // Crear una instancia de la clase de conexión
            $conexionBD = new ConexionBD();
            
            // Obtener la conexión
            $conexion = $conexionBD->getConexion();

            // Preparar la consulta SQL parametrizada
            $sql = "SELECT * FROM datadistri WHERE coddistri = :coddistri AND years = :years";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':coddistri', $coddistri, PDO::PARAM_INT);
            $stmt->bindParam(':years', $years, PDO::PARAM_INT);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener los resultados
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //el resultado es una matriz
            return $result;
        } catch (PDOException $e) {
            // Manejar la excepción de conexión aquí
            return NULL;
        }
    }
    
}
/*
$obj = new ClaseDao();
echo $obj->Buscar(3,2021)[0]['Predicion'];
/*
/*
$objBean = new Bean();
$objBean->setCODDISTRITO(1);
$objBean->setYEARS(2025);
$objBean->setPREDICCION(75156.58);

$obj = new ClaseDao();
$obj->InsertarData($objBean);*/
?>
