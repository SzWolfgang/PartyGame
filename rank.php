<?php

//adatok fogadása
if(isset($_POST['playerName']) && isset($_POST['playerPoints'])){
    $playerName = $_POST['playerName'];
    $pont = $_POST['playerPoints'];
}

// Az aktuális dátum lekérése
$currentDate = date("Y-m-d H:i:s");
// HTML táblázat létrehozása
$table = "<table>
            <tr>
                <th>Player</th>
                <th>Dátum</th>
                <th>Pont</th>
            </tr>
            <tr>
                <td>$playerName</td>
                <td>{$currentDate}</td>
                <td>{$pont}</td>
            </tr>
        </table>";

// Az adatok kiírása az oldalra
//echo "<div id=\"rank\">{$table}</div>";

// XML fájl létrehozása, ha nem létezik
if (!file_exists('ranks.xml')) {
    $xml = new DOMDocument();
    $xml->formatOutput = true;
    $xml->appendChild($xml->createElement('root'));
} else {
    // XML fájl betöltése, ha már létezik
    $xml = new DOMDocument();
    $xml->load('ranks.xml');
}

$root = $xml->documentElement;

// Új adat hozzáadása a táblázathoz
$data = $xml->createElement('data');
$data->appendChild($xml->createElement('player', $playerName));
$data->appendChild($xml->createElement('datum', date("Y-m-d")));
$data->appendChild($xml->createElement('pont', $pont));

// Az első elem hozzáadása a root elem gyerekei közé
if ($root->hasChildNodes()) {
    $firstChild = $root->firstChild;
    $root->insertBefore($data, $firstChild);
} else {
    $root->appendChild($data);
}

// XML fájl mentése
$xml->save('ranks.xml');

?>
<?php
// XML fájl betöltése
if (file_exists('ranks.xml')) {
    $xml = new DOMDocument();
    $xml->load('ranks.xml');

    $root = $xml->documentElement;

    // XML elemek beolvasása és kiírása
    $dataList = $root->getElementsByTagName('data');

    echo '<table>';
    echo '<p id="ranktext">Előző játékok</p>';
    echo '<tr><th>Player</th><th>Datum</th><th>Pont</th></tr>';

    foreach ($dataList as $data) {
        $player = $data->getElementsByTagName('player')->item(0)->nodeValue;
        $datum = $data->getElementsByTagName('datum')->item(0)->nodeValue;
        $pont = $data->getElementsByTagName('pont')->item(0)->nodeValue;

        echo '<tr><td>' . $player . '</td><td>' . $datum . '</td><td>' . $pont . '</td></tr>';
    }

    echo '</table>';
} else {
    echo 'Nincs adat a ranglistában.';
}
?>

