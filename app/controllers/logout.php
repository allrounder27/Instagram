<?php

namespace Controller;

class Logout
{
    public function get()
    {
        $_SESSION["loggedin"] = false ;
        unset($_SESSION['loggedin']);
        session_destroy();
        header("location: /");
    }
}
