<?php

namespace Controller;

class Feed
{
    public static function get()
    {
        if ($_SESSION["loggedin"]) {
            echo \View\Loader::make()->render("templates/dashboard.twig", array(
            "latest" => \Model\Feed::latest(),
            "top" => \Model\Feed::top(),
            "comments"=> \Model\Comment::get_comment(),
        ));
        } else {
              echo "You are not logged in!";

        }
    }
}
