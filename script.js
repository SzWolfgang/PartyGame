
function gomb(){
var valasz = document.getElementById('valasz').innerText;

//console.log(valasz);
var divElement = document.getElementById('textsboxs');//az input elemeket tároló form kijelölése
var inputs = divElement.querySelectorAll('input'); // Az összes input elem kiválasztása
var pontok =Number( document.getElementById('pont').innerText);


var inputs = divElement.querySelectorAll('input'); // Az összes input elem kiválasztása
var tomb=[];
for (var i = 0; i < inputs.length; i++) {
  var input = inputs[i];
  var ertek =Number( input.value); // Az input elem értékének lekérése

  tomb.push(ertek); // Az érték hozzáadása a tömbhöz
  console.log('tomb'+ertek);
}

const osszeg =tomb.reduce((akkumulator, jelenlegiElem) => {
  return akkumulator + jelenlegiElem;
}, 0);

console.log('Pontok: '+osszeg);

if(osszeg == pontok)
{

localStorage.setItem('tomb', JSON.stringify(tomb));

var savedTomb = localStorage.getItem('tomb');
if (savedTomb) {
  var tomb = JSON.parse(savedTomb);
  console.log(tomb);
}

var minuszpontok = 0;
for (var i = 0; i < inputs.length; i++) {
  var input = inputs[i];

  if (input.id === valasz) {
    
  } else {
    pontok -=tomb[i];
    minuszpontok +=tomb[i];
    console.log('minuszP'+minuszpontok);
    if(tomb[i]>0)
    {
      document.getElementById('minuspont').style.display ="block";
      document.getElementById('minuspont').innerText = '-'+minuszpontok;
      setTimeout(function() {
        document.getElementById('minuspont').style.display = "none";
    }, 1500);
    }
    console.log(pontok);
    document.getElementById('pont').innerText = pontok;

  }
  
}

//var h1Elem = document.createElement('h1'); // H1 elem létrehozása
//h1Elem.textContent = pontok; // A pontok értékének beállítása az elem tartalmába

//document.body.appendChild(h1Elem); // Az elem hozzáadása a dokumentumhoz


$.ajax({
    type: "POST",
    url: "quiz.php",
    data: { variable: pontok },
    success: function(response) {
        document.getElementById("content").innerHTML = response;
    }
});
defeat(pontok);


  $('input[type="text"]').val("");
  $('input[type="text"]').css('background-image', '');
  $('input[type="text"]').css('background-color', '');


}
else{
  var szoveg ="Nem megfelelő mennyiségű pontot osztottál szét";
  ablak(szoveg);
  errorSound();

}
}
