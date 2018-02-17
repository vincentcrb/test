<?php


class Users
{
    public function __construct()
    {

    }

    public function login()
    {
        if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){

            require_once "../config/dbconnect.php";

            $req = $pdo->prepare('SELECT * FROM users WHERE username = :username OR email = :username');
            $req->execute(['username' => $_POST['username']]);
            $users = $req->fetch();

            if(password_verify($_POST['password'], $users['password'])){
                session_start();

                $_SESSION['users'] = $users;

                header('location: home.php');
                exit();
            }
        }
    }
}