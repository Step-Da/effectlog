// Функция для отображения лоудера при загрузке библеотеки постовщиков.
$(document).ready(function(){
    setTimeout(() =>{
        $('#loader').fadeOut('slow');
        $(".card").removeClass("visibalFnOn").fadeIn('slow');
    }, 1000);   
});
