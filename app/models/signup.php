<?php

namespace Model;

use PDO;
use PDOException;

class Login {
    public static function signup($username, $email, $password) {
        $db = \DB::get_instance();
        $sql = "INSERT INTO users (username,email,password) VALUES (?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$username, $email, $password]);
        return true;
    }
    public static function login($username, $password) {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row["password"] == $password) {
                $_SESSION["userid"]=$row["id"];
                return true;
            } else {
                return false;
            }
    }


}
