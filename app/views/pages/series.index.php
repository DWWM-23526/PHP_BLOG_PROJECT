<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<body>
    <div class="container-lg bg-light">
        <?php include_once "views/partials/navbar.php"; ?>
        <main class="mt-5 pt-3 row">
            <h2>Les séries</h2>
            <?php foreach($series as $serie){ ?>
                <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch justify-content-center">
                    <div class="card mb-3" style="width: 18rem;">
                        <img src="<?= $serie->img_src ?>" class="card-img-top" 
                            alt="<?= $serie->title ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $serie->title ?></h5>
                            <p class="card-text" style="text-align: justify;">
                                <?= $serie->summary?>
                            </p>
                            <a href="series/articles/<?= $serie->id_serie ?>" class="btn btn-primary">Voir</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>

</html>
