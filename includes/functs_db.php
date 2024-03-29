<?php

$config = [
    "host" => "localhost",
    "dbusername" => "root",
    "dbpassword" => ""
];

function connectDB($dbname, $config)
{
    $pdo = new PDO("mysql:charset=utf8mb4;host=" . $config["host"], $config["dbusername"], $config["dbpassword"]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->query("use $dbname");
    return $pdo;
}
