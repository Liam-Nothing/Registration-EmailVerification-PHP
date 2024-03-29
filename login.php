<?php

require_once("includes/config.php");
require_once("includes/pathSecurity.php");
ImConnected(true, "Admin");

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
    <main>

        <section>
            <div>
                <h1>Login</h1>
            </div>
            <div class="center block">
                <input id="username" type="text" placeholder="Username" />
                <input id="password" type="password" placeholder="Password" />
                <button id="btn_login" class="login_btn">Sing in</button>
            </div>
        </section>
        <section class="card alert hide" id="alert-conainer">
            <p class="thin" id="alert-message">Alert !</p>
        </section>

    </main>
    <footer>

    </footer>
    <script src="js/scripts_login.js"></script>
</body>

</html>