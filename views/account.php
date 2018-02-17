<?php

session_start();

require_once "../config/dbconnect.php";

if(!isset($_SESSION['users'])){
    header('Location: login.php');
    exit();
}

if(!empty($_POST)){

    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
        $errors['password'] = 'Invalid password ';
    }
    else {
        $user_id = $_SESSION['users']['id'];

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $req = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");

        $req->execute([$password, $user_id]);
    }

}

require_once "header.php";

?>
    <div class="container">
        <div class="col-md-8 order-md-1">

            <!-- Display errors messages is the form is not valid -->

            <?php if(!empty($errors)):?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <h2 class="mb-3">Change password</h2>

            <form action="" method="POST" class="needs-validation">

                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="">Password confirm</label>
                    <input type="password" name="password_confirm" class="form-control" required>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Submit</button>

                <form>
        </div>
    </div>

<?php

require_once "footer.php";