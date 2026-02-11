<?php 

namespace com\leartik\daw24doca\produktuak;
    
    
    class Kategoria{
        private $id;
        private $izena;
        private $deskribapena;

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
    }

?>