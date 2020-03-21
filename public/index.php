<?php

session_start();

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/login" => "\Controller\Login",
    "/signup" => "\Controller\Signup",
    "/post" => "\Controller\Post",
    "/feed" => "\Controller\Feed",
    "/like" => "\Controller\Like",
    "/comment" => "\Controller\Comment",
    "/profile" => "\Controller\Profile",
    "/trending" => "\Controller\Trending",
    "/pic" => "\Controller\Pic",


));
