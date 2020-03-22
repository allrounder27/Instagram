<?php

namespace Model;

use PDO;
use PDOException;

class Pic
{
    public static function post($target_filepath, $image, $userid)
    {
        $db = \DB::get_instance();
        $sql = "UPDATE users SET picname=?, pic=? WHERE id=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$target_filepath, $image, $userid]);
        return true;
    }
    public static function handle($username, $userid)
    {
        $db = \DB::get_instance();
        $sql = "UPDATE users SET username=? WHERE id=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$username, $userid]);
        return true;
    }
}
