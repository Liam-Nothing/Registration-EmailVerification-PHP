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
    <style>

    </style>
</head>

<body>
    <header>

    </header>
    <main>
        <div class="TitleWeb" style="background-color:<?= $config["color"] ?>">
            <span style="font-size:18px;color: white !important;font-weight: bold;">Test</span>
        </div>
        <center>
            <div style="padding:1%" id="contact">
                <form method="post" action="" class="form-signin">
                    <h3 class="hide-medium hide-large">Enregistrement</h3>
                    <h1 class="hide-small">Enregistrement</h1>
                    <table>
                        <tr>
                            <td>
                                <input type="text" name="nom" placeholder="Nom" required autofocus>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="prenom" placeholder="Prenom" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="email" name="email" placeholder="Email@mail.com" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="adresse" placeholder="Adresse" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="tel" name="tel" placeholder="Telephone" required>
                            </td>
                        </tr>
                    </table>
                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </center>
    </main>
    <footer>

    </footer>
    <script src="js/scripts.js"></script>
</body>

</html>