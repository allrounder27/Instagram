<?php

namespace Model;

class Feed
{
    public static function latest()
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM posts ORDER BY time DESC");
        $rows = $stmt->fetchAll();
        return $rows;
    }
    public static function top()
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM posts ORDER BY likes DESC");
        $rows = $stmt->fetchAll();
        return $rows;
    }
    public static function trending()
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM posts ORDER BY likes DESC, time DESC");
        $rows = $stmt->fetchAll();
        return $rows;
    }
    public static function myposts($userid)
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM posts WHERE userid='$userid' ORDER BY time DESC");
        $rows = $stmt->fetchAll();
        return $rows;
    }
}
