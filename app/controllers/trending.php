<?php

namespace Controller;

class Trending
{
    public static function get()
    {
        echo \View\Loader::make()->render("templates/trending.twig", array(
            "trending" => \Model\Feed::trending(),
            "comments"=> \Model\Comment::get_comment(),
        ));
    }
}
