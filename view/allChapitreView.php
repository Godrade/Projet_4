<?php
require('includes/headerView.php');
?>
    <section id="portfolio" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Les Chapitres</h2>
                    <h3 class="section-subheading text-muted">Tous les chapitres ici !</h3>
                </div>
            </div>
            <div class="row">
            <?php foreach ($tabArticles as $key => $data) { ?>
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="portfolio-link" href="?action=viewarticle&id=<?= $data['id'] ?>">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                            </div><img class="img-fluid" src="<?= $data['image'] ?>"></a>
                    <div class="portfolio-caption">
                        <h4><?= $data['name'] ?></h4>
                        <p class="text-muted"><?= $data['creation_date'] ?></p>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>
<?php
require('includes/footerView.php');
?>