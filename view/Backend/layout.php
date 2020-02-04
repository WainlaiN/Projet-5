<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!--integration webfont -->
    <script defer src="../../public/css/js/all.js"></script>

</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="" width="40px" height="40px" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/posts">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#CV">CV</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="/logout">Se Déconnecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/home">Retour au Blog</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <?= $content ?>
    <?php var_dump($_SESSION); ?>
</div>


</body>


</html>