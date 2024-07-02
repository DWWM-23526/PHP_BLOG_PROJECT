<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Contactez-nous</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="contactForm" method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label" for="fullname">Name</label>
                        <input class="form-control" name="fullname" type="text" placeholder="Name" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email Address</label>
                        <input class="form-control" name="email" type="email" placeholder="Email Address" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="message">Message</label>
                        <textarea class="form-control" name="message" type="text" placeholder="Message"
                            style="height: 10rem;"></textarea>
                    </div>
                    <div class="mb-1 text-center">
                        <button class="btn btn-success" name="send" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if (isset($_POST['send'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $message = $_POST['message'];
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
        $sql = "INSERT INTO contact (fullname, email, message) VALUES ('".$fullname."','".$email."','".$message."');";
        $stmt = $db->query($sql);
        $result = $stmt->rowCount() == 1;
        if($result){ ?>
            <div class="alert alert-success alert-dismissible fade show" 
                    role="alert" style="margin-top:80px; margin-bottom:-40px;">
                Votre message est envoyé.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }
    }
?>



<?php
    // if (isset($_POST['send'])) {
    //     $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //     $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    //     // $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    //     $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //     // $message = "<script>alert('hacked');</script>";
    //     // $message = "');DELETE FROM contact WHERE 1;";

    //     include_once "./configs/db.config.php";
    //     $dsn = "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME;
    //     $user = DB_USER;
    //     $pass = DB_PASSWORD;
    //     $db = new PDO(
    //         $dsn,
    //         $user,
    //         $pass,
    //         array(
    //             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //             PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    //         )
    //     );
    //     // $sql = "SELECT * FROM contact WHERE id_contact = 2";
    //     // $stmt = $db->query($sql);
    //     // $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    //     // echo $contact['message'];
    //     $sql = "INSERT INTO contact (fullname, email, message) VALUES ('".$fullname."','".$email."','".$message."');";
    //     $stmt = $db->query($sql);
    //     $result = $stmt->rowCount() == 1;
    //     //SI ok on affiche le message

    //     //Redirect ?
        
    // }

?>
