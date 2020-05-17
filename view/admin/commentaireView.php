<?php
require('view/includes/headerView.php');
?>

    <!-- Chapitre -->
    <section class="container">
        <div class="row">
            <div class="articleContent">
                <div class="col-12">
                    <div class="articleText">
                        <p>Envoyer par : <?= $tabCommentaire['name']; ?></p>
                        <p>Message : <?= $tabCommentaire['content']; ?></p>
                        <p>Envoyer le : <?= $tabCommentaire['createdDate']; ?></p>
                        <p>Report : <?= $tabCommentaire['report'] ?></p>
                        <p><a href="?action=delCommentaire&id=<?= $tabCommentaire['id'] ?>" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                        <a href="?action=resetReport&id=<?= $tabCommentaire['id'] ?>" class="text-info"><i class="fas fa-broom"></i></a>
                        </p>
                        <p><a href="?action=admin" class="text-info">Retour</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
require('view/includes/footerView.php');
?>