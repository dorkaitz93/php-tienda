<?php 
    namespace com\leartik\daw24doca\produktuak;
    
    
    class Mezua{
        private $id;
        private $izena;
        private $email;
        private $mezua;
        private $erantzunda;
        private $sortzeData;


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

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setMezua($mezua){
            $this->mezua = $mezua;
        }

        public function getMezua(){
            return $this->mezua;
        }
        
        public function setErantzunda($erantzunda){
            $this->erantzunda = $erantzunda;
        }
        
        public function getErantzunda(){
            return $this->erantzunda;
        }
        
        public function setSortzeData($sortzeData){
            $this->sortzeData = $sortzeData;
        }
        
        public function getSortzeData(){
            return $this->sortzeData;
        }
    }   
?>