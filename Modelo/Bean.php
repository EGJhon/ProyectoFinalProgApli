<?php
class Bean {
    public $CODIGO ;
    public $CODDISTRITO;
    public $AÑO ;
    public $PREDICCION;


    public function getCODIGO() {
        return $this->CODIGO;
    }

    public function setCODIGO($CODIGO) {
        $this->CODIGO = $CODIGO;
    }

    public function getCODDISTRITO() {
        return $this->CODDISTRITO;
    }

    public function setCODDISTRITO($CODDISTRITO) {
        $this->CODDISTRITO = $CODDISTRITO;
    }

    public function getYEARS() {
        return $this->YEARS;
    }

    public function setYEARS($YEARS) {
        $this->YEARS = $YEARS;
    }

    public function getPREDICCION() {
        return $this->PREDICCION;
    }

    public function setPREDICCION($PREDICCION) {
        $this->PREDICCION = $PREDICCION;
    }
    
}
?>