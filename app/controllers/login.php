<?php

namespace Controller;

class Login {
    public function get() {
        echo \View\Loader::make()->render("templates/home.twig");
    }
    public function post()
    {
        $username = $_POST["username"];
        $password = md5($_POST['password']);
        if(\Model\Login::login($username, $password)){
          $_SESSION["loggedin"]=true;
          $_SESSION["username"]=$username;
          echo \View\Loader::make()->render("templates/dashboard.twig", array(
            "posts" => \Model\Feed::get_all(),
        ));
        }

    }

}
