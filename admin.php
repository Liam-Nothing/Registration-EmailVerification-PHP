<?php

require_once("includes/config.php");
require_once("includes/pathSecurity.php");
require_once("includes/functs_db.php");

ImConnected(false);

$database = connectDB("web_registration", $config);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Content-Type" content="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1><?= $config_web["title_admin"] ?></h1>
    </header>
    <main class="full_size">


        <section>
            <div class="center block">
                <button id="btn_logout" class="login_btn">Log out</button>
            </div>
        </section>

        <section>
            <table>
                <tr>
                    <th>
                        Nom
                    </th>
                    <th>
                        Prenom
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Telephone
                    </th>
                    <th>
                        Code
                    </th>
                    <th>
                        Date de validation
                    </th>
                </tr>
                <?php
                    $sqlr = $database->query("SELECT * FROM `users` WHERE validation = 1");
                    // $sqlr->execute();
                    $sqlr_rows = $sqlr->fetchAll();

                    if (!empty($sqlr_rows)) {
                        foreach ($sqlr_rows as $user) {
                ?>
                <tr>
                    <td>
                        <?=$user["lastname"]?>
                    </td>
                    <td>
                        <?=$user["name"]?>
                    </td>
                    <td>
                        <?=$user["email"]?>
                    </td>
                    <td>
                        <?=$user["phone"]?>
                    </td>
                    <td>
                        <?=$user["pass"]?>
                    </td>
                    <td>
                        <?=$user["add_date"]?>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
                
            </table>
        </section>

    </main>
    <footer>

    </footer>
    <script src="js/scripts_admin.js"></script>
</body>

</html>