<?php
require('includes/headerView.php');
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
                        <p><a href="?action=delCommentaire&id=<?= $tabCommentaire['id'] ?>" class="text-danger"><i class="fas fa-trash-alt"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
require('includes/footerView.php');
?>