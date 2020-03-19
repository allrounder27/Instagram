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
        if(\Model\Login::signup($username, $email, $password)){
          echo \View\Loader::make()->render("templates/home.twig");
        }

    }

}
