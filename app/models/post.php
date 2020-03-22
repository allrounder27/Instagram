<?php

namespace Model;

use PDO;
use PDOException;

class Post
{
    public static function post($target_filepath, $caption, $userid, $image, $username)
    {
        $db = \DB::get_instance();
        $time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO posts (image,caption,userid,time,name,username) VALUES (?,?,?,?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$target_filepath, $caption, $userid, $time, $image, $username]);
        return true;
    }
    public static function liked($imageid, $userid)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM likedby WHERE imageid = ? AND userid = ?");
        $stmt->execute([$imageid, $userid]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return true;
        } else {
            return false;
        }
    }
    public static function like($imageid, $userid)
    {
        $db = \DB::get_instance();
        $sql = "UPDATE posts SET likes=likes+1 WHERE id=$imageid";
        $db->query($sql);
        $sql = "INSERT INTO likedby (imageid,userid) VALUES (?,?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$imageid, $userid]);
    }
    public static function dislike($imageid, $userid)
    {
        $db = \DB::get_instance();
        $sql = "UPDATE posts SET likes=likes-1 WHERE id=$imageid";
        $db->query($sql);
        $arr = [
           ':imageid' => $imageid,
           ':userid' => $userid,
       ];
        $sql = "DELETE FROM likedby WHERE imageid=:imageid AND userid=:userid";
        $stmt = $db->prepare($sql);
        $stmt->execute($arr);
    }
}
