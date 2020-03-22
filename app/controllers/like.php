<?php

namespace Controller;

class Like
{
    public function post()
    {
        $userid=$_SESSION["userid"];
        $imageid = $_POST["imageid"];
        if (!(\Model\Post::liked($imageid, $userid))) {
            \Model\Post::like($imageid, $userid);
            header("location: /feed");
        } else {
            \Model\Post::dislike($imageid, $userid);
            header("location: /feed");
        }
    }
}
