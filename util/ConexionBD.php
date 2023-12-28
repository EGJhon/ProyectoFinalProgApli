<?php
class ConexionBD {
    private $server = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'Datadistritos';

    public function getConexion() {
        try {
            $conn = new PDO("mysql:host={$this->server};dbname={$this->database}", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            return('Connection Failed: ' . $e->getMessage());
        }
    }
}
?>
