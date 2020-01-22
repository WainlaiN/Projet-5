<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/style.css" rel="stylesheet"/>

</head>

<body>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="" width="40px" height="40px" alt="Logo Festival Plein Air">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#CV">CV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#connect">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#registration">Inscription</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<?= $content ?>



<footer class="container-fluid footer">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="socialicons py-3">
                    <a href="#" class="social"><i class="fab fa-facebook-f" style="font-size:36px"></i></a>
                    <a href="#" class="social"><i class="fab fa-twitter" style="font-size:36px"></i></a>
                    <a href="#" class="social"><i class="fab fa-instagram" style="font-size:36px"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-12 mentions">
            <a data-toggle="modal" href="mentions" data-target="#mentions" style="color:white">Mentions légales</a>
        </div>
    </div>
</footer>

</body>


</html>