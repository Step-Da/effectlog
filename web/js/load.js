$(document).ready(function(){
    setTimeout(() =>{
        $('#loader').fadeOut('slow');
        $(".card").removeClass("visibalFnOn").fadeIn('slow');
    }, 1000);   
});