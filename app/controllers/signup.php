<?php

namespace Controller;

class Signup
{
    public function get()
    {
        echo \View\Loader::make()->render("templates/signup.twig");
    }
    public function post()
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $passwordh = $_POST['password'];
        $password = md5($_POST['password']);
        if ($username=='' || $email=='' || $passwordh=='') {
            echo '<script>alert("Username, E-mail or password cannot be empty!")</script>';
        } elseif (\Model\Login::signup($username, $email, $password)) {
            echo \View\Loader::make()->render("templates/home.twig");
            echo '<script>alert("User created successfully!")</script>';
        }
    }
}
