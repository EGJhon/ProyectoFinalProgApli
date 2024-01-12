<?php 
class BeanClasificador{
        public $prediccion;
        public $textiles;
        public $electronicos;
        public $vidrios;
        public $metales;
        public $cartonypapel;
        public $plastico;
    
        public function getprediccion() {
            return $this->prediccion;
        }
    
        public function setprediccion($prediccion) {
            $this->prediccion = $prediccion;
        }
    
        public function gettextiles() {
            return $this->textiles;
        }
    
        public function settextiles($textiles) {
            $this->textiles = $textiles;
        }
    
        public function getelectronicos() {
            return $this->electronicos;
        }
    
        public function setelectronicos($electronicos) {
            $this->electronicos = $electronicos;
        }
    
        public function getvidrios() {
            return $this->vidrios;
        }
    
        public function setvidrios($vidrios) {
            $this->vidrios = $vidrios;
        }
    
        public function getmetales() {
            return $this->metales;
        }
    
        public function setmetales($metales) {
            $this->metales = $metales;
        }
    
        public function getcartonypapel() {
            return $this->cartonypapel;
        }
    
        public function setcartonypapel($cartonypapel) {
            $this->cartonypapel = $cartonypapel;
        }
    
        public function getplastico() {
            return $this->plastico;
        }
    
        public function setplastico($plastico) {
            $this->plastico = $plastico;
        }    
}
?>