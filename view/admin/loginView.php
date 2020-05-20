<?php
require('view/includes/headerView.php');
?>
<section class="container">
    <div class="row">
        <div class="articleContent">
            <div id="login-one" class="login-one">
                <form class="login-one-form" method="post" action="?action=connexionlogin">
                    <div class="col">
                        <div class="login-one-ico"><i class="fa fa-unlock-alt" id="lockico"></i></div>
                        <div class="form-group">
                            <div>
                                <h3 id="heading">Log in:</h3>
                            </div>
                            <input class="form-control" type="text" id="input" placeholder="Username" name="username" value="Jean">
                            <input class="form-control" type="password" id="input" placeholder="Password" name="password" value="Admin01">
                            <button class="btn btn-primary" id="button" style="background-color:#007ac9;" type="submit">Log in</button>
                        </div>
                    </div>
                    <div class="error">
                        <?php
                        if(isset($error) && !empty($error)){
                            echo("<p class='text-danger'>" . $error . "</p>");
                        }
                        if(isset($success) && !empty($success)){
                            echo("<p class='text-success'>" . $success . "</p>");
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="team-clean">
        <div class="container">
            <div class="intro"></div>
        </div>
    </div>
</section>

<?php
require('view/includes/footerView.php');
?>