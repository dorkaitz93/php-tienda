<?php
namespace com\leartik\daw24doca\produktuak;

Class Detailea{
    private $artikulua;
    private $kopurua;

    public function setArtikulua($artikulua){
        $this->artikulua = $artikulua;
    }

    public function getArtikulua(){
        return $this->artikulua;
    }

    public function setKopurua($kopurua){
        $this->kopurua = $kopurua;
    }

    public function getKopurua(){
        return $this->kopurua;
    }

    public function getGuztira(){
    $prezioa = $this->artikulua->getPrezioa();
    $deskontua = $this->artikulua->getEskaintza(); // Adibidez: 20

    if ($deskontua > 0) {
        $prezioUnitarioa = $prezioa - ($prezioa * ($deskontua / 100));
    } else {
        $prezioUnitarioa = $prezioa;
    }
    return $prezioUnitarioa * $this->kopurua;
    }
    
    
}
?>