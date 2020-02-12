<?php
require('includes/headerView.php');
?>
        <div id="loginBlock">
            <h1 id="title"><i class="fas fa-user-lock fa-2x"></i></h1>
            <form method="post" action="?action=connexionlogin">
                <br>
                <input type="text" class="input-custom" placeholder="Identifiant" name="username" value="Jean">
                <br>
                <input type="password" class="input-custom" placeholder="Mot de passe" name="password" value="Admin01">
                <br>
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="register-button" data-upgraded=",MaterialButton,MaterialRipple" name="buttonLogin">Login<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>
            </form>
        </div>