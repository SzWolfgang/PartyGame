var Cards = false;
var kartyaszoveg='Különleges kártyák bekapcsolva (Klikk rá az eltüntetéshez)';

var OnOf = false;
$(document).ready(function() {

    
    $('#epickCard').click(function() { 
        if(!OnOf)
        {
        $('#epickCard').css('color','green');
        Cards = true;
        CardBeKi();
        OnOf = true;
        YesSound();
        }
        else{
            $('#epickCard').css('color','red');
        Cards = false;
        CardBeKi();
        OnOf = false;
        NoSound();
        }
    });
});

function CardBeKi(){
    if(Cards)
    {
        console.log('bekapcsol');

        $.ajax({
            url: "Card.php",
            success: function(kartya) {
             console.log(kartya); // Megjeleníti a PHP által generált adatokat
             kartyaszoveg = kartya;
            }
          });
          $("#ablakszoveg").text(kartyaszoveg)
            $('#ablak').show();
            $('#ablak').click(function(){
                $('#ablak').hide();
            })
    }
    else{
        console.log('kikapcsol');
    }
}
