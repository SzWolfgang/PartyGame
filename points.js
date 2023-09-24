var MyPoints=0;
var playerName='Béna';
function MyPont(){
    MyPoints =Number( document.getElementById('mypont').innerText);
    console.log(MyPoints);
MyPoints +=1;
if(MyPoints <5)
{
    playerName='Béna';
}
if(MyPoints >=5)
{
    playerName='Átlagos';
}
if(MyPoints >=10)
{
    playerName='Elég jó';
}
if(MyPoints >=15)
{
    playerName='Okos';
}
document.getElementById("mypont").innerText = MyPoints;
console.log(MyPoints);
}
function rangsor(){
    // A JavaScript kód adatainak összeállítása
    var playerPoints = MyPoints; // Itt helyezd el a játékos pontjait
    
    // AJAX kérés elküldése
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "rank.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    // Az adatok elküldése a POST kérésben
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // A válasz megérkezett a szerverről
        document.getElementById("rank").innerHTML=xhr.responseText;
      }
    };
    
    xhr.send("playerName=" + encodeURIComponent(playerName) + "&playerPoints=" + playerPoints);
    
    }


function defeat(pontok){
    //Vereség 
    if(pontok<=0)
    {
        var szoveg ="Vereség";
        ablak(szoveg);
        rangsor();
        document.getElementById('pont').innerText = 10;
        document.getElementById("mypont").innerText = 0;
        playerName='Béna';
        MyPoints =0;
        oohSound();

        
    }
    //Győzelem
    else{
        MyPont();
        victorySound();
        CardBeKi();
    }

};