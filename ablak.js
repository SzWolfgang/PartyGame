$(document).ready(function(){
    $('#ablak').hide();

})

function ablak(szoveg){
   
   $("#ablakszoveg").text(szoveg)
    $('#ablak').show();

    setTimeout(function() {
        $('#ablak').hide();
      }, 2000);
}