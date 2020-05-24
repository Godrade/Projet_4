<?php
require('view/includes/headerView.php');
?>
    <section class="container">
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
        <div class="row">
            <div class="col-md-10">
                <div class="blockcontainer">
                    <div class="formulaireArticle">
                        <form method="post" action="?action=updatearticle" enctype = "multipart/form-data">
                            <h2>Ajouter un chapitre</h2>
                            <input type="hidden" class="input-Custom" name="id" value="<?= $data['id'] ?>">
                            <input type="hidden" class="input-Custom" name="imageLink" value="<?= $data['image'] ?>">
                            <input type="hidden" class="input-Custom" name="typeForm" value="update">
                            <input type="text" placeholder="Nom du chapitre" class="input-Custom" name="title" value="<?= $data['name'] ?>">
                            <img src="<?= $data['image'] ?>" height="200px" width="200px" alt="pp chapitre">
                            <input type="file" class="inputCustom" name="image">
                            <textarea id="editeur" class="form-control ckeditor inputCustom" name="content"><?= $data['content'] ?></textarea>
                            <button type="submit" class="btn btn-success">Envoyer</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
require('view/includes/footerView.php');
?>