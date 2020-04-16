$("#message").keyup(function(){
    var message = document.getElementById('message');
    var maxText = document.getElementById('maxText');

    if(message.value.length > 240){
        maxText.style.color = "red";
        maxText.textContent = ` ${message.value.length}/240`;
    }else{
        maxText.style.color = "black";
        maxText.textContent = ` ${message.value.length}/240`;
    }
});