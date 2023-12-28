<?php
require_once '../util/ConexionBD.php';
require_once 'Bean.php';
require_once 'BeanPersonas.php';

class ClaseDao {

    public function InsertarData(Bean $obj){
        $i = 0;
        try{
            $conexion = new ConexionBD();
            $conn = $conexion->getConexion();
    
            $stmt = $conn->prepare("INSERT INTO `Datadistri` (`coddata`, `coddistri`, `years`, `Prediccion`)
            VALUES (NULL, :coddistrito, :years, :prediccion);");
    
            // Asignar valores a las variables
            $coddistrito = $obj->getCODDISTRITO();
            $years = $obj->getYEARS();
            $predicion = $obj->getPREDICCION();
    
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
            $sql = "SELECT * FROM Datadistri WHERE coddistri = :coddistri AND years = :years";
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

    public function distrito($coddistri) {
        try {
            // Crear una instancia de la clase de conexión
            $conexionBD = new ConexionBD();
            
            // Obtener la conexión
            $conexion = $conexionBD->getConexion();

            // Preparar la consulta SQL parametrizada
            $sql = "SELECT * FROM Distritos WHERE coddistri = :coddistri ";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':coddistri', $coddistri, PDO::PARAM_INT);

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

    public function existe_usr($usr,$pass) {
        try {
            // Crear una instancia de la clase de conexión
            $conexionBD = new ConexionBD();
            
            // Obtener la conexión
            $conexion = $conexionBD->getConexion();

            // Preparar la consulta SQL parametrizada
            $sql = "SELECT * FROM usuarios WHERE pass = :pass and correo = :usr ";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':usr', $usr);

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
    
    public function Registrar_usr(BeanPersonas $obj) {
        $i = 0;
        try{
            $conexion = new ConexionBD();
            $conn = $conexion->getConexion();
    
            $stmt = $conn->prepare("INSERT INTO `usuarios` (`codusu`, `nombre`, `apellido`, `correo`,`pass`,`sesion`)
            VALUES (NULL, :nombre, :apellido, :correo, :pass, 0 );");
    
            // Asignar valores a las variables
            $nombre = $obj->getnombre();
            $apellido = $obj->getapellido();
            $correo = $obj->getcorreo();
            $pass = $obj->getpass() ;
    
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':pass', $pass);              
            $i =  $stmt->execute();
            return true;  
        } catch(Exception $th){
            // Manejar la excepción, por ejemplo:
            echo "Error: " . $th->getMessage();
            return false;
        } 
    }
    public function sesion($usr) {
        $i = 0;
        try{
            $conexion = new ConexionBD();
            $conn = $conexion->getConexion();
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = :usr");
            $stmt->bindParam(':usr', $usr);
            $stmt->execute();
            $respuesta=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $val= $respuesta[0]["sesion"] + 1;
            $stmt = $conn->prepare("UPDATE usuarios
            SET sesion = :val
            WHERE correo = :usr;
            ");
            $stmt->bindParam(':usr', $usr);
            $stmt->bindParam(':val', $val);             
            $i =  $stmt->execute();
            return true;  
        } catch(Exception $th){
            // Manejar la excepción, por ejemplo:
            echo "Error: " . $th->getMessage();
            return false;
        } 
    }
}
?>
