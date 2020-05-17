<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <script src="vendor/ckeditor/ckeditor-full/ckeditor.js"></script>
    <script src="vendor/ckeditor/ckeditor-simple/ckeditor.js"></script>
    <link rel="stylesheet" href="public/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body id="page-top">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="?action=home">Jean Forteroche</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive"> 
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="?action=allarticle">chapitres</a></li>
                    
                    <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                        echo '<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="?action=admin">Panel Admin</a></li>
                        <li class="nav-item" role="presentation"><a href="?action=logout" class="nav-link js-scroll-trigger"><i class="fas fa-sign-out-alt"></i></a></li>';                         
                    }else{
                        echo '<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="?action=login">CONNEXION</a></li>';
                    }
                    ?>

                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
            </div>
        </div>
    </nav>