<!DOCTYPE html>
<html>
<head>
  <title>Quiz</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="settings.js"></script>
  <script src="sound.js"></script>
  <script src="FnButton.js"></script>
  <script src="inputclick.js"></script>
  <script src="ablak.js"></script>
  <script src="script.js"></script>
  <script src="points.js"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="icon/logo.png" type="image/x-icon">
  
</head>
<body>
  <div id="container">
    <div id="info">
  <h1>Quiz <p id="mypont">0</p></h1>
  <div id="imgselect">
  <p id="wine"><img src="wine.png" class="img" alt=""></p>
  <p id="shot"><img src="shot.png"class="img" alt=""></p>
  <p id="cocktail"><img src="cocktail.png"class="img" alt=""></p>
  <p id="dollar"><img src="dollar.png"class="img" alt=""></p>
  <p id="aktualisp"> Aktuális: <img id="aktualis" class="img2"/></p>
</div>
  <h1>Pontok<p id="pont">10</p><p id="minuspont"></p></h1>
  </div>
  
  <?php include 'quiz.php'; ?>
  <form action="" id="textsboxs" method="post">
    <input type="text" name="input_1" id="input_1"   required>
    <input type="text" name="input_2" id="input_2" required>
    <input type="text" name="input_3" id="input_3"   required>
    <input type="text" name="input_4" id="input_4"required>
</form>
<button onclick="gomb()">Válaszadás</button>
<p id="delete">Törlés</p>
<div id="content"></div>
<div id="numberPopup">
<ul id="numberContainer"></ul>
</div>
      <div id="ablak">
        <p id="ablakszoveg"></p>
      </div>
</div>
<br>
<div id="content2">
<p id="comment"> <img src="icon/comment.png" class="icon" ></p>
<p id="infobutton"> <img src="icon/info.png" class="icon" ></p>
<p id="settingsbutton"> <img src="icon/settings.png" class="icon" ></p>
<div id="rank">

</div>

<div id="minicontent">
<form action="forum.php" method="post" id="forum">
<h2>Küldj üzenetet</h2>  

<label for="name">Név:</label>
  <textarea name="name" id="name" rows="1" required></textarea><br>

  <label for="message">Üzenet:</label>
  <textarea name="message" id="message" rows="10" required></textarea><br>

  <input type="submit" value="Küldés" class="button">
</form>
  <iframe src="levelek.html"></iframe>
</div>


<div id="infodiv">
<h2>Szabályok</h2>
  <p>"Pontok" jelzik hogy mennyi poharad van amit ki kell osztanod
  Az összes pontodat rá kell raknod valamelyik mezőre hogy tovább tudj haladni a következő lépésre<
  Amennyiben el fogy az összes pontod megjelenik a vereség felirat és a játék alatt egy táblába hogy mennyi pontot gyüjtöttél és milyen eredményt értél el
  A te eredményed mindig a legelső a táblában<
  Ki tudod választani milyen kis ikont szeretnél használni a quiz tetején és a kiválasztott ikon megjelenik az Aktuális: négyzetben<
  Bármikor lehet változtatni a kis ikont. A Quiz alatti szám jelzi hogy mennyi kérdésre adtál eddig jó választ</p>
</div>
</div>
<div id="settingsdiv">
<p id="epickCard">Különleges kártyák bekapcsolása</p>
</div>

<audio id="buttonmp" src="sounds/button.mp3"></audio>
<audio id="errormp" src="sounds/error.mp3"></audio>
<audio id="victorymp" src="sounds/victory.mp3"></audio>
<audio id="oohmp" src="sounds/ooh.mp3"></audio>
<audio id="yesmp" src="sounds/yes.mp3"></audio>
<audio id="nomp" src="sounds/no.mp3"></audio>
</body>
</html>
