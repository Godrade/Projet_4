
//TEXTAREA
$("#message").keyup(function(){
    var message = document.getElementById('message');
    var maxText = document.getElementById('maxText');

    if(message.value.length > 500){
        maxText.style.color = "red";
        message.style.color = "red";
        maxText.textContent = ` ${message.value.length}/500`;
    }else{
        maxText.style.color = "black";
        message.style.color = "black";
        maxText.textContent = ` ${message.value.length}/500`;
    }
});

//INPUT NAME
$("#username").keyup(function(){
    var message = document.getElementById('username');
    var maxText = document.getElementById('maxText');
    var user = document.getElementById('username');

    if(message.value.length > 30){
        maxText.style.color = "red";
        message.style.color = "red";
        maxText.textContent = ` ${message.value.length}/30`;
    }else{
        maxText.style.color = "black";
        message.style.color = "black";
        maxText.textContent = ` ${message.value.length}/30`;
    }
});