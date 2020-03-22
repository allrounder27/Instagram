<?php

namespace Controller;

class Comment
{
    public function post()
    {
        $comment = $_POST["comment"];
        $imageid=$_POST["imageid"];
        $userid = $_SESSION["userid"];
        \Model\Comment::comment($comment, $imageid, $userid);
        header("location: /feed");
    }
}
