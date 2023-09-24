<?php
// Olvassa be a cards.xml fájlt
$xml = simplexml_load_file('Cards.xml');

// Tároló tömb a kártyák szövegeinek
$kartyak = [];

foreach ($xml->card as $card) {
    // Kérdés hozzáadása a tömbhöz
    $kartyak[] = (string) $card;
}

$randomNumber = rand(0, 21);

$kartya =$kartyak[$randomNumber];

echo($kartya);
?>
