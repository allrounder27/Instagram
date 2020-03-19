<?php

namespace Model;

use PDO;
use PDOException;

class Comment {
    public static function comment($comment, $imageid, $userid) {
        $db = \DB::get_instance();
        $sql = "INSERT INTO comments (comment,imageid,userid) VALUES (?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$comment, $imageid, $userid]);
    }


}
