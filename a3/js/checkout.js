function checkVisa(){
    var card = document.getElementById("card");
    var pattern = /^4( ?[0-9]){12,15}$/;
    
    if(pattern.test(card.value)) card.style.backgroundImage = "url(img/visa-logo.jpg)";
    else card.style.backgroundImage = "none";
}