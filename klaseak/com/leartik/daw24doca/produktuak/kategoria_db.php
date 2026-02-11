<?php

namespace com\leartik\daw24doca\produktuak;

use com\leartik\daw24doca\produktuak\Kategoria;
use PDO;
use Exception;

class KategoriaDB
{
    private static function getKonexioa()
    {
        $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka01\\denda.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public static function selectKategoriak()
    {
        try {
            $db = self::getKonexioa();
            $erregistroak = $db->query("SELECT * FROM kategoriak");
            $kategoriak = array();
            while ($erregistroa = $erregistroak->fetch()) {
                $kategoria = new Kategoria();
                $kategoria->setId($erregistroa['id']);
                $kategoria->setIzena($erregistroa['izena']);
                $kategoria->setDeskribapena($erregistroa['deskribapena']);
                $kategoriak[] = $kategoria;
            }
            return $kategoriak;
        } catch (Exception $e) {
            return array();
        }
    }

    public static function selectKategoria($id)
    {
        try {
            $db = self::getKonexioa();
            $stmt = $db->prepare("SELECT * FROM kategoriak WHERE id = :id");
            $stmt->execute([':id' => $id]);
            
            $kategoria = null;
            if ($erregistroa = $stmt->fetch()) {
                $kategoria = new Kategoria();
                $kategoria->setId($erregistroa['id']);
                $kategoria->setIzena($erregistroa['izena']);
                $kategoria->setDeskribapena($erregistroa['deskribapena']);
            }
            return $kategoria;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function insertKategoria($kategoria)
    {
        try {
            $db = self::getKonexioa();
            $stmt = $db->prepare("INSERT INTO kategoriak (izena, deskribapena) VALUES (:izena, :deskribapena)");
            $emaitza = $stmt->execute([
                ':izena' => $kategoria->getIzena(),
                ':deskribapena' => $kategoria->getDeskribapena()
            ]);
            return $emaitza ? 1 : 0;
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function aldatuKategoria($kategoria)
    {
        try {
            $db = self::getKonexioa();
            $stmt = $db->prepare("UPDATE kategoriak SET izena = :izena, deskribapena = :deskribapena WHERE id = :id");
            $emaitza = $stmt->execute([
                ':izena' => $kategoria->getIzena(),
                ':deskribapena' => $kategoria->getDeskribapena(),
                ':id' => $kategoria->getId()
            ]);
            return $stmt->rowCount();
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function ezabatuKategoria($kategoria)
    {
        try {
            $db = self::getKonexioa();
            $stmt = $db->prepare("DELETE FROM kategoriak WHERE id = :id");
            $emaitza = $stmt->execute([':id' => $kategoria->getId()]);
            return $stmt->rowCount();
        } catch (Exception $e) {
            return 0;
        }
    }
}