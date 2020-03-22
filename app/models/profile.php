<?php

namespace Model;

use PDO;
use PDOException;

class Profile
{
    public static function profile($userid)
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM users WHERE id='$userid'");
        $rows = $stmt->fetchAll();
        return $rows;
    }
}
