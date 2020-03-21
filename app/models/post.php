<?php

namespace Model;

use PDO;
use PDOException;

class Post {
    public static function post($target_filepath, $caption, $userid, $image, $username) {
        $db = \DB::get_instance();
        $time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO posts (image,caption,userid,time,name,username) VALUES (?,?,?,?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$target_filepath, $caption, $userid, $time, $image, $username]);
        return true;
    }
    public static function like($imageid) {
        $db = \DB::get_instance();
        $sql = "UPDATE posts SET likes=likes+1 WHERE id=$imageid";
        $db->query($sql);
        }

}
