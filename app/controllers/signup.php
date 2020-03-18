<?php

namespace Controller;

class Signup {
    public function get() {
        echo \View\Loader::make()->render("templates/signup.twig");
    }
    public function post()
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = md5($_POST['password']);
        // if(\Model\User::signup($username, $email, $password)){
        //     $_SESSION["auth"]="true";
        //     $_SESSION["username"]=$username;
        //     header("Location: /");
        // }

    }

}
