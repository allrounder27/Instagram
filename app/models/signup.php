<?php

namespace Model;

use PDO;
use PDOException;

class Login
{
    public static function signup($username, $email, $password)
    {
        $db = \DB::get_instance();

        try {
            $sql = $db->prepare("SELECT * FROM users WHERE username = :username");
            $sql->execute(
                array(
                    ":username" => $username,
                )
            );
            $checkusername = $sql->fetch(PDO::FETCH_ASSOC);

            $sql = $db->prepare("SELECT * FROM users WHERE email = :email");
            $sql->execute(
                array(
                    ":email" => $email,
                )
            );
            $checkemail = $sql->fetch(PDO::FETCH_ASSOC);

            if ($checkusername!=null) {
                echo "This username already exists";
            } elseif ($checkemail!=null) {
                echo "This email is already registered.";
            } else {
                $sql = "INSERT INTO users (username,email,password) VALUES (?,?,?)";
                $stmt = $db->prepare($sql);
                $stmt->execute([$username, $email, $password]);
                return true;
            }
        } catch (PDOException $error) {
            echo "error";
        }
    }
    public static function login($username, $password)
    {
        $_SESSION["username"]=$username;
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
