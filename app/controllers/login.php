<?php

namespace Controller;

class Login
{
    public function get()
    {
        echo \View\Loader::make()->render("templates/home.twig");
    }
    public function post()
    {
        $username = $_POST["username"];
        $passwordh = $_POST['password'];
        $password = md5($_POST['password']);
        if ($username=='' || $passwordh=='') {
            echo '<script>alert("Username or password cannot be empty!")</script>';
        } elseif (\Model\Login::login($username, $password)) {
            $_SESSION["loggedin"]=true;
            $_SESSION["username"]=$username;
        //     echo \View\Loader::make()->render("templates/dashboard.twig", array(
        //     "latest" => \Model\Feed::latest(),
        //     "top" => \Model\Feed::top(),
        // ));
        header("location: /feed");
        }
    }
}
