<?php
require('includes/headerView.php');
?>
<section class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="blockcontainer">
                <div class="formulaireArticle">
                    <form class="" method="post" action="?action=updatearticle">
                        <h2>Ajouter un chapitre</h2>
                        <input type="hidden" class="input-Custom" name="id" value="<?= $data['id'] ?>">
                        <input type="text" placeholder="Nom du chapitre" class="input-Custom" name="title" value="<?= $data['name'] ?>">
                        <input type="file" class="inputCustom" name="image">
                        <textarea id="editeur" class="form-control ckeditor inputCustom" name="content"><?= $data['content'] ?></textarea>
                        <button type="submit" class="btn btn-success">Envoyer</button>
                    </from>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br><br>
<?php
require('includes/footerView.php');
?>