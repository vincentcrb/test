<?php

$db_name = "membership";
$host = "localhost";
$username = "root";
$password = ""; // empty for mac, root for windows

$pdo = new PDO ('mysql:dbname='.$db_name.';host='.$host.'', $username, $password);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Display errors