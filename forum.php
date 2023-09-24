<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $message = $_POST["message"];

  // Az új tartalom összeállítása
  $content = "<p><strong>Név:</strong> $name</p>
              <p><strong>Üzenet:</strong> $message</p>
              <hr>";

  // index.php tartalmának betöltése
  $existingContent = file_get_contents("levelek.html");

  $startMarker = '<div id="textbox">';
  $endMarker = '</div>';
  $startIndex = strpos($existingContent, $startMarker) + strlen($startMarker);
  $endIndex = strpos($existingContent, $endMarker, $startIndex);
  $textboxContent = substr($existingContent, $startIndex, $endIndex - $startIndex);
  $newContent = str_replace($textboxContent, $content . $textboxContent, $existingContent);

  // Tartalom felülírása az index.php fájlban
  file_put_contents("levelek.html", $newContent);

  // Visszairányítás az index.html oldalra
  header("Location: index.php");
  exit();
}
?>
