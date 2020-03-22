<?php

namespace Controller;

class Post
{
    public function get()
    {
        if ($_SESSION["loggedin"]) {
            echo \View\Loader::make()->render("templates/post.twig");
        } else {
            echo "You are not logged in!";
        }
    }
    public function post()
    {
        $caption = $_POST["caption"];
        $userid = $_SESSION["userid"];
        $username = $_SESSION["username"];
        $image = $_FILES["image"]["name"];
        $target_dir = "assets/upload/";
        $dir_name = 'assets/feeds';
        if (!is_dir($dir_name)) {
            mkdir($dir_name);
        }
        $target_file = $target_dir.basename($_FILES["image"]["name"]);
        $target_filepath = $target_dir.$image;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg","jpeg","png","gif");

        if (in_array($imageFileType, $extensions_arr)) {
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir.$image);
            if (\Model\Post::post($target_filepath, $caption, $userid, $image, $username)) {
                header("location: /feed");
            }
        }
    }
}
