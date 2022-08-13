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
        <h1><?= $config_web["title"] ?></h1>
    </header>
    <main>
        <section class="center">
            <form method="POST" action="send_inscription.php">
                <h3><?= $config_web["title_page"] ?></h3>
                <div class="hr"></div>
                <div class="input-container">
                    <label for="name">Prénom :</label>
                    <input type="text" name="name" placeholder="Jean" required autofocus>
                </div>
                <div class="input-container">
                    <label for="lastname">Nom :</label>
                    <input type="text" name="lastname" placeholder="Dupon" required>
                </div>
                <div class="input-container">
                    <label for="email">Email :</label>
                    <input type="email" name="email" placeholder="jean.dupon@mail.com" required>
                </div>
                <div class="input-container">
                    <label for="phone">Telephone :</label>
                    <input type="tel" name="phone" placeholder="0600000000" required>
                </div>
                <div class="input-container">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </section>
        <section class="card alert hide" id="error">
            <p>Une erreur s'est produite.</p>
        </section>
    </main>
    <footer>

    </footer>
    <script src="js/scripts.js"></script>
</body>

</html>