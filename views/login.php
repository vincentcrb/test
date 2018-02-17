<?php

require_once "header.php";

$user = new Users();

$user->login();

?>

<div class="container">
            <div class="col-md-8 order-md-1">

            <h2 class="mb-3">Login</h2>

            <form action="" method="POST" class="needs-validation">

                <div class="mb-3">
                    <label for="">Username or email</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>

                <form>
            </div>
            </div>

<?php

require_once "footer.php";
