<?php

//xml file betöltése és adatok tömbbe rendezése
$xml = simplexml_load_file('adatbazis.xml');
$questions = $xml->question;
$quizData = array();

foreach ($questions as $question) {
    $questionText = $question->text;
    $answers = $question->answers->answer;
    $questionData = array(
        'question' => $questionText,
        'answers' => array()
    );

    foreach ($answers as $answer) {
        $isCorrect = $answer->attributes()->correct == 'true';
        $answerText = $answer;

        $questionData['answers'][] = array(
            'text' => $answerText,
            'correct' => $isCorrect
        );
    }

    $quizData[] = $questionData;
}


//szám generálás
$randomNumber = rand(0, 322);
   // echo "Véletlenszerű szám: " . $randomNumber;

$i=1;

echo '<div id="content">';
echo '<p id="kerdes">' . $quizData[$randomNumber]['question'] . '</p>';
echo '<ul>';


//KIIRÁS 

foreach ($quizData[$randomNumber]['answers'] as $answer) {
    $answerText = $answer['text'];
    $isCorrect = $answer['correct'];

    echo '<li';
    if ($isCorrect) {
        $helyesvalasz = $answerText;
        $sor = 'input_'.$i;
    }
    echo '>' . $answerText . '</li>';
    $i++;
}

echo '</ul>'.'</div>';
echo('<p id="valasz">'.$sor.'</p>'); //-HELYES válasz



    


    if(isset($_POST['variable'])){
       $receivedVariable = $_POST['variable'];
        
 
    }
?>
