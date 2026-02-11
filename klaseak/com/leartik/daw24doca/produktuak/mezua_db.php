<?php 
namespace com\leartik\daw24doca\produktuak;

use com\leartik\daw24doca\produktuak\Mezua;
use PDO;
use Exception;

class MezuakDB {
    private static function getKonexioa() {
        $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka01\\denda.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public static function selectMezuak() {
        try {
            $db = self::getKonexioa();
            $erregistroak = $db->query("SELECT * FROM mezuak");
            $mezuak = array();
            while($erregistroa = $erregistroak->fetch()) {
                $mezua = new Mezua();
                $mezua->setId($erregistroa['id']);
                $mezua->setIzena($erregistroa['izena']);
                $mezua->setEmail($erregistroa['email']);
                $mezua->setMezua($erregistroa['mezua']);
                $mezua->setErantzunda($erregistroa['erantzunda']);
                $mezua->setSortzeData($erregistroa['sortze_data']);
                $mezuak[] = $mezua;
            }
            return $mezuak;
        } catch(Exception $e) {
            return array();
        }
    }

    public static function selectMezua($id) {
        try {
            $db = self::getKonexioa();
            $stmt = $db->prepare("SELECT * FROM mezuak WHERE id = :id");
            $stmt->execute([':id' => $id]);
            
            $mezua = null;
            if($erregistroa = $stmt->fetch()) {
                $mezua = new Mezua();
                $mezua->setId($erregistroa['id']);
                $mezua->setIzena($erregistroa['izena']);
                $mezua->setEmail($erregistroa['email']);
                $mezua->setMezua($erregistroa['mezua']);
                $mezua->setErantzunda($erregistroa['erantzunda']);
                $mezua->setSortzeData($erregistroa['sortze_data']);
            }
            return $mezua;
        } catch(Exception $e) {
            return null;
        }
    }

    public static function insertMezua($mezua) {
        try {
            $db = self::getKonexioa();
            $sql = "INSERT INTO mezuak (izena, email, mezua, erantzunda, sortze_data) 
                    VALUES (:izena, :email, :mezua, :erantzunda, :sortze_data)";
            $stmt = $db->prepare($sql);
            $emaitza = $stmt->execute([
                ':izena' => $mezua->getIzena(),
                ':email' => $mezua->getEmail(),
                ':mezua' => $mezua->getMezua(),
                ':erantzunda' => $mezua->getErantzunda(),
                ':sortze_data' => $mezua->getSortzeData()
            ]);
            return $emaitza ? 1 : 0;
        } catch(Exception $e) {
            return 0;
        }
    }
    
    public static function aldatuMezua($mezua) {
        try {
            $db = self::getKonexioa();
            $sql = "UPDATE mezuak SET 
                    izena = :izena, email = :email, mezua = :mezua, 
                    erantzunda = :erantzunda, sortze_data = :sortze_data 
                    WHERE id = :id";
            $stmt = $db->prepare($sql);
            $emaitza = $stmt->execute([
                ':izena' => $mezua->getIzena(),
                ':email' => $mezua->getEmail(),
                ':mezua' => $mezua->getMezua(),
                ':erantzunda' => $mezua->getErantzunda(),
                ':sortze_data' => $mezua->getSortzeData(),
                ':id' => $mezua->getId()
            ]);
            return $stmt->rowCount();
        } catch(Exception $e) {
            return 0;
        }
    }
    
    public static function ezabatuMezua($id) {
        try {
            $db = self::getKonexioa();
            $stmt = $db->prepare("DELETE FROM mezuak WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount();
        } catch(Exception $e) {
            return 0;
        }
    }
}