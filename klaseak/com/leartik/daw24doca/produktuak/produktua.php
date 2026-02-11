<?php 
    namespace com\leartik\daw24doca\produktuak;
    
    
    class Produktua{
        private $id;
        private $izena;
        private $deskribapena;
        private $prezioa;
        private $nobedadea;
        private $eskaintza;
        private $kategoriaId;
        private $idMezuak;

        public function __construct()
        {
            
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setIzena($izena){
            $this->izena = $izena;
        }

        public function getIzena(){
            return $this->izena;
        }

        public function setDeskribapena($deskribapena){
            $this->deskribapena = $deskribapena;
        }

        public function getDeskribapena(){
            return $this->deskribapena;
        }

        public function setPrezioa($prezioa){
            $this->prezioa = $prezioa;
        }

        public function getPrezioa(){
            return $this->prezioa;
        }
        
        public function setNobedadea($nobedadea){
            $this->nobedadea = $nobedadea;
        }
        
        public function getNobedadea(){
            return $this->nobedadea;
        }
        
        public function setEskaintza($eskaintza){
            $this->eskaintza = $eskaintza;
        }
        
        public function getEskaintza(){
            return $this->eskaintza;
        }

        public function setKategoriaId($kategoriaId){
            $this->kategoriaId = $kategoriaId;
        }

        public function getKategoriaId(){
            return $this->kategoriaId;
        }
        public function setIdMezuak($id) {
        $this->idMezuak = $id;
        }
        public function getIdMezuak() {
        return $this->idMezuak;
        }
    }   
?>