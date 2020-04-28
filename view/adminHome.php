<?php
require('includes/headerView.php');
?>

<section class="container">
    <div class="row">
        <div class="col-12">
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
            <div class="blockcontainer">
                <form method="post" action="?action=addarticle" enctype = "multipart/form-data">
                    <h2>Ajouter un chapitre</h2>
                    <input type="text" placeholder="Nom du chapitre" class="input-Custom" name="title">
                    <input type="file" class="input-Custom" name="image">
                    <input type="hidden" placeholder="Nom du chapitre" class="input-Custom" name="name" value="<?= $user['username'] ?>" disabled>
                    <textarea id="editeur" class="form-control ckeditor inputCustom" name="content"></textarea>
                    <input type="submit" value="Envoyer" id="sendCommentaire">
                </from>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid" id="articleReport">
    <div class="row">
        <div class="col-lg-6 col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Date de création</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($tabArticles as $key => $data) { ?>
                    <tr>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['creation_date'] ?></td>
                        <td><a href="?action=delarticle&id=<?= $data['id'] ?>" class="text-danger"><i class="fas fa-trash-alt"></i></a> 
                            <a href="?action=editarticle&id=<?= $data['id'] ?>" class="text-warning"><i class="fas fa-pen"></i></a>
                            <a href="?action=viewarticle&id=<?= $data['id'] ?>" class="text-success"><i class="fas fa-external-link-alt"></i></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6 col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id Article</th>
                        <th scope="col">Envoyer</th>
                        <th scope="col">Par</th>
                        <th scope="col">Nombre de report</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($tabCommentaire as $key => $data) { ?>
                    <tr>
                        <td><?= $data['idArticle'] ?></td>
                        <td><?= $data['createdDate'] ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['report'] ?></td>
                        <td>
                            <a href="?action=delCommentaire&id=<?= $data['id'] ?>" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                            <a href="?action=viewCommentaire&id=<?= $data['id'] ?>" class="text-success"><i class="fas fa-external-link-alt"></i></a>
                            <a href="?action=resetReport&id=<?= $data['id'] ?>" class="text-info"><i class="fas fa-broom"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<br><br><br>

<?php
require('includes/footerView.php');
?>