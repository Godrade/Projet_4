<?php
require('includes/headerView.php');
?>

    <!-- Chapitre -->
    <section class="container">
        <div class="row">
            <div class="articleContent">
                <div class="col-12">
                    <div class="chapitreImg full">
                        <!--<img src="public/image/fullPreview/1.jpg">-->
                    </div>
                    <div class="articleText">
                        <?= $tabArticle['name']; ?>
                        <?= $tabArticle['content']; ?>
                        <?= $tabArticle['creation_date']; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="container">
        <div class="row">
            <div class="col-12">
                <div class="containerForm" id="commentaire">
                    <h2>Poster un commentaire</h2>
                    <form method="post" action="?action=addCommentaire">
                        <input type="hidden" name="idArticle" id="idArticle" class="input-Custom" value="<?= $tabArticle['id']; ?>">
                        <input type="text" name="username" id="username" class="input-Custom" >
                        <input type="text" name="content" id="content" class="input-Custom" >
                        <button type="submit" class="btn btn-success">Commenter</button>
                    </form>
                </div>
            </div>
            
            <?php foreach ($tabCommentaire as $key => $data) { ?>
            <div class="col-12">
                <div class="commentaireBlock">
                    <div class="commentaireText">
                        <h5><?= $data['name'] ?><span class="date"> Le <?= $data['createdDate'] ?></span></h5>
                        <p><?= $data['content'] ?></p>
                        <a href="?action=signalCommentaire&id=<?= $data['id'] ?>" class="text-danger">Signaler</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
<?php
require('includes/footerView.php');
?>