<?php
session_start();

$parametroak = [
    'erabiltzailearen_mezua' => ''
];

$erroreak = [
    'erabiltzailearen_mezua' => '',
];

$botaren_mezua = '';
$hasierako_mezua = '';

if (!isset($_SESSION['txataren_mezuak']))
    $_SESSION['txataren_mezuak'] = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST'):

    $parametroak['erabiltzailearen_mezua'] = trim($_POST['erabiltzailearen_mezua']);

    if (mb_strlen($parametroak['erabiltzailearen_mezua']) == 0):
        $erroreak['erabiltzailearen_mezua']  = 'Mezua falta da';
    endif;

    if (implode($erroreak) != ''):
        $hasierako_mezua = 'Mesedez, zuzendu ondorengo akatsa:';
    else:
        $hasierako_mezua = 'Zure mezua baliozkoa da';

        $_SESSION['txataren_mezuak'][] = ["role" => "user", "content" => $parametroak['erabiltzailearen_mezua']];

        // 1. FILTROAK LORTZEKO DEIA
        $data = [
            "model" => "gpt-4o",
            "messages" => array_merge([
                [
                    "role" => "system",
                    "content" => "Izenburua, egilea, hasierako_urtea, amaierako_urtea, formatua, egoera, salneurri_minimoa eta salneurri_maximoa gako-eremuak dituen bilaketa-iragazkiak itzuli behar dituzu json formatuan. Gako-eremu hauentzako balorerik ez badago null erabili. Ez sartu testu gehigarririk."
                ]
            ], $_SESSION['txataren_mezuak'])
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // XAMPPn akatsak ekiditeko
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . getenv('OPENAI_API_KEY'),
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $response = curl_exec($ch);
        curl_close($ch);

        $response_data = json_decode($response, true);
        $text = $response_data['choices'][0]['message']['content'] ?? '{}';
        
        // Markdown garbiketa
        $text = preg_replace('/^```json|```$/m', '', $text);
        $filtroak = json_decode(trim($text), true);

        // DATU BASEAREN LOGIKA (ZUREA)
        $db = new PDO('sqlite:C:\\xampp\\htdocs\\Erronka01\\denda.db'); // Zure denda.db bidea
        $sql = "SELECT * FROM produktuak WHERE 1=1";
        $sql_parametroak = [];

        // WARNING-A EKIDITEKO BALIDAZIOAK (Zurea mantenduz baina ?? null jarriz)
        if (($filtroak['izena'] ?? null) != null) {
            $sql .= " AND izena LIKE ?";
            $sql_parametroak[] = "%{$filtroak['izena']}%";
        }
        if (($filtroak['salneurri_minimoa'] ?? null) != null) {
            $sql .= " AND prezioa >= ?";
            $sql_parametroak[] = $filtroak['salneurri_minimoa'];
        }
        if (($filtroak['salneurri_maximoa'] ?? null) != null) {
            $sql .= " AND prezioa <= ?";
            $sql_parametroak[] = $filtroak['salneurri_maximoa'];
        }

        $kontsulta = $db->prepare($sql);
        $kontsulta->execute($sql_parametroak);
        $diskoak = $kontsulta->fetchAll();

        $katalogoa = '';
        foreach ($diskoak as $diskoa) {
            $katalogoa .= "* -Izena: {$diskoa['izena']} -Prezioa: {$diskoa['prezioa']}€ -Deskribapena: {$diskoa['deskribapena']}\n";
        }

        // 2. AZKEN ERANTZUNA LORTZEKO DEIA (ZURE PROMPT-AREKIN)
        $data = [
            "model" => "gpt-4o",
            "messages" => array_merge([
                [
                    "role" => "system",
                    "content" => "- Online denda baten laguntzailea zara.\n
                                 - Dendaren informazioa: DoggyShop.\n
                                 - Dendan eskuragarri dauden produktuen informazioa erabiliko duzu bakarrik: $katalogoa\n
                                 - Eskatutakoa ez bada aurkitzen dendan ez dagoela adierazi.\n
                                 - Erantzuna ahalik eta motzena eta zuzena izan behar da euskara hutsean."
                ]
            ], $_SESSION['txataren_mezuak'])
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . getenv('OPENAI_API_KEY'),
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $response = curl_exec($ch);
        curl_close($ch);

        $response_data = json_decode($response, true);
        $botaren_mezua = $response_data['choices'][0]['message']['content'] ?? "Sentitzen dut, ezin dizut lagundu.";

        $_SESSION['txataren_mezuak'][] = ["role" => "assistant", "content" => $botaren_mezua];

        echo $botaren_mezua;
        exit;

    endif;
else: 
    include('chatbota-erakutsi.php');
endif;
?>