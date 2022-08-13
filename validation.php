<?php

require_once("includes/config.php");
require_once("includes/neSecurity.php");
require_once("includes/functs_db.php");

$database = connectDB("web_registration", $config);
$data = array(
    ["code", 20, 16]
);
$data = data_security($data, $_GET);

if (!isset($data["type"]) || $data["type"] != "error") {

    $sqlr = $database->prepare("
        UPDATE users 
        SET validation='1'
        WHERE pass=:pass
        AND validation='0'
    ");

    $sqlr->bindParam(':pass', $data["code"]);
    $valid_insert = $sqlr->execute();

    if ($valid_insert) {
        // var_dump($valid_insert);
        // var_dump($data);
        // OK
    }else{
        header("Location: Inscription#error");
        exit(0);
    }

} else {
    header("Location: ../Inscription#error");
    exit(0);
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Content-Type" content="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/print.css" media="print">
</head>

<body>
    <header>
        <h1><?= $config_web["title"] ?></h1>
    </header>
    <main>
        <section class="center">
            <h3><?= $config_web["title_page"] ?></h3>
            <div class="hr"></div>
            <div class="wrapper">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 98.5 98.5" enable-background="new 0 0 98.5 98.5" xml:space="preserve">
                    <path class="checkmark" fill="none" stroke-width="8" stroke-miterlimit="10" d="M81.7,17.8C73.5,9.3,62,4,49.2,4C24.3,4,4,24.3,4,49.2s20.3,45.2,45.2,45.2s45.2-20.3,45.2-45.2c0-8.6-2.4-16.6-6.5-23.4l0,0L45.6,68.2L24.7,47.3" />
                </svg>
            </div>
            <p>Vous êtes inscrit !</p>
        </section>
    </main>
    <footer>

    </footer>
    <script src="../js/scripts.js"></script>
</body>

</html>