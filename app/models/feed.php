<?php

namespace Model;

class Feed
{
    public static function get_all()
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM posts ORDER BY time DESC");
        $rows = $stmt->fetchAll();
        return $rows;
    }
}
// INNER JOIN users ON posts.userid = users.id
