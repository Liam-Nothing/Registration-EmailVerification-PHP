<?php

require_once("includes/config.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Content-Type" content="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print">
</head>

<body>
    <header>
        <h1><?= $config["title"] ?></h1>
    </header>
    <main>
        <section class="center">
            <form method="post" action="">
                <h3><?= $config["title_page"] ?></h3>
                <div class="hr"></div>
                <div class="input-container">
                    <label for="name">Prénom :</label>
                    <input type="text" name="name" placeholder="Jean" required autofocus>
                </div>
                <div class="input-container">
                    <label for="name">Nom :</label>
                    <input type="text" name="lastname" placeholder="Dupon" required>
                </div>
                <div class="input-container">
                    <label for="name">Email :</label>
                    <input type="email" name="email" placeholder="jean.dupon@mail.com" required>
                </div>
                <div class="input-container">
                    <label for="name">Adresse :</label>
                    <input type="text" name="address" placeholder="5 rue de la porte" required>
                </div>
                <div class="input-container">
                    <label for="name">Telephone :</label>
                    <input type="tel" name="phone" placeholder="0600000000" required>
                </div>
                <div class="input-container">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </section>
        <!-- <section class="center">
            <h3><?= $config["title_page"] ?></h3>
            <div class="hr"></div>
            <div class="wrapper">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 98.5 98.5" enable-background="new 0 0 98.5 98.5" xml:space="preserve">
                    <path class="checkmark" fill="none" stroke-width="8" stroke-miterlimit="10" d="M81.7,17.8C73.5,9.3,62,4,49.2,4C24.3,4,4,24.3,4,49.2s20.3,45.2,45.2,45.2s45.2-20.3,45.2-45.2c0-8.6-2.4-16.6-6.5-23.4l0,0L45.6,68.2L24.7,47.3" />
                </svg>
            </div>
            <p>Vous allez recevoir un mail pour les finalisation.</p>
        </section> -->
    </main>
    <footer>

    </footer>
    <script src="js/scripts.js"></script>
</body>

</html>