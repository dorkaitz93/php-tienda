<?php

namespace com\leartik\daw24doca\produktuak;

use com\leartik\daw24doca\produktuak\Produktua;
use PDO;
use Exception;

class ProduktuaDB
{
    private static function getKonexioa() {
        $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka01\\denda.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("PRAGMA foreign_keys = ON;");
        return $db;
    }

    public static function selectProduktuak()
    {
        try {
            $db = self::getKonexioa();
            $erregistroak = $db->query("SELECT * FROM produktuak");
            $produktuak = array();
            while ($erregistroa = $erregistroak->fetch()) {
                $produktua = new Produktua();
                $produktua->setId($erregistroa['id']);
                $produktua->setIzena($erregistroa['izena']);
                $produktua->setDeskribapena($erregistroa['deskribapena']);
                $produktua->setPrezioa($erregistroa['prezioa']);
                $produktua->setKategoriaId($erregistroa['kategoria_id']);
                $produktua->setNobedadea($erregistroa['nobedadea']);
                $produktua->setEskaintza($erregistroa['eskaintza']);
                $produktuak[] = $produktua;
            }
            return $produktuak;
        } catch (Exception $e) {
            return array();
        }
    }

    public static function selectProduktua($id)
    {
        try {
            $db = self::getKonexioa();
            $stmt = $db->prepare("SELECT * FROM produktuak WHERE id = :id");
            $stmt->execute([':id' => $id]);
            
            $produktua = null;
            if ($erregistroa = $stmt->fetch()) {
                $produktua = new Produktua();
                $produktua->setId($erregistroa['id']);
                $produktua->setIzena($erregistroa['izena']);
                $produktua->setDeskribapena($erregistroa['deskribapena']);
                $produktua->setPrezioa($erregistroa['prezioa']);
                $produktua->setKategoriaId($erregistroa['kategoria_id']);
                $produktua->setNobedadea($erregistroa['nobedadea']);
                $produktua->setEskaintza($erregistroa['eskaintza']);
            }
            return $produktua;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function insertProduktua($produktua)
    {
        try {
            $db = self::getKonexioa();
            $sql = "INSERT INTO produktuak (izena, deskribapena, prezioa, nobedadea, eskaintza, kategoria_id) 
                    VALUES (:izena, :desk, :prez, :nob, :esk, :kat)";
            
            $stmt = $db->prepare($sql);
            return $stmt->execute([
                ':izena' => $produktua->getIzena(),
                ':desk'  => $produktua->getDeskribapena(),
                ':prez'  => $produktua->getPrezioa(),
                ':nob'   => $produktua->getNobedadea(),
                ':esk'   => $produktua->getEskaintza(),
                ':kat'   => $produktua->getKategoriaId()
            ]);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function aldatuProduktua($produktua) {
        try {
            $db = self::getKonexioa();
            $sql = "UPDATE produktuak SET 
                    izena = :izena, deskribapena = :desk, prezioa = :prez, 
                    nobedadea = :nob, eskaintza = :esk, kategoria_id = :kat 
                    WHERE id = :id";
            
            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':izena' => $produktua->getIzena(),
                ':desk'  => $produktua->getDeskribapena(),
                ':prez'  => $produktua->getPrezioa(),
                ':nob'   => $produktua->getNobedadea(),
                ':esk'   => $produktua->getEskaintza(),
                ':kat'   => $produktua->getKategoriaId(),
                ':id'    => $produktua->getId()
            ]);
            return $stmt->rowCount();
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function ezabatuProduktua($produktua)
    {
        try {
            $db = self::getKonexioa();
            $stmt = $db->prepare("DELETE FROM produktuak WHERE id = :id");
            $stmt->execute([':id' => $produktua->getId()]);
            return $stmt->rowCount();
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function selectEskaintza()
    {
        try {
            $db = self::getKonexioa();
            $erregistroak = $db->query("SELECT * FROM produktuak WHERE eskaintza > 0");
            $produktuak = array();
            while ($erregistroa = $erregistroak->fetch()) {
                $produktua = new Produktua();
                $produktua->setId($erregistroa['id']);
                $produktua->setIzena($erregistroa['izena']);
                $produktua->setDeskribapena($erregistroa['deskribapena']);
                $produktua->setPrezioa($erregistroa['prezioa']);
                $produktua->setKategoriaId($erregistroa['kategoria_id']);
                $produktua->setNobedadea($erregistroa['nobedadea']);
                $produktua->setEskaintza($erregistroa['eskaintza']);
                $produktuak[] = $produktua;
            }
            return $produktuak;
        } catch (Exception $e) {
            return array();
        }
    }

    public static function selectNobedadea()
    {
        try {
            $db = self::getKonexioa();
            $erregistroak = $db->query("SELECT * FROM produktuak WHERE nobedadea = 1");
            $produktuak = array();
            while ($erregistroa = $erregistroak->fetch()) {
                $produktua = new Produktua();
                $produktua->setId($erregistroa['id']);
                $produktua->setIzena($erregistroa['izena']);
                $produktua->setDeskribapena($erregistroa['deskribapena']);
                $produktua->setPrezioa($erregistroa['prezioa']);
                $produktua->setKategoriaId($erregistroa['kategoria_id']);
                $produktua->setNobedadea($erregistroa['nobedadea']);
                $produktua->setEskaintza($erregistroa['eskaintza']);
                $produktuak[] = $produktua;
            }
            return $produktuak;
        } catch (Exception $e) {
            return array();
        }
    }

    public static function selectProduktuaketaKategoria($kategoriaId)
    {
        try {
            $db = self::getKonexioa();
            $stmt = $db->prepare("SELECT * FROM produktuak WHERE kategoria_id = :kat_id");
            $stmt->execute([':kat_id' => $kategoriaId]);
            
            $produktuak = array();
            while ($erregistroa = $stmt->fetch()) {
                $produktua = new Produktua();
                $produktua->setId($erregistroa['id']);
                $produktua->setIzena($erregistroa['izena']);
                $produktua->setDeskribapena($erregistroa['deskribapena']);
                $produktua->setPrezioa($erregistroa['prezioa']);
                $produktua->setKategoriaId($erregistroa['kategoria_id']);
                $produktua->setNobedadea($erregistroa['nobedadea']);
                $produktua->setEskaintza($erregistroa['eskaintza']);
                $produktuak[] = $produktua;
            }
            return $produktuak;
        } catch (Exception $e) {
            return array();
        }
    }
}