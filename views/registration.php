<?php

if(!empty($_POST)) {

    require_once "../config/dbconnect.php";

    $errors = array();

    if (empty($_POST['username'] || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username']))) {
        $errors['username'] = 'Invalid username ';
    } else {
        /* Check if the username is already taken */
        $req = $pdo->prepare('SELECT id FROM users WHERE username = ?');
        $req->execute([$_POST['username']]);
        $user = $req->fetch();
        if ($user) {
            $errors['username'] = 'Username already taken';
        }
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email ';
    } else {
        /* Check if the email is already taken */
        $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        $req->execute([$_POST['email']]);
        $email = $req->fetch();
        if ($email) {
            $errors['email'] = 'Email already taken';
        }
    }

    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
        $errors['password'] = 'Invalid password ';
    }

    if (empty($errors)) {
        $req = $pdo->prepare("INSERT INTO users SET username = ?, email = ?, password = ?");

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $req->execute([$_POST['username'], $_POST['email'], $password]);

        $req = $pdo->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(['username' => $_POST['username']]);
        $users = $req->fetch();

        session_start();
        $_SESSION['users'] = $users;

        header('Location: home.php');
        exit();

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

                <h2 class="mb-3">Registration</h2>

                <form action="" method="POST" class="needs-validation">

                    <div class="mb-3">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

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
