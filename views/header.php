<?php

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Membership Template with Bootstrap</title>

    <!-- Include Bootstrap .css -->
    <link href="../css/bootstrap/css/bootstrap.css" rel="stylesheet" >

    <!-- Custom .css -->
    <link href="../css/custom/custom.css" rel="stylesheet" >
</head>

<header>

    <nav class="navbar navbar-light bg-light fixed-top">

                <?php if (isset($_SESSION['users'])):?>
                <a class="navbar-brand" href="home.php" >
                    Membership template
                </a>
                <?php else: ?>
                <a class="navbar-brand" href="../index.php" >
                    Membership template
                </a>
                <?php endif; ?>

                <ul class="nav justify-content-end">
                    <?php if (isset($_SESSION['users'])):?>
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="account.php">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="registration.php">Sign Up</a></li>
                    <?php endif; ?>
                </ul>

    </nav>
    
</header>

<body>