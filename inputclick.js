$(document).ready(function() {
 //Kis kép választása
 var pia='cocktail.png'; 
 
 $('#wine').click(function(){
     pia ='wine.png';
     $('#aktualis').attr('src', pia);
  });

  $('#shot').click(function(){
     pia ='shot.png';
     $('#aktualis').attr('src', pia);
  });
  $('#cocktail').click(function(){
    pia ='cocktail.png';
    $('#aktualis').attr('src', pia);
 });

 $('#dollar').click(function(){
  pia ='dollar.png';
  $('#aktualis').attr('src', pia);
});





    // Kattintás esemény az input mezőkre
    $('input[type="text"]').on('focus', function() {
      // Számok generálása és hozzáadása
      generateNumbers();
      
      // Felugró ablak megjelenítése
      $('#numberPopup').fadeIn();
      
      // Elmentjük az aktív input mezőt
      activeInput = $(this);
    });
  
    // Kattintás esemény a számokra
    $(document).on('click', '.number', function() {
      // Kiválasztott szám lekérése
      var selectedNumber = $(this).text();
      
      // Kiválasztott szám beírása az aktív input mezőbe
      activeInput.val(selectedNumber);
      addImg(activeInput, selectedNumber,pia);//hattér beálítása
      activeInput.css('background-color', 'rgba(255, 255, 255, 0.533)')
      
      // Felugró ablak elrejtése
      $('#numberPopup').fadeOut();
    });

    $(document).on('click', 'li', function() {
      console.log("LI");
      var index = $(this).index() + 1; // Az elem indexének meghatározása
      var SelInput = $("#input_" + index);
      SelInput.focus();
    });
    
    //Input tegek törlése
     $('#delete').on('click',function(){
    $('input[type="text"]').val("");
    $('input[type="text"]').css('background-image', '',);
    $('input[type="text"]').css('background-color', '');

      


});
 
$(document).on('focusout', 'input[type="text"]', function() {
  $('#numberPopup').fadeOut();
});
});
  
  function generateNumbers() {
    var numberContainer = $('#numberContainer');
    numberContainer.empty(); // Előzőleg generált számok törlése
    
    for (var i = 0; i <= 10; i++) {
      var numberDiv = $('<li>').addClass('number').text(i);
      numberContainer.append(numberDiv);
    }
    selectSound();
  }

  function addImg(activeInput,selectedNumber,pia){    
    activeInput.css('background-image', 'url('+pia+')');
    
  }


  
  
  
  