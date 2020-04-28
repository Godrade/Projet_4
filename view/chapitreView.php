<?php
require('includes/headerView.php');
?>

    <!-- Chapitre -->
    <section class="container">
        <div class="row">
            <div class="articleContent">
                <div class="col-12">
                    <div class="articleText">
                        <h1><?= $tabArticle['name']; ?></h1>
                        <img src="<?= $tabArticle['image']; ?>">
                        <?= $tabArticle['content']; ?>
                        <p>Publié le : <?= $tabArticle['creation_date']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!-- COMMENTAIRE -->
    <section class="container" id="commentaire">
        <div class="row">
            <div class="col-lg-7 col-12">
                <?php foreach ($tabCommentaire as $key => $data) { ?>
                <div class="comment">
                    <h5 class="commentTitle"><?= $data['name'] ?> | <span class="dataComment"> Envoyer le : <?= $data['createdDate'] ?></span></h5>
                    <p><?= $data['content'] ?></p>
                    <p class="signalp">Un probléme avec ce commentaire ? <a href="?action=signalCommentaire&id=<?= $data['id'] ?>" class="signal"> Signaler (<?= $data['report'] ?>)</a></p>
                </div>
                <?php } ?>
            </div>
            
            <div class="col-lg-5 col-12 right">
                <div class="form_contact">
                    <h3>Poster un commentaire</h3>
                    <form method="post" action="?action=addCommentaire">
                        <input type="hidden" name="idArticle" id="idArticle" value="<?= $tabArticle['id']; ?>">
                        <input type="text" name="username" id="username" placeholder="Pseudo" required>
                        <textarea placeholder="Message" name="content" id="message" required></textarea>
                        <input type="submit" value="Envoyer" id="sendCommentaire"><i class="text-right" id="maxText"></i>
                    </form>
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
                </div>
            </div>
        </div>
    </section>
<?php
require('includes/footerView.php');
?>