//funzione per bottone add
$(document).ready(function(){
    $("#bottone1").click(function(){
        $("#elementi").slideToggle();
    });
});

//funzione per bottone new list
$(document).ready(function(){
    $("#elem").click(function(){
        $("#divlista").slideToggle();
    });
});

//funzione per bottone remove list
$(document).ready(function(){
    $("#bottoneremove").click(function(){
        $("#slideremove").slideToggle();
    });
});

