<?php
namespace com\leartik\daw24doca\produktuak;

Class Eskaria{

    private $id;
    private $data;
    private $bezeroa;
    private $detaileak;
    private $egoera;

    public function __construct()
    {
        $this->detaileak = array();
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }

    public function setBezeroa($bezeroa){
        $this->bezeroa = $bezeroa;
    }

    public function getBezeroa(){
        return $this->bezeroa;
    }

    public function setDetaileak($detaileak){
        $this->detaileak = $detaileak;
    }

    public function getDetaileak(){
        return $this->detaileak;
    }

    public function setEgoera($egoera) { 
        $this->egoera = $egoera; 
    }
    
    public function getEgoera() { 
        return $this->egoera; 
    }
}