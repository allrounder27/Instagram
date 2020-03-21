<?php

namespace Model;

use PDO;
use PDOException;

class Comment {
    public static function comment($comment, $imageid, $userid) {
        $username=$_SESSION["username"];
        $db = \DB::get_instance();
        $sql = "INSERT INTO comments (comment,imageid,userid,username) VALUES (?,?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$comment, $imageid, $userid, $username]);
    }
    public static function get_comment() {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM comments");
        $rows = $stmt->fetchAll();
        return $rows;
    }

}
