<?php
require('includes/headerView.php');
require('includes/sliderView.php');
?>
<section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Présentation</h2>
                        <div class="left col-lg-6 col-12">
                            <p class="section-subheading text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus augue eu tortor dignissim,
                                sit amet eleifend massa laoreet. Morbi porta, justo et aliquet aliquam, eros tellus tristique elit, sit amet convallis est dui nec diam.
                                Morbi at nisl erat. Aliquam euismod facilisis aliquam. Integer porttitor finibus tristique. Proin volutpat non libero eget volutpat. 
                                Aliquam nec risus efficitur, tincidunt elit at, consequat turpis. Sed elementum ipsum non mauris consequat, nec interdum libero sagittis. 
                                Sed sed iaculis erat. Donec porttitor urna vitae risus lacinia cursus. Sed at accumsan est. Aenean dapibus interdum mi. 
                                Curabitur odio urna, aliquam eu lacinia sit amet, hendrerit ac tellus</p>
                        </div>
                        <div class="right col-lg-6 col-12">
                            <img src="public/img/jeanforteroche.png">
                        </div>
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Chapitres</h2>
                    <h3 class="section-subheading text-muted">Commence l'aventure avec moi !</h3>
                </div>
            </div>
            <div class="row">
            <?php foreach ($tabArticles as $key => $data) { ?>
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="portfolio-link" href="?action=viewarticle&id=<?= $data['id'] ?>">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                        </div><img class="img-fluid" src="public/chapitre/2-thumbnail.jpg"></a>
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