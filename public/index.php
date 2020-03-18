<?php

session_start();
$_SESSION["loggedin"]=false;

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/login" => "\Controller\Login",
    "/signup" => "\Controller\Signup",
));
