<?php
// Ellenőrizd, hogy a kérdés és válaszok elküldve lettek-e
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ellenőrizd, hogy minden mező kitöltve lett-e
  if (isset($_POST["question"]) && isset($_POST["answer1"]) && isset($_POST["answer2"]) && isset($_POST["answer3"]) && isset($_POST["answer4"]) && isset($_POST["correct"])) {
    $question = $_POST["question"];
    $answer1 = $_POST["answer1"];
    $answer2 = $_POST["answer2"];
    $answer3 = $_POST["answer3"];
    $answer4 = $_POST["answer4"];
    $correct = $_POST["correct"];

    // Betöltés az adatbázis.xml fájlból
    $xml = simplexml_load_file("adatbazis.xml");

    // Új <question> elem létrehozása
    $newQuestion = $xml->addChild("question");

    // <text> elem hozzáadása a kérdéshez
    $newQuestion->addChild("text", $question);

    // <answers> elem hozzáadása a válaszokhoz
    $answers = $newQuestion->addChild("answers");

    // <answer> elemek hozzáadása a válaszokhoz
    $answers->addChild("answer", $answer1)->addAttribute("correct", in_array("answer1", $correct) ? "true" : "false");
    $answers->addChild("answer", $answer2)->addAttribute("correct", in_array("answer2", $correct) ? "true" : "false");
    $answers->addChild("answer", $answer3)->addAttribute("correct", in_array("answer3", $correct) ? "true" : "false");
    $answers->addChild("answer", $answer4)->addAttribute("correct", in_array("answer4", $correct) ? "true" : "false");

    // XML fájl mentése
    $xml->asXML("adatbazis.xml");

    echo "A kérdés és válaszok sikeresen hozzáadva az adatbázishoz.";
  } else {
    echo "Kérlek tölts ki minden mezőt!";
  }
}
?>
