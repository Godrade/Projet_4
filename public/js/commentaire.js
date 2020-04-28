
//TEXTAREA
$("#message").keyup(function(){
    var message = document.getElementById('message');
    var maxText = document.getElementById('maxText');
    var button = document.getElementById('sendCommentaire');

    if(message.value.length > 500){
        maxText.style.color = "red";
        message.style.color = "red";
        button.style.display = "none";
        maxText.textContent = ` ${message.value.length}/500 - Votre message dépasse la limite de caractère !`;
    }else{
        maxText.style.color = "black";
        message.style.color = "black";
        button.style.display = "inline-block";
        maxText.textContent = ` ${message.value.length}/500`;
    }
});

//INPUT NAME
$("#username").keyup(function(){
    var message = document.getElementById('username');
    var maxText = document.getElementById('maxText');
    var button = document.getElementById('sendCommentaire');

    if(message.value.length > 30){
        maxText.style.color = "red";
        message.style.color = "red";
        button.style.display = "none";
        maxText.textContent = ` ${message.value.length}/30 - Votre pseudo dépasse la limite de caractère !`;
    }else{
        maxText.style.color = "black";
        message.style.color = "black";
        button.style.display = "inline-block";
        maxText.textContent = ` ${message.value.length}/30`;
    }
});