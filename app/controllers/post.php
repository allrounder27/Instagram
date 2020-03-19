<?php

namespace Controller;

class Post {
    public function get() {
        echo \View\Loader::make()->render("templates/post.twig");
    }
    public function post()
    {
        $image=$_FILES['image']['name'];
        $caption = $_POST["caption"];
        $userid = $_SESSION["userid"];
        if(\Model\Post::post($image, $caption, $userid)){
          echo \View\Loader::make()->render("templates/dashboard.twig");
        }

    }

}
