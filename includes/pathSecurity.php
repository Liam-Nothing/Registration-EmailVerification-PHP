<?php

session_start();

function ImConnected($Connected = false, $redirectPageConnected = "Login")
{
    if ($Connected && isset($_SESSION["id"])) {
        header('Location: ' . $redirectPageConnected);
        exit(0);
    } else if ($Connected == false && !(isset($_SESSION["id"]))) {
        header('Location: ' . $redirectPageConnected);
        exit(0);
    }
}
