<?php
namespace com\leartik\daw24doca\produktuak;

Class Saskia{

    private $detaileak;

    public function __construct(){
        $this->detaileak = array();
    }

    public function setDetaileak($detaileak){
        $this-> detaileak = $detaileak;
    }
    
    public function getDetaileak(){
        return $this->detaileak;
    }
    
    public function detaileaGehitu($detailea){
        $this->detaileak[] = $detailea;
    }
    
    public function getSaskiaGuztira(){
    $totala = 0;
    foreach ($this->detaileak as $detailea) {
        $totala += $detailea->getGuztira();
    }
    return $totala;
    }
    //unitatik gehitu
    public function unitateaGehitu($id){
        foreach($this->detaileak as $indizea => $detailea){
            if($detailea->getArtikulua()->getId() == $id){
                $kopuruBerria = $detailea->getKopurua() +1;
                $detailea -> setKopurua($kopuruBerria);
                break;
            }
        }
    }

    public function unitateaKendu($id){
        foreach($this->detaileak as $indizea => $detailea){
            if($detailea->getArtikulua()->getId() == $id){
                $kopuruBerria = $detailea->getKopurua();

                if($kopuruBerria > 1){
                    $detailea-> setKopurua($kopuruBerria - 1);
                }else{
                    $this->detaileaEzabatu($id);
                }
                break;
            }
        }
    }

public function detaileaEzabatu($id){
        foreach($this->detaileak as $indizea => $detailea){
            if($detailea->getArtikulua()->getId() == $id){
                unset($this->detaileak[$indizea]);
                $this->detaileak = array_values($this->detaileak);
                break;
            }
        }
    }
}
?>