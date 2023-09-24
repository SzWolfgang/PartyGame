var infoOnOf= false;
var formOnOf = false;
var SettingsOnOf =false;

$(document).ready(function() {

//Szöveg küldés FORM
  $('#comment').click(function(){
  if(!formOnOf){
    $('#minicontent').css('display', 'flex');
    //Oda ugrik a szöveges mezőkhöz
    $('html, body').animate({
        scrollTop: $('#minicontent').offset().top
      }, 1000);

      formOnOf = true;
  }
  else{
    $('#minicontent').css('display', 'none');

    formOnOf = false;
  } 
});

// INFO Button
  $('#infobutton').click(function(){

if(!infoOnOf)
{
    $('#infodiv').css('display', 'block');

    //Oda ugrik a szöveges mezőkhöz
    $('html, body').animate({
        scrollTop: $('#infodiv').offset().top
      }, 1000);
    infoOnOf = true;
    }
    else{
       $('#infodiv').css('display', 'none');
       infoOnOf = false
    }
  });

//Kezdő képernyő ok gomb (Nem aktív)
  $('#okButton').click(function() {
  $('#loading').css('display', 'none');
});

//Settings Gomb
$('#settingsbutton').click(function(){
  if(!SettingsOnOf)
  {
  $('#settingsdiv').css('display', 'block');

  //Oda ugrik a szöveges mezőkhöz
  $('html, body').animate({
      scrollTop: $('#settingsdiv').offset().top
    }, 1000);

    SettingsOnOf = true;
  }
  else{
    $('#settingsdiv').css('display', 'none');
    SettingsOnOf = false;
  }
});

})