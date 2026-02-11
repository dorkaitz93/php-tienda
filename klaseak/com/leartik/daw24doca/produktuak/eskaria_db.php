<?php
namespace com\leartik\daw24doca\produktuak;

use com\leartik\daw24doca\produktuak\Eskaria;
use com\leartik\daw24doca\produktuak\Bezeroa;
use PDO;
use Exception;

class EskariaDB {

    private static function getKonexioa() {
        $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka01\\denda.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public static function selectEskaria($id) {
        try {
            $db = self::getKonexioa();
            
            $sql = "SELECT e.*, b.izena, b.abizenak, b.helbidea, b.herria, b.posta_kodea, b.probintzia, b.email 
                    FROM eskariak e 
                    JOIN bezeroak b ON e.bezero_id = b.id 
                    WHERE e.id = :id";
            
            $stmt = $db->prepare($sql);
            $stmt->execute([':id' => $id]);
            
            if ($erregistroa = $stmt->fetch()) {
                $eskaria = new Eskaria();
                $eskaria->setId($erregistroa['id']);
                $eskaria->setData($erregistroa['data']);
                $eskaria->setEgoera($erregistroa['egoera']);

                $bezeroa = new Bezeroa();
                $bezeroa->setIzena($erregistroa['izena']);
                $bezeroa->setAbizenak($erregistroa['abizenak']);
                $bezeroa->setHelbidea($erregistroa['helbidea']);
                $bezeroa->setHerria($erregistroa['herria']);
                $bezeroa->setPostaKodea($erregistroa['posta_kodea']);
                $bezeroa->setProbintzia($erregistroa['probintzia']);
                $bezeroa->setEmaila($erregistroa['email']);

                $eskaria->setBezeroa($bezeroa);
                return $eskaria;
            }
            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function selectEskariak() {
        try {
            $db = self::getKonexioa();

            $sql = "SELECT e.id AS eskaria_id, e.data, b.* FROM eskariak e 
                    INNER JOIN bezeroak b ON e.bezero_id = b.id 
                    ORDER BY e.data ASC";

            $erregistroak = $db->query($sql);
            $eskariak = array();

            while ($lerroa = $erregistroak->fetch()) {
                $eskaria = new Eskaria();
                $eskaria->setId($lerroa['eskaria_id']);
                $eskaria->setData($lerroa['data']);
                
                $bezeroa = new Bezeroa();
                $bezeroa->setIzena($lerroa['izena']);
                $bezeroa->setAbizenak($lerroa['abizenak']);
                $bezeroa->setEmaila($lerroa['email']);
                
                $eskaria->setBezeroa($bezeroa);
                $eskariak[] = $eskaria;
            }
            return $eskariak;
        } catch (Exception $e) {
            return array();
        }
    }

    public static function insertEskaria($eskaria) {
        try {
            $db = self::getKonexioa();

            $bezeroa = $eskaria->getBezeroa();
            $sqlBezeroa = "INSERT INTO bezeroak (izena, abizenak, helbidea, herria, posta_kodea, probintzia, email) 
                           VALUES (:izena, :abizenak, :helbidea, :herria, :pk, :prob, :email)";
            
            $stmtBez = $db->prepare($sqlBezeroa);
            $stmtBez->execute([
                ':izena' => $bezeroa->getIzena(),
                ':abizenak' => $bezeroa->getAbizenak(),
                ':helbidea' => $bezeroa->getHelbidea(),
                ':herria' => $bezeroa->getHerria(),
                ':pk' => $bezeroa->getPostaKodea(),
                ':prob' => $bezeroa->getProbintzia(),
                ':email' => $bezeroa->getEmaila()
            ]);
            
            $bezero_id = $db->lastInsertId();

            $sqlEskaria = "INSERT INTO eskariak (data, bezero_id, egoera) VALUES (:data, :bezero_id, 'Prestatzen')";
            $stmtEsk = $db->prepare($sqlEskaria);
            $stmtEsk->execute([
                ':data' => $eskaria->getData(),
                ':bezero_id' => $bezero_id
            ]);
            
            $eskaria_id = $db->lastInsertId();

            $sqlDetailea = "INSERT INTO eskari_detaileak (eskaria_id, produktua_id, kopurua, prezioa_unitarioa) 
                            VALUES (:eskaria_id, :p_id, :kop, :prez)";
            $stmtDet = $db->prepare($sqlDetailea);

            foreach ($eskaria->getDetaileak() as $detailea) {
                $stmtDet->execute([
                    ':eskaria_id' => $eskaria_id,
                    ':p_id' => $detailea->getArtikulua()->getId(),
                    ':kop' => $detailea->getKopurua(),
                    ':prez' => $detailea->getArtikulua()->getPrezioa()
                ]);
            }

            return $eskaria_id;

        } catch (Exception $e) {
            die("DATU-BASEKO ERROREA: " . $e->getMessage());
        }
    }

    public static function deleteEskaria($id) {
        try {
            $db = self::getKonexioa();
            $sql = "DELETE FROM eskariak WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount(); 
        } catch (Exception $e) {
            return 0;
        }
    }
}
?>