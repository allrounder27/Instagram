<?php

namespace Controller;

class Trending
{
    public static function get()
    {
        if ($_SESSION["loggedin"]) {
            echo \View\Loader::make()->render("templates/trending.twig", array(
            "trending" => \Model\Feed::trending(),
            "comments"=> \Model\Comment::get_comment(),
        ));
        } else {
            echo "You are not logged in!";
        }
    }
}
