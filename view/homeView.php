<?php
require('includes/headerView.php');
require('includes/sliderView.php');
?>

    <!-- PRESENTATION -->
    <section class="container">
        <div class="row">
            <div class="col-12">
                <div class="presentation">
                    <div class="presentationTitle">
                        <h1>- Présentation -</h1>
                    </div>
                    <h3 class="borderTitle">Qui suis-je ?</h3>
                    <div>
                        <img src="public/image/forteroche.jpg">
                    </div>  
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus augue eu tortor dignissim,<br> sit amet eleifend massa laoreet. Morbi porta, justo et aliquet aliquam, eros tellus tristique elit, sit amet convallis est dui nec diam. <br> Morbi at nisl erat. Aliquam euismod facilisis aliquam. Integer porttitor finibus tristique. Proin volutpat non libero eget volutpat. Aliquam nec risus efficitur, tincidunt elit at, consequat turpis. Sed elementum ipsum non mauris consequat, nec interdum libero sagittis. Sed sed iaculis erat. Donec porttitor urna vitae risus lacinia cursus. Sed at accumsan est. Aenean dapibus interdum mi. Curabitur odio urna, aliquam eu lacinia sit amet, hendrerit ac tellus</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CHAPITRE -->
    <section class="container-fluid bluebackgroud">
        <div class="row">
            <div class="col-12">
                <div class="presentationTitle text-white">
                    <h2>- Chapitres récent -</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 col-lg-3">
                <div class="chapitreContainer">
                    <div class="imgPreview">
                        <img src="public/image/previewChapitre/2.jpg">
                    </div>
                    <div class="chapitreBlockContent">
                        <div class="chapitreName">
                            <h4>Chapitre 1</h4>
                        </div>
                        <div class="chapitreContent">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus augue eu tortor dignissim, sit amet eleifend massa laoreet.</p>
                        </div>
                        <a href="#" class="btn btn-1">Lire le chapitre</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-3">
                <div class="chapitreContainer">
                    <div class="imgPreview">
                        <img src="public/image/previewChapitre/3.jpg">
                    </div>
                    <div class="chapitreBlockContent">
                        <div class="chapitreName">
                            <h4>Chapitre 2</h4>
                        </div>
                        <div class="chapitreContent">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus augue eu tortor dignissim, sit amet eleifend massa laoreet.</p>
                        </div>
                        <a href="#" class="btn btn-1">Lire le chapitre</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
require('includes/footerView.php');
?>