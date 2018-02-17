<?php

session_start();

if(!isset($_SESSION['users'])){
    header('Location: login.php');
    exit();
}

require_once "header.php";

?>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="jumbotron">
                    <h1 class="display-4">Welcome <?= $_SESSION['users']['username'] ?></h1>
                    <p class="lead">This is a membership template by vincentcrb.</p>
                </div>
            </div>
        </div>
    </div>

<?php

require_once "footer.php";