<?php

namespace Controller;

class Handle
{
    public function get()
    {
        if ($_SESSION["loggedin"]) {
            echo \View\Loader::make()->render("templates/editprofile.twig");
        } else {
            echo "You are not logged in!";
        }
    }

    public function post()
    {
        $userid = $_SESSION["userid"];
        $username = $_POST["username"];
        if (\Model\Pic::handle($username, $userid)) {
            header("location: /profile");
        }
    }
}
