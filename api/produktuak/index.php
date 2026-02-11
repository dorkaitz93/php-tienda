<?php
try {
    //produktuen datu-basera konektatu
    $db = new PDO("sqlite:C:\\xampp\\htdocs\\erronka01\\denda.db");

    //jasotako eskaria produktu bat eskuratzeko bada
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id'])) {
            $zenbakia = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
            if ($zenbakia !== null && $zenbakia !== false) {
                $sql = "select * from produktuak where id=" . $_GET['id'];
                $erregistroak = $db->query($sql);
                //produktua existitzen bada
                if ($erregistroa = $erregistroak->fetch()) {
                    $produktua = array();
                    $produktua['izena'] = $erregistroa['izena'];
                    $produktua['deskribapena'] = $erregistroa['deskribapena'];
                    $produktua['prezioa'] = $erregistroa['prezioa'];
                    $produktua['nobedadea'] = $erregistroa['nobedadea'];
                    $produktua['eskaintza'] = $erregistroa['eskaintza'];
                    // array- an json formatura bihurtu eta bezeroaren gana bidali
                    echo json_encode($produktua, JSON_UNESCAPED_UNICODE);
                } else {
                    http_response_code(404);
                    echo json_encode(["Errorea" => " Id ori ez da existitzen"]);
                }
            } else {
                http_response_code(400);
                echo json_encode(["errorea" => "id ori ez da existitzen"]);
            }
            //bestela,jasotako eskaria produktu guztiak eskuratzeko bada
        } else {
            //produktueen datuak berreskuratzeko kontsultsa exekutatu
            $sql = "select * from produktuak order by id asc";
            $erregistroak = $db->query($sql);
            //produktuak existitzen badira
            if ($erregistroa = $erregistroak->fetch()) {
                $albistea = array();
                $i = 0;
                do {
                    $produktuak[$i]['id'] = (int)$erregistroa['id'];
                    $produktuak[$i]['izena'] = $erregistroa['izena'];
                    $produktuak[$i]['deskribapena'] = $erregistroa['deskribapena'];
                    $produktuak[$i]['prezioa'] = $erregistroa['prezioa'];
                    $produktuak[$i]['nobedadea'] = $erregistroa['nobedadea'];
                    $produktuak[$i]['eskaintza'] = $erregistroa['eskaintza'];
                    $i++;
                } while ($erregistroa = $erregistroak->fetch());
                //produktuen bilduma json formatura bihurtu eta bezeroarengana bidali
                echo json_encode($produktuak, JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(404);
                echo json_encode(["errorea" => "id ori ez da existitzen"]);
            }
        }
    }
} catch (Exception $e) {
    echo null;
}
