<?php 
    if(!isset($_GET['id'])){
        $redirect_url = 'index.php'; 
        header('Location: '.$redirect_url);
        die();
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<?php 
    include_once "./configs/db.config.php";
    $dsn = "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME;
    $user = DB_USER;
    $pass = DB_PASSWORD;
    $db = new PDO(
        $dsn,
        $user,
        $pass,
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        )
    );
    $sql = "SELECT * FROM article WHERE id_article = ". $_GET['id'];
    $stmt = $db->query($sql);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
    if($article == false){
        $redirect_url = 'index.php'; 
        header('Location: '.$redirect_url);
        die();
    }
?>
<body>
    <div class="container-lg bg-light">
        <?php include_once "navbar.php"; ?>
        <main class="mt-5 pt-3 row">
            <div class="col-12">
                <?= $_GET['id']; ?>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  
</body>

</html>


<!-- <div class="text-center mb-3">
                    <h1><?= $article['title'] ?></h1>
                    <img src="<?= $article['img_src'] ?>" alt="<?= $article['title'] ?>">
                </div>
                <p style="text-align: justify;">
                    <?= $article['summary']?>
                </p>
                <p>
                    Publié le <?= date("d/m/Y", strtotime($article['published_at']));?>
                <?php 
                    if(isset($article['updated_at'])){
                ?>
                    (Mis à jour le <?= date("d/m/Y", strtotime($article['updated_at']));?>)
                <?php        
                    }
                ?>
                </p> -->






